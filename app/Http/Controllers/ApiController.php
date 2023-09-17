<?php
namespace App\Http\Controllers;

use Session;

use App\User;
use App\Cart;
use App\Order;
use App\Banners;
use App\Amounts;
use App\Products;
use App\Category;
use App\Customers;
use App\ProductUnits;
use App\Notifications;
use App\SubCategory;
use App\OrderedItems;


use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Kolkata');

class ApiController extends Controller
{

  public function getPincodeDetails(Request $request)
  {
    $pincode = $request->input('pincode') ?? '';
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


  public function checkUserNumber(Request $request)
  {
    $number = $request->input('number') ?? '';
    $shopCount = Customers::where('phone', $number)->count();
    if($shopCount > 0) {
      echo '{"sts":"01","msg":"Number Already Exists."}';
    } else {
      echo '{"sts":"00","msg":"No Result Found!"}';
    }
  }


  public function login(Request $request)
  {
    $user = Customers::where('phone', $request->input('phone'))
    ->where('password', md5($request->input('password')))
    ->first();
    if(isset($user)) {
      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['user'] = $user;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"Invalid User Details!"}';
    }
  }


  public function check(Request $request)
  {
    $user = Customers::where('phone', $request->input('phone'))->first();
    if(isset($user)) {
      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['user'] = $user;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"Number does Not Exists!"}';
    }
  }


  public function register(Request $request)
  {
    $cshop = Customers::where('phone', $request->input('phone'))->count();
    if($cshop == 0) {
      $cust = new Customers();
      $cust->name = $request->input('name') ?? '';
      $cust->email = strtolower($request->input('email')) ?? '';
      $cust->password = $request->input('password') ?? '';
      $cust->phone = $request->input('phone') ?? '';
      $cust->address = $request->input('address') ?? '';
      $cust->pincode = $request->input('pincode') ?? '';
      $cust->area = $request->input('area') ?? '';
      $cust->district = $request->input('district') ?? '';
      $cust->state = $request->input('state') ?? '';
      $cust->join_on = date('Y-m-d H:i:00');
      $cust->save();

      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['customers'] = $cust;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"Number Already Exists! Try Another"}';
    }
  }

  public function update(Request $request, $id)
  {
    if($id > 0) {
      $cust = Customers::find($id);
      $cust->name = $request->input('name') ?? '';
      $cust->email = strtolower($request->input('email')) ?? '';
      $cust->password = $request->input('password') ?? '';
      $cust->phone = $request->input('phone') ?? '';
      $cust->address = $request->input('address') ?? '';
      $cust->pincode = $request->input('pincode') ?? '';
      $cust->area = $request->input('area') ?? '';
      $cust->district = $request->input('district') ?? '';
      $cust->state = $request->input('state') ?? '';
      $cust->save();

      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['customers'] = $cust;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong!"}';
    }
  }

  public function home(Request $request)
  {
    $cartsArr = [];
    $userid = $request->input('userid') ?? '0';

    $cartitems = Cart::where('uniqueid', $userid)->get();

    $ccount = count($cartitems) ?? '0';
    if($ccount > 0) {
      foreach ($cartitems as $key => $value) {
        $cartArr = new \stdClass();
        $cartArr->id = $value->id;
        $cartArr->userid = $value->uniqueid;
        $cartArr->productid = $value->productid;
        $cartArr->unitid = $value->unitid;
        $cartArr->quantity = $value->quantity;
        $cartArr->created_at = $value->created_at;
        $cartArr->productname = Products::where('id', $value->productid)->value('name');
        $cartArr->unitname = ProductUnits::where('id', $value->unitid)->value('name');
        $cartArr->unitprice = ProductUnits::where('id', $value->unitid)->value('price');
        $cartArr->unitofferprice = ProductUnits::where('id', $value->unitid)->value('offerprice');
        $cartsArr[] = $cartArr;
      }
    }

    $data = [];
    $data['sts'] = '01';
    $data['msg'] = 'Success';
    $data['category'] = Category::orderBy('disporder', 'asc')->get();
    $data['cart_count'] = Cart::where('uniqueid', $userid)->count();
    $data['cart_items'] = $cartsArr ?? [];
    $data['sliders'] = Banners::where('type', '3')->inRandomOrder()->get();
    $data['sec_banners'] = Banners::where('type', '2')->inRandomOrder()->get();
    $data['populars_products'] = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->where('best_seller', '1')->limit(12)->inRandomOrder()->get();
    $data['trending_products'] = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->where('trending', '1')->limit(12)->inRandomOrder()->get();
    $data['featured_products'] = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->where('featured', '1')->limit(12)->inRandomOrder()->get();
    echo json_encode($data);
  }


  public function products(Request $request)
  {
    $status = $request->input('status') ?? '';
    $cat_id = $request->input('categoryid') ?? '0';
    $subcat_id = $request->input('subcategoryid') ?? '0';
    $search = $request->input('search') ?? '';
    $limit = $request->input('limit') ?? '10';
    $offset = $request->input('offset') ?? '0';
    $min = $request->input('min') ?? '0';
    $max = $request->input('max') ?? '0';
    $orderby = $request->input('orderby') ?? 'New';

    $products = Products::orderBy('id', 'desc');
    if(isset($status) && $status != '' && $status != 'All') {
      $products = $products->where('status', $status);
    }
    if(isset($search) && $search != '') {
      $products = $products->where('name', 'like', "%{$search}%");
    }
    if($cat_id > 0) {
      $products = $products->where('cat_id', $cat_id);
    }
    if($subcat_id > 0) {
      $products = $products->where('subcat_id', $subcat_id);
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

    $productArr = [];
    if(count($products) > 0) {
      foreach ($products as $key => $value) {
        $product = new \stdClass();
        $product->id = $value->id;
        $product->stock_avalible = $value->stock_avalible;
        $product->name = $value->name;
        $product->desc = $value->desc;
        $product->offerprice = $value->offerprice;
        $product->price = $value->price;
        $product->cat_id = $value->cat_id;
        $product->subcat_id = $value->subcat_id;
        $product->best_seller = $value->best_seller;
        $product->featured = $value->featured;
        $product->trending = $value->trending;
        $product->status = $value->status;
        $product->image = $value->image;
        $product->image2 = $value->image2;
        $product->image3 = $value->image3;
        $product->image4 = $value->image4;
        $product->units = ProductUnits::where('productid', $value->id)->orderBy('disp_order', 'asc')->get();
        $productArr[] = $product;
      }
    }

    $data = [];
    $data['sts'] = '01';
    $data['msg'] = 'Success';
    // $data['category'] = Category::orderBy('disporder', 'asc')->get();
    $data['sub_category'] = SubCategory::orderBy('id', 'asc')->get();
    $data['products'] = $productArr;
    echo json_encode($data);
  }


  public function product($id)
  {
    $product = Products::where('id', $id)->first();
    if($product) {
      $products = Products::where('status', 'Available')->where('stock_avalible', '>', 0);
      if($product->cat_id > 0) {
        $products = $products->where('cat_id', $product->cat_id);
      }
      if($product->subcat_id > 0) {
          $products = $products->where('subcat_id', $product->subcat_id);
        }
      $products = $products->where('id', '!=', $id)->inRandomOrder()->offset(0)->limit(12)->get();

      $productArr = [];
      if(count($products) > 0) {
        foreach ($products as $key => $value) {
          $sproduct = new \stdClass();
          $sproduct->id = $value->id;
          $sproduct->name = $value->name;
          $sproduct->stock_avalible = $value->stock_avalible;
          $sproduct->desc = $value->desc;
          $sproduct->offerprice = $value->offerprice;
          $sproduct->price = $value->price;
          $sproduct->cat_id = $value->cat_id;
          $sproduct->subcat_id = $value->subcat_id;
          $sproduct->best_seller = $value->best_seller;
          $sproduct->featured = $value->featured;
          $sproduct->trending = $value->trending;
          $sproduct->status = $value->status;
          $sproduct->image = $value->image;
          $sproduct->image2 = $value->image2;
          $sproduct->image3 = $value->image3;
          $sproduct->image4 = $value->image4;
          $sproduct->unit = ProductUnits::where('productid', $value->id)->orderBy('disp_order', 'asc')->first();
          $productArr[] = $sproduct;
        }
      }

      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['product'] = $product;
      $data['units'] = ProductUnits::where('productid', $id)->orderBy('disp_order', 'asc')->get();
      $data['category'] = Category::where('id', $product->cat_id)->value('name');
      $data['sub_category'] = SubCategory::where('id', $product->subcat_id)->value('name');
      $data['similar_products'] = $productArr;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"Product does not Exists!"}';
    }
  }


  public function addToCart(Request $request)
  {
    $userid = $request->input('userid') ?? Session::get('userid') ?? '0';
    $productid = $request->input('productid') ?? '0';
    $unitid = $request->input('unitid') ?? '0';
    $quantity = $request->input('quantity') ?? '0';
    $productname = $request->input('productname') ?? 'Item';

    $product = Products::find($productid);

    if($product->status == 'Available' && $product->stock_avalible > 0) {
      if($product->stock_avalible >= $quantity) {
        $check = Cart::where('uniqueid', $userid)
        ->where('productid', $productid)
        ->where('unitid', $unitid)
        ->first();

        if($check && isset($check->quantity)) {
          $cart = Cart::find($check->id);
          $cart->quantity = $quantity;
          $cart->save();

          echo '{"sts":"01","msg":"Cart Updated."}';
        } else {
          $cart = new Cart();
          $cart->uniqueid = $userid;
          $cart->productid = $productid;
          $cart->unitid = $unitid;
          $cart->quantity = $quantity;
          $cart->created_at = date('Y-m-d H:i:00');
          $cart->save();

          echo '{"sts":"01","msg":"'.$productname.' Added to your Cart"}';
        }
      } else {
        echo '{"sts":"00","msg":"Only '.$product->stock_avalible.' Stocks Remaning."}';
      }
    } else {
      echo '{"sts":"00","msg":"Zero Stock Available"}';
    }
  }


  public function removeCart(Request $request)
  {
    $cartid = $request->input('cartid') ?? '0';
    $cart = Cart::find($cartid);
    $cart->delete();
    echo '{"sts":"01","msg":"Product Removed from Cart"}';
  }


  public function changeQuantity(Request $request)
  {
    $cartid = $request->input('cartid') ?? '0';
    $quantity = $request->input('quantity') ?? '0';

    $cart = Cart::find($cartid);
    $product = Products::find($cart->productid);
    if($product->stock_avalible >= $quantity) {
      $cart->quantity = $quantity;
      $cart->save();
      echo '{"sts":"01","msg":"Cart Updated"}';
    } else {
      echo '{"sts":"00","msg":"Only '.$product->stock_avalible.' Stocks Remaning."}';
    }
  }


  public function getCartCount(Request $request)
  {
    $userid = $request->input('userid') ?? '0';
    return Cart::where('uniqueid', $userid)->count();
  }


  public function getCartSumTotal(Request $request)
  {
    $userid = $request->input('userid') ?? '0';
    $cartitems = Cart::where('uniqueid', $userid)->get();

    $data = '';
    $sumtotal = $totalprice = 0;
    $ccount = count($cartitems) ?? '0';
    if($ccount > 0) {
      foreach ($cartitems as $key => $value) {
        $product = Products::where('id', $value->productid)->first();
        $unit = ProductUnits::where('id', $value->unitid)->first();

        $totalprice = $unit->offerprice * $value->quantity;
        $sumtotal = $sumtotal + $totalprice;
      }
    }
    echo '{"sts":"01","sum":"'.$sumtotal.'"}';
  }


  public function getCart(Request $request) {
    $userid = $request->input('userid') ?? '0';

    $cartitems = Cart::where('uniqueid', $userid)->get();

    $cartsArr = [];
    $ccount = count($cartitems) ?? '0';
    if($ccount > 0) {
      foreach ($cartitems as $key => $value) {
        $cartArr = new \stdClass();
        $cartArr->id = $value->id;
        $cartArr->userid = $value->uniqueid;
        $cartArr->productid = $value->productid;
        $cartArr->unitid = $value->unitid;
        $cartArr->quantity = $value->quantity;
        $cartArr->created_at = $value->created_at;
        $cartArr->productname = Products::where('id', $value->productid)->value('name');
        $cartArr->product_cat_id = Products::where('id', $value->productid)->value('cat_id');
        $cartArr->product_subcat_id = Products::where('id', $value->productid)->value('subcat_id');
        $cartArr->stock_avalible = Products::where('id', $value->productid)->value('stock_avalible');
        $cartArr->unitname = ProductUnits::where('id', $value->unitid)->value('name');
        $cartArr->unitprice = ProductUnits::where('id', $value->unitid)->value('price');
        $cartArr->unitofferprice = ProductUnits::where('id', $value->unitid)->value('offerprice');
        $cartsArr[] = $cartArr;
      }
    }

    $data = [];
    $data['sts'] = '01';
    $data['msg'] = 'Success';
    $data['cart'] = $cartsArr;
    echo json_encode($data);
  }


  public function clearCart(Request $request) {
    $userid = $request->input('userid') ?? '0';

    $cartitems = Cart::where('uniqueid', $userid)->delete();

    echo '{"sts":"01","msg":"Cart Updated"}';
  }


  public function placeorder(Request $request)
  {
    $userid = $request->input('userid') ?? '0';
    $paystatus = $request->input('paystatus') ?? 'Pending';
    $details = $request->input('details') ?? '';
    $paymentid = $request->input('paymentid') ?? '';

    if($userid > 0) {
      $cartitems = Cart::where('uniqueid', $userid)->get();

      switch ($request->input('type')) {
        case 'CoD':
          if(count($cartitems) > 0) {
            $noofjeans = $noofphants = $noof550shirts = $noof400shirts =  $nooftshirts = $subtotal = $sumtotal = 0;

            foreach ($cartitems as $key => $value) {
              $unit = ProductUnits::where('id', $value->unitid)->first();
              $product = Products::where('id', $value->productid)->first();

              $sumtotal = $sumtotal + ($unit->offerprice * $value->quantity);

              if($product->subcat_id == 24) {
                $nooftshirts = $nooftshirts + $value->quantity;
              }
              if(($product->subcat_id == 22 || $product->subcat_id == 23) && $unit->offerprice == 400) {
                $noof400shirts = $noof400shirts + $value->quantity;
              }
              if(($product->subcat_id == 22 || $product->subcat_id == 23) && $unit->offerprice == 550) {
                $noof400shirts = $noof400shirts + $value->quantity;
              }
              if($product->subcat_id == 25 || $product->subcat_id == 26) {
                $noofphants = $noofphants + $value->quantity;
              }
              if($product->subcat_id == 27) {
                $noofjeans = $noofjeans + $value->quantity;
              }
            }

            $sumtotal = $sumtotal + 80;
            $subtotal = $sumtotal;

            if($nooftshirts > 1) { 
              $nooftshirts = floor($nooftshirts / 2);
              $subtotal = $subtotal - ($nooftshirts * 101);
            }
            if($noof400shirts > 1) { 
              $noof400shirts = floor($noof400shirts / 3);
              $subtotal = $subtotal - ($noof400shirts * 201);
            }
            if($noof550shirts > 1) { 
              $noof550shirts = floor($noof550shirts / 2);
              $subtotal = $subtotal - ($noof550shirts * 101);
            }
            if($noofphants > 1) { 
              $noofphants = floor($noofphants / 2);
              $subtotal = $subtotal - ($noofphants * 301);
            }
            if($noofjeans > 1) { 
              $noofjeans = floor($noofjeans / 2);
              $subtotal = $subtotal - ($noofjeans * 301);
            }

            $order = new Order();
            $order->customerid = $userid;
            $order->price = $sumtotal;
            $order->offerprice = $subtotal;
            $order->paytype = 'CoD';
            $order->paystatus = 'Pending';
            $order->status = 'New';
            $order->paymentid = '';
            $order->details = '';
            $order->order_on = date('Y-m-d H:i:00');
            $order->save();

            foreach ($cartitems as $key => $value) {
              $unit = ProductUnits::where('id', $value->unitid)->first();
              $product = Products::where('id', $value->productid)->first();

              $orderedItems = new OrderedItems();
              $orderedItems->orderid = $order->id ?? 0;
              $orderedItems->productid = $value->productid;
              $orderedItems->unit_name = $unit->name;
              $orderedItems->quantity = $value->quantity;
              $orderedItems->amount = $unit->price;
              $orderedItems->save();

              $product::find($value->productid);
              $stock_avalible = $product->stock_avalible - $value->quantity;
              $product->stock_avalible = $stock_avalible;
              $product->save();
              
              Cart::where('id', $value->id)->delete();
            }

            echo '{"sts":"01","msg":"Order Placed","orderid":"'.$order->id.'"}';
          } else {
            echo '{"sts":"01","msg":"Your Cart is Empty!"}';
          }
          break;

        case 'Online':

          if(count($cartitems) > 0) {
            $noofjeans = $noofphants = $noof550shirts = $noof400shirts =  $nooftshirts = $subtotal = $sumtotal = 0;

            foreach ($cartitems as $key => $value) {
              $unit = ProductUnits::where('id', $value->unitid)->first();
              $product = Products::where('id', $value->productid)->first();

              $sumtotal = $sumtotal + ($unit->offerprice * $value->quantity);

              if($product->subcat_id == 24) {
                $nooftshirts = $nooftshirts + $value->quantity;
              }
              if(($product->subcat_id == 22 || $product->subcat_id == 23) && $unit->offerprice == 400) {
                $noof400shirts = $noof400shirts + $value->quantity;
              }
              if(($product->subcat_id == 22 || $product->subcat_id == 23) && $unit->offerprice == 550) {
                $noof400shirts = $noof400shirts + $value->quantity;
              }
              if($product->subcat_id == 25 || $product->subcat_id == 26) {
                $noofphants = $noofphants + $value->quantity;
              }
              if($product->subcat_id == 27) {
                $noofjeans = $noofjeans + $value->quantity;
              }
            }

            $sumtotal = $sumtotal + 80;
            $subtotal = $sumtotal;

            if($nooftshirts > 1) { 
              $nooftshirts = floor($nooftshirts / 2);
              $subtotal = $subtotal - ($nooftshirts * 101);
            }
            if($noof400shirts > 1) { 
              $noof400shirts = floor($noof400shirts / 3);
              $subtotal = $subtotal - ($noof400shirts * 201);
            }
            if($noof550shirts > 1) { 
              $noof550shirts = floor($noof550shirts / 2);
              $subtotal = $subtotal - ($noof550shirts * 101);
            }
            if($noofphants > 1) { 
              $noofphants = floor($noofphants / 2);
              $subtotal = $subtotal - ($noofphants * 301);
            }
            if($noofjeans > 1) { 
              $noofjeans = floor($noofjeans / 2);
              $subtotal = $subtotal - ($noofjeans * 301);
            }

            $order = new Order();
            $order->customerid = $userid;
            $order->price = $sumtotal;
            $order->offerprice = $subtotal;
            $order->paytype = 'Online';
            $order->paystatus = $paystatus ?? 'Pending';
            $order->status = 'New';
            $order->details = $details ?? '';
            $order->paymentid = $paymentid ?? '';
            $order->order_on = date('Y-m-d H:i:00');
            $order->save();

            foreach ($cartitems as $key => $value) {
              $unit = ProductUnits::where('id', $value->unitid)->first();
              $product = Products::where('id', $value->productid)->first();

              $orderedItems = new OrderedItems();
              $orderedItems->orderid = $order->id ?? 0;
              $orderedItems->productid = $value->productid;
              $orderedItems->unit_name = $unit->name;
              $orderedItems->quantity = $value->quantity;
              $orderedItems->amount = $unit->price;
              $orderedItems->save();

              if($paystatus != 'Failed') {
                $product::find($value->productid);
                $stock_avalible = $product->stock_avalible - $value->quantity;
                $product->stock_avalible = $stock_avalible;
                $product->save();
              }
              
              Cart::where('id', $value->id)->delete();
            }

            echo '{"sts":"01","msg":"Order Placed","orderid":"'.$order->id.'"}';
          } else {
            echo '{"sts":"01","msg":"Your Cart is Empty!"}';
          }
          break;


        default:
          echo '{"sts":"00","msg":"Something Went Wrong"}';
          break;
      }
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }


  public function orders(Request $request)
  {
    $userid = $request->input('userid') ?? '0';
    $status = $request->input('status') ?? '';
    $limit = $request->input('limit') ?? '10';
    $offset = $request->input('offset') ?? '0';

    $orders = Order::where('customerid', $userid)->orderBy('id', 'desc');
    if(isset($status) && $status != '' && $status != 'All') {
      $orders = $orders->where('status', $status);
    }
    $orders = $orders->offset($offset)->limit($limit)->get();

    $ordersArr = [];
    foreach ($orders as $key => $value) {
      $orderArr = new \stdClass();
      $orderArr->id = $value->id;
      $orderArr->customerid = $value->customerid;
      $orderArr->price = $value->price;
      $orderArr->offerprice = $value->offerprice;
      $orderArr->paytype = $value->paytype;
      $orderArr->paystatus = $value->paystatus;
      $orderArr->status = $value->status;
      $orderArr->paymentid = $value->paymentid;
      $orderArr->details = $value->details;
      $orderArr->order_on = $value->order_on;
      $orderArr->cname = Customers::where('id', $value->customerid)->value('name');
      $orderArr->cphone = Customers::where('id', $value->customerid)->value('phone');
      $orderArr->cemail = Customers::where('id', $value->customerid)->value('email');
      $orderArr->caddress = Customers::where('id', $value->customerid)->value('address');
      $ordersArr[] = $orderArr;
    }


    if(count($orders) > 0) {
      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['orders'] = $ordersArr;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"No Results Found!"}';
    }
  }


  public function order(Request $request)
  {
    $orderArr = [];
    $orderid = $request->input('orderid');

    $order = Order::where('id', $orderid)->first();

    if(isset($order) > 0) {
      $orderArr['id'] = $order->id;
      $orderArr['customerid'] = $order->customerid;
      $orderArr['price'] = $order->price;
      $orderArr['offerprice'] = $order->offerprice;
      $orderArr['paytype'] = $order->paytype;
      $orderArr['paystatus'] = $order->paystatus;
      $orderArr['status'] = $order->status;
      $orderArr['paymentid'] = $order->paymentid;
      $orderArr['details'] = $order->details;
      $orderArr['order_on'] = $order->order_on;
      $orderArr['cname'] = Customers::where('id', $order->customerid)->value('name');
      $orderArr['cphone'] = Customers::where('id', $order->customerid)->value('phone');
      $orderArr['cemail'] = Customers::where('id', $order->customerid)->value('email');
      $orderArr['caddress'] = Customers::where('id', $order->customerid)->value('address');
      $orderArr['cpincode'] = Customers::where('id', $order->customerid)->value('pincode');
      $orderArr['carea'] = Customers::where('id', $order->customerid)->value('area');
      $orderArr['cdistrict'] = Customers::where('id', $order->customerid)->value('district');
      $orderArr['cstate'] = Customers::where('id', $order->customerid)->value('state');

      $orderItems = OrderedItems::where('ordered_items.orderid', $id)->join('products', 'ordered_items.productid', '=', 'products.id')->select('ordered_items.unit_name', 'ordered_items.quantity', 'ordered_items.amount', 'products.name as productname', 'products.image as productimage', 'products.desc as productdesc')->get();

      $data = [];
      $data['sts'] = '01';
      $data['msg'] = 'Success';
      $data['orders'] = $orderArr;
      $data['orderItems'] = $orderItems;
      echo json_encode($data);
    } else {
      echo '{"sts":"00","msg":"No Results Found!"}';
    }
  }




  public function changeOrderStatus(Request $request, $id)
  {
    $status = $request->input('status') ?? 'Accepted';

    if($id > 0) {
      $order = Order::find($id);
      $order->status = $request->input('status') ?? 'New';
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


  public function changePaymentStatus(Request $request, $id)
  {
    $status = $request->input('status') ?? 'Pending';

    if($id > 0) {
      $order = Order::find($id);
      $order->paystatus = $request->input('status') ?? 'Pending';
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

  public function orderUpdate($id, Request $request)
  {
    $paystatus = $request->input('paystatus') ?? 'Pending';
    $status = $request->input('status') ?? 'New';

    if($id > 0) {
      $order = Order::find($id);
      $order->paystatus = $paystatus ?? 'Pending';
      $order->status = $status ?? 'New';
      $order->paymentid = $request->input('paymentid') ?? '';
      $order->details = $request->input('details') ?? '';
      $order->save();

      if($paystatus == 'Failed') {
        $orderItems = OrderedItems::where('orderid', $id)->get();
        foreach ($orderItems as $key => $value) {
          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible + $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();
        }
      }

      if($paystatus != 'Failed' && ($status == 'Cancelled' || $status == 'Rejected')) {
        $orderItems = OrderedItems::where('orderid', $id)->get();
        foreach ($orderItems as $key => $value) {
          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible + $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();
        }
      }
      echo '{"sts":"01","msg":"Order Updated"}';
    } else {
      echo '{"sts":"00","msg":"Something Went Wrong"}';
    }
  }


  public function notifications(Request $request)
  {
    $data = [];
    $data['sts'] = '01';
    $data['msg'] = 'Success';
    $data['notifications'] = Notifications::orderBy('id', 'desc')->get();
    echo json_encode($data);
  }

  public function searchSubcategory(Request $request)
  {
    $options = [];
    $term = $request->input('term') ?? '';
    $search = $request->input('search') ?? 'false';
    $cat_id = $request->input('cat_id') ?? '';

    $cats = SubCategory::whereRaw("name LIKE '%$term%'")->select('id','name');
    if($cat_id > 0) {
      $cats = $cats->where('cat_id', $cat_id);
    }
    $cats = $cats->limit(10)->get();

    if($search == 'true') {
      $option = new \stdClass();
      $option->id = '0';
      $option->text = 'Select Sub-Category';
      $options[] = $option;
    }

    if(count($cats) > 0) {
      foreach ($cats as $value) {
        $option = new \stdClass();
        $option->id = $value->id;
        $option->text = $value->name;
        $options[] = $option;
      }
      echo json_encode(['results' => $options ?: []]);
    }
  }


}
