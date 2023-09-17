<?php

namespace App\Http\Controllers;

use App\Cart;

use App\Order;
use App\Category;
use App\Products;
use App\SubCategory;
use App\ProductUnits;
use App\Blogs;
use App\ShopReviews;
use App\OrderedItems;
use App\Reviews;
use App\Customers;
use App\Address;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

date_default_timezone_set('Asia/Kolkata');

class AjaxController extends Controller
{

  public function ajaxLogin(Request $request)
  {
    $user = Customers::where('phone', $request->input('phone'))->where('password', md5($request->input('password')))->first();
    if($user) {
      $userid = $user->id;
        $temp_userid = Session::get('userid') ?? '0';
        // $cartCount = Cart::where('uniqueid', $temp_userid)->count();
        $cartCount = Cart::where('uniqueid', $temp_userid)->sum('quantity');
        if($cartCount > 0) {
          $cartItems = Cart::where('uniqueid', $temp_userid)->first();
          $cartItems->uniqueid = $userid;
          $cartItems->save();
      }

      Session::put('userid', $user->id);
      Session::put('username', $user->name);

    $response['status'] = '01';
    $response['message'] = 'You have been Successfully Loged In';

    } else {
    $response['status'] = '00';
    $response['message'] = 'Invalid login credentials!';
    }

    return response($response, 200)->header('Content-Type', 'application/json');

  }

  public function ajaxCheckUserForCheckout(Request $request)
  {
    if($request->has('mobile') && $request->has('name') && $request->has('email') && $request->has('address') && $request->has('pincode') && $request->has('city') && $request->has('district')
    && $request->has('state') && $request->has('landmark'))
    {
    $user = Customers::where('phone', $request->input('mobile'))->first();
    if($user) {
    $userid = $user->id;
    $unset_defaultaddress = Address::where('customerid',$userid)->update( array('default_address'=>'0'));
    }
    else {

      $cust = new Customers();
      $cust->name = $request->input('name') ?? '';
      $cust->email = strtolower($request->input('email')) ?? '';
      $cust->password = $request->input('mobile') ?? '';
      $cust->phone = $request->input('mobile') ?? '';
      $cust->address = $request->input('address') ?? '';
      $cust->pincode = $request->input('pincode') ?? '';
      $cust->area = $request->input('city') ?? '';
      $cust->district = $request->input('district') ?? '';
      $cust->state = $request->input('state') ?? '';
      $cust->join_on = date('Y-m-d H:i:00');
      $cust->save();
      $userid = $cust->id;

    }
    Session::put('userid', $userid);
    $address = new Address();
            $address->customerid = $userid;
            $address->name = $request->input('name') ?? '';
            $address->email = $request->input('email') ?? '';
            $address->mobile = $request->input('mobile') ?? '';
            $address->phone = $request->input('mobile') ?? '';
            $address->address = $request->input('address') ?? '';
            $address->landmark = $request->input('landmark') ?? '';
            $address->pincode = $request->input('pincode') ?? '';
            $address->city = $request->input('city') ?? '';
            $address->district = $request->input('district') ?? '';
            $address->state = $request->input('state') ?? '';
            $address->type = '';
            $address->default_address = '1';
            $address->save();

		if($address){
    $response['status'] = '01';
    $response['message'] = 'Ready for place the order';
		}
		else{
    $response['status'] = '00';
    $response['message'] = 'Some thing went wrong!';
  }


  }else{
    $response['status'] = '00';
    $response['message'] = 'Some required fields are empty!';
  }

  return response($response, 200)->header('Content-Type', 'application/json');

  }

  public function searchProducts(Request $request)
  {
    $data = '';
    $search = $request->input('search') ?? '';
    $products = Products::where('name', 'like', "%{$search}%")->select('id', 'name')->where('row_status','New')->limit(10)->get();

    foreach ($products as $key => $value) {
      $data .= '<li class="list-group-item"><a href="'.url('/product/'.$value->id).'"><b>'.$value->name.'</b></a></li>';
    }

    echo $data;
  }


  public function changeProductStatus()
  {
    $status = $_GET['status'] ?? 'Active';
    $id = $_GET['id'] ?? '0';

    if($id > 0) {
      $product = Products::find($id);
      $product->status = $status;
      $product->save();

      echo '{"sts":"01","msg":"Status Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }


  public function changeProductUnitStatus()
  {
    $status = $_GET['status'] ?? 'Active';
    $id = $_GET['id'] ?? '0';

    if($id > 0) {
      $product = ProductUnits::find($id);
      $product->status = $status;
      $product->save();

      echo '{"sts":"01","msg":"Status Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }


  public function getCategoryBaisedProducts(Request $request)
  {
    $limit = 32;
    $search = $request->input('search') ?? '';
    $catids = $request->input('catids') ?? [];
    $subcatids = $request->input('subcatids') ?? [];
    $min = $request->input('min') ?? '0';
    $max = $request->input('max') ?? '0';
    $page = $request->input('page') ?? '1';
    $offset = ($page - 1) * $limit;
    $orderby = $request->input('orderby') ?? '';


    $categories = Category::All();

    $productsCount = Products::where('status', 'Available')->where('stock_avalible', '>', 0);
    if($catids) {
      $productsCount = $productsCount->whereIn('cat_id', $catids);
    }
    if($subcatids) {
      $productsCount = $productsCount->whereIn('subcat_id', $subcatids);
    }
    if($search != '') {
      $productsCount = $productsCount->where('name', 'like', "%{$search}%");
    }
    if($min > 0) {
      $productsCount = $productsCount->where('offerprice', '>', $min);
    }
    if($max > 0) {
      $productsCount = $productsCount->where('offerprice', '<', $max);
    }
    $productsCount = $productsCount->count();


    $products = Products::where('status', 'Available')->where('stock_avalible', '>', 0);
    if($catids) {
      $products = $products->whereIn('cat_id', $catids);
    }
    if($subcatids) {
      $products = $products->whereIn('subcat_id', $subcatids);
    }
    if($search != '') {
      $products = $products->where('name', 'like', "%{$search}%");
    }
    if($min > 0) {
      $products = $products->where('offerprice', '>', $min);
    }
    if($max > 0) {
      $products = $products->where('offerprice', '<', $max);
    }
    if($orderby == 'New') {
      $products = $products->orderBy('id', 'desc');
    } elseif($orderby == 'Trending') {
      $products = $products->orderBy('trending', 'desc');
    } elseif($orderby == 'Popular') {
      $products = $products->orderBy('best_seller', 'desc');
    } elseif($orderby == 'Featured') {
      $products = $products->orderBy('featured', 'desc');
    }
    $products = $products->offset($offset)->limit($limit)->get();


    $pageCount = ceil($productsCount / $limit);

    $data = '<header class="border-bottom mb-4 pb-3" style="margin-top: 4%;">
          <div class="form-inline">
            <span class="mr-md-auto">'.$productsCount.' Items found </span>
            <select class="mr-2 form-control" id="selOrderBy" onchange="loadProducts(1);">';
            if($orderby == '') {
                $data .= '<option value="" disabled selected hidden><i class="">&#x21c5;</i> Sort By</option>';
              } else {
                $data .= '<option value="" disabled selected hidden><i class="">&#x21c5;</i> Sort By</option>';
              }

              if($orderby == 'New') {
                $data .= '<option value="New" selected>Latest Products</option>';
              } else {
                $data .= '<option value="New">Latest Products</option>';
              }
              if($orderby == 'Trending') {
                $data .= '<option value="Trending" selected>Trending Products</option>';
              } else {
                $data .= '<option value="Trending">Trending Products</option>';
              }
              if($orderby == 'Popular') {
                $data .= '<option value="Popular" selected>Popular Products</option>';
              } else {
                $data .= '<option value="Popular">Popular Products</option>';
              }
              if($orderby == 'Featured') {
                $data .= '<option value="Featured" selected>Featured Products</option>';
              } else {
                $data .= '<option value="Featured">Featured Products</option>';
              }
            $data .= '</select>
          </div>
        </header>

        <div class="row">';
          foreach ($products as $key => $value) {
            $data .= '<div class="col-md-3 col-6">
              <div class="card card-product-grid">
                <a href="'.url('/product/'.$value->id).'" class="img-wrap">
                  <img src="'.url($value->image).'">
                </a>
                <figcaption class="info-wrap wrap-adjust">
                  <p class="text-muted">';
                  if(isset($category[$value->cat_id])) {
                    $data .= $category[$value->cat_id];
                  }
                  $data .= '</p>
                  <a href="'.url('/product/'.$value->id).'" class="title ">'.$value->name.'</a>
                  <div class="price-wrap mt-2">
                    <span class="price">₹ '.$value->offerprice.'</span>
                    <del class="price-old">₹ '.$value->price.'</del>';
                    $offer =  ($value->price - $value->offerprice)/$value->price * 100;
                    $data .= '<b class="label-rating text-success">  <small><b>'.round($offer).'% Off</b></small> </b>
                  </div>
                </figcaption>
              </div>
            </div>';
          }
          if(count($products) == 0) {
            $data .= '<center style="width:100%; padding:10%;">
            <i class="fas fa-exclamation-circle" style="font-size: 60px; color: #ff6a00;"></i><br><br>
            <h3>No Products Found!</h3>
            <h5 class="text-muted">Your search did not match any products.</h5>
            <center>';
          }
        $data .= '</div>';

        $data .= '<nav class="mt-4" aria-label="Page navigation sample">
          <ul class="pagination" style="margin-bottom: 5%">';
          if($productsCount <= $limit) {
            $data .= '<li class="page-item hide">
              <a class="page-link" href="#">Prev</a>
            </li>
            <li class="page-item hide">
              <a class="page-link" href="Javascript:void(0);" onclick="loadProducts(1);">1</a>
            </li>
            <li class="page-item hide">
              <a class="page-link " href="#">Next</a>
            </li>';
          } else {
            if($page  == 1) {
              $data .= '<li class="page-item hide">
                <a class="page-link" href="#">Prev</a>
              </li>';
            } else {
              $data .= '<li class="page-item">
                <a class="page-link" href="Javascript:void(0);" onclick="loadProducts('.($page - 1).');">Prev</a>
              </li>';
            }
            for ($i = 1; $i <= $pageCount; $i++) {
              if($page == $i) {
                $data .= '<li class="page-item active">
                  <a class="page-link" href="Javascript:void(0);" onclick="loadProducts('.$i.');">'.$i.'</a>
                </li>';
              } else {
                $data .= '<li class="page-item">
                  <a class="page-link" href="Javascript:void(0);" onclick="loadProducts('.$i.');">'.$i.'</a>
                </li>';
              }
            }
            if($page  == $pageCount) {
              $data .= '<li class="page-item disabled">
                <a class="page-link " href="#">Next</a>
              </li>';
            } else {
              $data .= '<li class="page-item">
                <a class="page-link " href="Javascript:void(0);" onclick="loadProducts('.($page + 1).');">Next</a>
              </li>';
            }
          }
          $data .= '</ul>
        </nav>';
    echo $data;
  }


  public function addToCart(Request $request)
  {

    if(Session::get('userid') > 0) {
      $productid = $request->input('productid') ?? '0';
      $productname = $request->input('productname') ?? '';
      $quantity = $request->input('quantity') ?? '';
      $unitid = $request->input('unitid') ?? '';

      $check = Cart::where('uniqueid', Session::get('userid'))
      ->where('productid', $productid)
      // ->where('unitid', $unitid)
      ->first();
      if($check)
      {
        $chk=$check->quantity;
      }
      else
      {
        $chk=0;
      }

      if($chk+$quantity>10)
      {
        echo '{"sts":"02","msg":"Maximum limit exceed!"}';
      }
      else
      {

      if($check && isset($check->quantity)) {
        $cart = Cart::find($check->id);
        $cart->quantity = $check->quantity + $quantity;
        $cart->save();

        echo '{"sts":"01","msg":"Cart Updated."}';
      } else {
        $cart = new Cart();
        $cart->uniqueid = Session::get('userid');
        $cart->productid = $productid;
        $cart->unitid = $unitid;
        $cart->quantity = $quantity;
        $cart->created_at = date('Y-m-d H:i:00');
        $cart->save();

        echo '{"sts":"01","msg":"'.$productname.' Added to your Cart"}';
      }
     }

    } else {
      echo '{"sts":"00","msg":"Something Went Wrong!"}';
    }
  }


  public function getCartCount()
  {
    // return Cart::where('uniqueid', Session::get('userid'))->count();
    return Cart::where('uniqueid', Session::get('userid'))->sum('quantity');
  }


  public function getSizeDetails(Request $request)
  {
    $unitid = $request->input('unitid') ?? '';
    if($unitid > 0) {
      $unit = ProductUnits::where('id', $unitid)->first();
      $offer =  ($unit->price - $unit->offerprice)/$unit->price * 100;

      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['price'] = $unit->price;
      $data['offerprice'] = $unit->offerprice;
      $data['offer'] = round($offer);
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong!"}';
    }
  }


  public function removeCart()
  {
    $cartid = $_GET['cartid'] ?? '0';
    $cart = Cart::find($cartid);
    $cart->delete();
    echo '{"sts":"01","msg":"Product Removed from Cart"}';
  }


  public function changeQuantity()
  {
    $cartid = $_GET['cartid'] ?? '0';
    $quantity = $_GET['quantity'] ?? '0';

    $cart = Cart::find($cartid);
    if($cart->quantity==10 && $quantity==10)
    {

        echo '{"sts":"02","msg":"maximum limit exceeded"}';
    }
    else{
    $cart->quantity = $quantity;
    $cart->save();

     echo '{"sts":"01","msg":"Cart Updated"}';
    }
  }


  public function changeOrderStatus(Request $request)
  {
    $status = $request->input('status') ?? 'Accepted';
    $id = $request->input('id') ?? '0';

    if($id > 0) {
      $order = Order::find($id);
      $order->status = $status;
      $order->save();

      if($status == 'Cancelled' || $status == 'Rejected') {
        $orderItems = OrderedItems::where('orderid', $id)->get();
        foreach ($orderItems as $key => $value) {
          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible + $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();
        }
      } else {
        $orderItems = OrderedItems::where('orderid', $id)->get();
        foreach ($orderItems as $key => $value) {
          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible - $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();
        }
      }

      echo '{"sts":"01","msg":"Order Status Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }


  public function changePaymentStatus(Request $request)
  {
    $status = $request->input('status') ?? 'Pending';
    $id = $request->input('id') ?? '0';

    if($id > 0) {
      $order = Order::find($id);
      $order->paystatus = $status;
      $order->save();

      if($status == 'Failed') {
        $orderItems = OrderedItems::where('orderid', $id)->get();
        foreach ($orderItems as $key => $value) {
          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible + $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();
        }
      } else {
        $orderItems = OrderedItems::where('orderid', $id)->get();
        foreach ($orderItems as $key => $value) {
          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible - $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();
        }
      }

      echo '{"sts":"01","msg":"Payment Status Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }

//   public function loadSubCategory(Request $request)
//   {
//     $subCategories = SubCategory::where('cat_id',$request->id)->get();
//     echo json_encode($subCategories);

//   }

//   public static function countSubCatProducts(Request $request)
//   {
//     echo json_encode( Products::where('status', 'Available')->where('subcat_id', $request->id)->count());
//   }
  public function changeBlogStatus()
  {
    $status = $_GET['status'] ?? 'Active';
    $id = $_GET['id'] ?? '0';

    if($id > 0) {
      $blog = Blogs::find($id);
      $blog->status = $status;
      $blog->save();

      echo '{"sts":"01","msg":"Status Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }

  public function getCart()
  {
    $ordertotal = $producttotal=$discount = $subTotal  = 0;
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
	  $total=0;

    $cartItemsHtml = "";
    $priceSummeryHtml = "";
    $checkoutHtml = "";
    $checkoutButton = "";
    $relatedProducts = "";


    if($cartCount > 0){
    foreach ($cartItems as $key => $value) {
      $product = AdminProductsController::getProduct($value->productid);
      $producttotal = $value->quantity * $product->offerprice;
      $ordertotal += $producttotal;
	 $producprice = $value->quantity * $product->price;
      $total += $producprice;
      $discount=$total-$ordertotal;

      $cartItemsHtml .= '
      <table style="width: 100%;">
        <tr>
          <th>
            <img style="width: 120px;border: 1px solid #60B76E;border-radius: 15px;height:120px;" src="'.url($product->image).'" alt="">
          </th>
          <th style="padding-left: 1px;" class="position-relative">
            <p style="padding: 0;">'.$product->name.'</p>

            <h6 style="padding-top: 5px;">₹ '.$product->offerprice.'</h6>
            <div style="margin-top: 10px;margin-bottom: 10px;" class="form-groups">
              <div class="input-group">
                <div class="input-group-btn">
                  <button id="down" class="btn btn-default" onclick="down('."1".','.$value->id.',0)"><span class="">-</span></button>
                </div>
                <input style="width: 30px;padding: 0;text-align: center;max-width: 35px;" type="text" id="myNumber'.$value->id.'" class="form-control input-number" value="'.$value->quantity.'" readonly/>
                <div class="input-group-btn">
                    <button id="up" class="btn btn-default" onclick="up('.'10'.','.$value->id.'),0"><span class="">+</span></button>
                </div>
                <a href="javascript:void(0);"  onclick="removeCart('.$value->id.');">
                  <i style="float: right;color:#AE0000;font-size: 15px;margin-left: 10px;margin-top: 5px;" class="ri-delete-bin-5-fill bin"></i>
                </a>
              </div>
            </div>
          </th>
        </tr>
      </table>
      ';

    }
    }
    else{
      $cartItemsHtml .='
      <div class="order-summary-col" >
      <h6>
        Your cart is empty!
      </h6>
    </div>
      ';
    }

    $subTotal =$ordertotal + 45;


    if($cartCount > 0){
    $priceSummeryHtml .= '
    <div class="order-summary">
      <h6>Price Summary</h6>
      <hr>
      <div class="ordrsmry-col">
        <p>Order Total</p>
        <p>₹ '.$ordertotal.'</p>
      </div>
      <hr>
      <div class="ordrsmry-col">
        <p>Shipping</p>
        <p>₹  45</p>
      </div>
      <hr>
      <div class="ordrsmry-col">
        <p>Discount</p>
        <p class="grn">₹ '.$discount.'</p>
      </div>
      <hr>
	  <div class="ordrsmry-col">
	  <p>Grand Total</p>
      <p class="end">₹  '.$subTotal.'</p>
    </div>
    ';
    }
    else{
      $priceSummeryHtml = '';
    }

    if($cartCount > 0){
      $checkoutButton .= '
      <div class="flex-dv">
        <a href="'.url('/checkout').'">Continue</a>
      </div>
      ';
    }
    else{
      $checkoutButton .= '
      <div class="flex-dv">
      </div>
      ';
    }

    if($cartCount > 0){
    $checkoutHtml .= '
    <div class="order-summary continuediv">
      <div class="flex-dv">

      </div>
      '.$checkoutButton.'
    </div>
    ';}
    else{
      $checkoutButton = "";
    }

  //   $relatedProducts .= '
  //   <div class="order-summary">
  //   <h6>Related product</h6>
  //   <div class="product-sliders-cart">
  //     <div class="sliderdvp">
  //       <div class="slideproduct">
  //         <div class="slidecontnt">
  //           <img src="" alt="">
  //         </div>
  //         <div class="slidecontnt">
  //           <p class="sldtext">Thalir Aloe Vera Shampoo For Smooth-Silky Hair Dandruff Cleaner-100 Ml</p>
  //           <p><span class="grnn">Price:</span> $ 340.00</p>
  //           <button class="sldbuynow">BUY NOW</button>
  //         </div>
  //       </div>
  //       <div class="slideproduct">
  //         <div class="slidecontnt">
  //           <img src="" alt="">
  //         </div>
  //         <div class="slidecontnt">
  //           <p class="sldtext">Thalir Aloe Vera Shampoo For Smooth-Silky Hair Dandruff Cleaner-100 Ml</p>
  //           <p><span class="grnn">Price:</span> $ 340.00</p>
  //           <button class="sldbuynow">BUY NOW</button>
  //         </div>
  //       </div>
  //       <div class="slideproduct">
  //         <div class="slidecontnt">
  //           <img src="" alt="">
  //         </div>
  //         <div class="slidecontnt">
  //           <p class="sldtext">Thalir Aloe Vera Shampoo For Smooth-Silky Hair Dandruff Cleaner-100 Ml</p>
  //           <p><span class="grnn">Price:</span> $ 340.00</p>
  //           <button class="sldbuynow">BUY NOW</button>
  //         </div>
  //       </div>
  //       <div class="slideproduct">
  //         <div class="slidecontnt">
  //           <img src="" alt="">
  //         </div>
  //         <div class="slidecontnt">
  //           <p class="sldtext">Thalir Aloe Vera Shampoo For Smooth-Silky Hair Dandruff Cleaner-100 Ml</p>
  //           <p><span class="grnn">Price:</span> $ 340.00</p>
  //           <button class="sldbuynow">BUY NOW</button>
  //         </div>
  //       </div>
  //     </div>
  //   </div>
  // </div>
  //   ';

    echo '<h5>My Cart ('.$cartCount.')</h5>
    <div class="order-summary">
      <h6>Order Summary</h6>
      '.$cartItemsHtml.'

    </div>
    '.$priceSummeryHtml.'
    '.$checkoutHtml.'
    '.$relatedProducts;
  }

  public function changeReviewStatus()
  {
    $status = $_GET['status'] ?? 'Active';
    $id = $_GET['id'] ?? '0';

    if($id > 0) {
      $review = ShopReviews::find($id);
      $review->status = $status;
      $review->save();

      echo '{"sts":"01","msg":"Status Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }


  public function cancelOrder(Request $request)
  {

    if(Session::get('userid') > 0) {
      $orderId = $request->input('orderId') ?? '0';
      $status = "Cancelled";
      if($orderId > 0 && (Order::where('id', $orderId)->where('customerid',Session::get('userid'))->exists())) {
        $order = Order::find($orderId);
        $order->status = $status;
        $order->save();

        if($status == 'Cancelled' || $status == 'Rejected') {
          $orderItems = OrderedItems::where('orderid',$orderId)->get();
          foreach ($orderItems as $key => $value) {
            $product = Products::find($value->productid);
            $stock_avalible = $product->stock_avalible + $value->quantity;
            $product->stock_avalible = $stock_avalible;
            $product->save();
          }
        }
        else {
          $orderItems = OrderedItems::where('orderid', $orderId)->get();
          foreach ($orderItems as $key => $value) {
            $product = Products::find($value->productid);
            $stock_avalible = $product->stock_avalible - $value->quantity;
            $product->stock_avalible = $stock_avalible;
            $product->save();
          }
        }

        echo '{"sts":"01","msg":"Order Cancelled"}';
      }
      else {
        echo '{"sts":"00","msg":"Something Went Wrong"}';
      }
    }
    else
    {
      echo '{"sts":"00","msg":"Session TimeOut, Please Login!"}';
    }

  }

  public function getPincodeDetails()
  {
    $pincode = $_GET['pincode'] ?? '0';
    $url = 'https://api.postalpincode.in/pincode/'.$pincode;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response);

    if($response[0]->Status == 'Success') {
      $PostOffice = $response[0]->PostOffice;
      $District = $PostOffice[0]->District;
      $State = $PostOffice[0]->State;
      echo '{"sts":"01","District":"'.$District.'","State":"'.$State.'"}';
    } else {
      echo '{"sts":"00","msg":"No Result Found!"}';
    }
  }

  public function setDefaultRating(Request $request)
  {
    $userid = Session::get('userid');

    if(Session::get('userid') > 0 && Session::get('username') != "Guest User") {
      $productid = $request->input('productid') ?? '0';
      $productreview = Reviews::where('product_id', $productid)->where('customerid',$userid)->first();

      if($productreview) {
        echo '{"sts":"01","customername":"'.$productreview->customername.'","comment":"'.$productreview->comment.'","rating":"'.$productreview->rating.'"}';
      }
      else {
        $user = Customers::find($userid);

        echo '{"sts":"01","customername":"'.$user->name.'","comment":"","rating":""}';
      }
    }
    else
    {
      echo '{"sts":"01","customername":"","comment":"","rating":""}';
    }
  }

}
