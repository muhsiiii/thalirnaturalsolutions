<?php

namespace App\Http\Controllers;

use App\Cart;

use App\Order;
use App\Banners;
use App\Category;
use App\Products;
use App\Customers;
use App\SubCategory;
use App\ProductUnits;
use App\Notifications;
use App\OrderedItems;
use App\Settings;
use App\Address;
use App\Blogs;
use App\Ingredients;
use App\Benefits;
use App\Reviews;
use App\ShopReviews;
use App\HowToUse;
use App\ProductFaqs;

use Helper;




use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent as Agent;
use Illuminate\Support\Facades\Session;

date_default_timezone_set('Asia/Kolkata');

class HomeController extends Controller
{

  public function index()
  {

    if(!Session::has('userid'))
    {
      $temp_userid = time().rand(1000,9999);
      Session::put('userid', $temp_userid);
      Session::put('username', "Guest User");
    }


    $mobile = 0;
    $Agent = new Agent();

    $userid = Session::get('userid') ?? '0';
    $username = Session::get('username') ?? 'Guest User';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
    $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();

    $subCategories = SubCategory::All();
    $category = Category::pluck('name', 'id');

    if ($Agent->isMobile()) {
      $mobile = 1;
      $banners = Banners::where('type', '3')->inRandomOrder()->get();
    } else {
      $banners = Banners::where('type', '1')->inRandomOrder()->get();
    }
    $sbanners = Banners::where('type', '2')->inRandomOrder()->get();

    $popularsProducts = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->where('best_seller', '1')->where('row_status','New')->limit(8)->inRandomOrder()->get();
    $settings = Settings::where('id','1')->first();

    $newProducts = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->orderBy('id', 'desc')->limit(10)->get();
    $settings = Settings::where('id','1')->first();
    $shopreviews = ShopReviews::where('status','Active')->orderBy('id', 'desc')->paginate(10);
    $relatedProducts = Products::relateProducts();


    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Home',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'banners' => $banners,
      'popularsProducts' => $popularsProducts,
      'sbanners' => $sbanners,
      'category' => $category,
      'mobile' => $mobile,
      'settings' => $settings,
      'newProducts' => $newProducts,
      'shopreviews' => $shopreviews,
      'relatedProducts' => $relatedProducts,
    ];
    return view('index')->with($data);
  }


  public function login()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Login',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'relatedProducts' => $relatedProducts,

    ];

    return view('login')->with($data);
  }


  public function check(Request $request)
  {
    $user = Customers::where('phone', $request->input('phone'))->where('password', md5($request->input('password')))->first();
    if($user) {
      Session::put('userid', $user->id);
      Session::put('username', $user->name);
      return redirect('/')->with('success', 'You have been Successfully Loged In');
    } else {
      return redirect('/')->with('error', 'Invalid User Name or Password');
    }
  }


  public function register()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Registration',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('register')->with($data);
  }


  public function save(Request $request)
  {
    $user = new Customers();
    $user->name = ucwords($request->input('name')) ?? '';
    $user->email = strtolower($request->input('email')) ?? '';
    $user->password = md5($request->input('password')) ?? '';
    $user->address = $request->input('address') ?? '';
    $user->phone = $request->input('phone') ?? '';
    $user->pincode = $request->input('pincode') ?? '';
    $user->area = ucwords($request->input('area')) ?? '';
    $user->district = $request->input('district') ?? '';
    $user->state = $request->input('state') ?? '';
    $user->join_on = date('Y-m-d H:i:00');
    $user->save();

    Session::put('userid', $user->id);
    Session::put('username', $user->name);

    return redirect('/')->with('success', 'You have been Successfully Registered');
  }


  public function logout()
  {
    Session::forget('userid');
    Session::forget('username');

    return redirect('/')->with('success', 'You have been Successfully Loged Out');
  }

  public function products(Request $request)
  {
    $Agent = new Agent();
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();

    $cat = base64_decode($request->input('cat')) ?? '0';
    $subcat = base64_decode($request->input('subcat')) ?? '0';

    $categories = Category::All();
    $subCategories = SubCategory::All();
    $subCats = SubCategory::All();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Products',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'subCats' => $subCats,
      'subcat' => $subcat,
      'cat' => $cat
    ];

    if ($Agent->isMobile()) {
      return view('products_mobile')->with($data);
    } else {
      return view('products')->with($data);
    }
  }




  public function product($id)
  {
    $ratings = [];

    $Agent = new Agent();
    $product = Products::find($id);
    if($product->row_status != "New")
    {
      return redirect('/')->with('error', 'Invalid Product!');
    }


    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
    $categories = Category::with(['products','products.reviews'])->limit(3)->get();
    $subCategories = SubCategory::All();
    $relatedProducts = Products::relateProducts();

    $category = Category::pluck('name', 'id');
    $subCategory = SubCategory::pluck('name', 'id');
    $units = ProductUnits::where('productid', $id)->orderBy('disp_order', 'asc')->get();
    $unitsCount = ProductUnits::where('productid', $id)->where('status', 'Enabled')->orderBy('disp_order', 'asc')->count();
    $similarProducts = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->where('cat_id', $product->cat_id)->where('id', '!=', $id)->limit(15)->inRandomOrder()->get();
    $settings = Settings::where('id','1')->first();
    $ingredients = Ingredients::where('productid', $id)->get();
    $benefits = Benefits::where('productid', $id)->get();
    $reviews = Reviews::where('product_id', $id)->get();
    $howtouse = HowToUse::where('productid', $id)->orderBy('step', 'asc')->get();
    $productfaqs = ProductFaqs::where('productid', $id)->orderBy('id', 'asc')->get();
    // $ratings = Reviews::select('avg(rating) AS avg_rating')->where('customerid', $userid)->where('product_id', $id)->where('rating','>', '0')->get();
    $fivestarCount = Reviews::where('product_id', $id)->where('rating', 5)->count();
    $fourstarCount = Reviews::where('product_id', $id)->where('rating', 4)->count();
    $threestarCount = Reviews::where('product_id', $id)->where('rating', 3)->count();
    $twostarCount = Reviews::where('product_id', $id)->where('rating', 2)->count();
    $onestarCount = Reviews::where('product_id', $id)->where('rating', 1)->count();

    $avgRating = Reviews::where('product_id', $id)->pluck('rating')->avg();

    $totalcount = $fivestarCount +$fourstarCount+$threestarCount+$twostarCount+$onestarCount;

    $ratings = [
      'fivestarCount' => $fivestarCount,
      'fourstarCount' => $fourstarCount,
      'threestarCount' => $threestarCount,
      'twostarCount' => $twostarCount,
      'onestarCount' => $onestarCount,
      'totalcount' => $totalcount,

    ];


    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Registration',
      'product' => $product,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'category' => $category,
      'subCategory' => $subCategory,
      'units' => $units,
      'unitsCount' => $unitsCount,
      'similarProducts' => $similarProducts,
      'settings' => $settings,
      'ingredients' => $ingredients,
      'benefits' => $benefits,
      'reviews' => $reviews,
      'ratings' => $ratings,
      'avgRating' => $avgRating,
      'howtouse' => $howtouse,
      'productfaqs' => $productfaqs,
      'relatedProducts' => $relatedProducts,
    ];

    return view('product')->with($data);
  }


  public function profile()
  {
    if(Session::get('userid') > 0) {} else {
      return redirect('/')->with('error', 'Session TimeOut, Please Login!');
    }

    $Agent = new Agent();

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $user = Customers::find(Session::get('userid'));
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'My Profile',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'user' => $user,
      'settings' => $settings,
      'contentHeader' => "myprofile",
      'relatedProducts' => $relatedProducts,
    ];


    if ($Agent->isMobile()) {
      return view('profile.myprofile_mobile')->with($data);
    } else {
      return view('profile.myprofile')->with($data);
    }
  }


  public function profileEdit()
  {
    if(Session::get('userid') > 0) {} else {
      return redirect('/')->with('error', 'Session TimeOut, Please Login!');
    }

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $user = Customers::find(Session::get('userid'));
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'My Profile',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'user' => $user,
      'settings' => $settings,
      'contentHeader' => "myprofile",
      'relatedProducts' => $relatedProducts,
    ];

    return view('profile.myprofileedit')->with($data);
  }


  public function update($id, Request $request)
  {
    $user = Customers::find($id);
    $user->name = ucwords($request->input('name')) ?? '';
    $user->email = strtolower($request->input('email')) ?? '';
    $user->address = $request->input('address') ?? '';
    $user->pincode = $request->input('pincode') ?? '';
    $user->area = ucwords($request->input('area')) ?? '';
    $user->district = $request->input('district') ?? '';
    $user->state = $request->input('state') ?? '';
    $user->save();

    return redirect('/profile')->with('success', 'Your Profile is Updated.');
  }


  public function change()
  {
    if(Session::get('userid') > 0) {} else {
      return redirect('/')->with('error', 'Session TimeOut, Please Login!');
    }

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
    $categories = Category::All();
    $subCategories = SubCategory::All();
    $user = Customers::find(Session::get('userid'));
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'My Profile',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'user' => $user,
      'relatedProducts' => $relatedProducts,
    ];

    return view('change')->with($data);
  }


  public function savePassword(Request $request, $id)
  {
    $user = Customers::where('id', Session::get('userid'))->where('password', md5($request->input('password')))->first();
    if($user) {
      $user = Customers::find($id);
      $user->password = md5($request->input('npassword'));
      $user->save();

      return redirect('/change')->with('success', 'Password Updated');
    } else {
      return redirect('/change')->with('error', 'Invalid Password!');
    }
  }


  public function notifications()
  {
    if(Session::get('userid') > 0) {} else {
      return redirect('/')->with('error', 'Session TimeOut, Please Login!');
    }

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
    $categories = Category::All();
    $subCategories = SubCategory::All();
    $notifications = Notifications::orderBy('id', 'desc')->limit(10)->get();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'My Profile',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'notifications' => $notifications,
      'relatedProducts' => $relatedProducts,
    ];

    return view('notifications')->with($data);
  }


  public function myorders()
  {
    if(Session::get('userid') > 0) {} else {
      return redirect('/')->with('error', 'Session TimeOut, Please Login!');
    }

    $Agent = new Agent();

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = Subcategory::All();
    $orders = Order::orderBy('id', 'desc')->where('customerid', $userid)->with(['orderItems'])->paginate(10);
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();


    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'My Profile',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'orders' => $orders,
      'settings' => $settings,
      'contentHeader' => "orders",
      'relatedProducts' => $relatedProducts,
    ];

    // echo "<pre>";
    // print_r($orders);
    // die;


    if ($Agent->isMobile()) {
      return view('profile.orders_mobile')->with($data);
    } else {
      return view('profile.orders')->with($data);
    }
  }

  public function viewOrders($id)
  {
    if(Session::get('userid') > 0) {} else {
      return redirect('/')->with('error', 'Session TimeOut, Please Login!');
    }

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = Subcategory::All();
    $order = Order::where('id', $id)->first();
    $orderItems = OrderedItems::where('orderid', $id)->get();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'My Profile',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'order' => $order,
      'orderItems' => $orderItems,
      'relatedProducts' => $relatedProducts,
    ];

    return view('vieworders')->with($data);
  }

  public function checkout()
  {
    $username = Session::get('username') ?? 'Guest User';
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
    $category = Category::pluck('name', 'id');
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $carts = Cart::where('uniqueid', Session::get('userid'))->get();
    $settings = Settings::where('id','1')->first();
    $addresses = Address::where('customerid',Session::get('userid'))->get();
    $relatedProducts = Products::relateProducts();


    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Checkout',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'carts' => $carts,
      'category' => $category,
      'settings' => $settings,
      'addresses' => $addresses,
      'key' => env('razor_key'),
      'relatedProducts' => $relatedProducts,
    ];

    if($username == "Guest User")
    return view('guest-checkout')->with($data);
    else
    return view('checkout')->with($data);

  }


  public function placeOrderCoD(Request $request)
  {
    if(Session::get('userid') > 0) {
      $cartitems = Cart::where('uniqueid', Session::get('userid'))->get();
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
        $order->customerid = Session::get('userid');
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

        return redirect('/payment-success');
      } else {
        return redirect('/checkout')->with('error', 'Your Cart is Empty!');
      }
    } else {
      return redirect('/login')->with('error', 'Session TimeOut, Please Login!');
    }
  }

  public function placeOrderOnline(Request $request)
  {
    $sumtotal = 0;

    if(Session::get('userid') > 0) {
      $noofjeans = $noofphants = $noof550shirts = $noof400shirts = $nooftshirts = $subtotal = 0;
      $cartitems = Cart::where('uniqueid', Session::get('userid'))->get();
      if(count($cartitems) > 0) {
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
        $order->customerid = Session::get('userid');
        $order->price = $sumtotal;
        $order->offerprice = $subtotal;
        $order->paytype = 'Online';
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
          $orderedItems->amount = $unit->offerprice;
          $orderedItems->save();

          $product::find($value->productid);
          $stock_avalible = $product->stock_avalible - $value->quantity;
          $product->stock_avalible = $stock_avalible;
          $product->save();

          Cart::where('id', $value->id)->delete();
        }

        $customer = Customers::where('id', Session::get('userid'))->first();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:afb09837a3aa6e557760bc613eae0bed",
                          "X-Auth-Token:9edf4aa5687639a9a1d8bd30fc14f83e"));
        // curl_setopt($ch, CURLOPT_HTTPHEADER,
        //             array("X-Api-Key:test_e86ef48d72261e86b6515b319c5",
        //                   "X-Auth-Token:test_81cc9f1e7a652bea8d0a92e129c"));
        $payload = Array(
            'purpose' => 'Signupcasuals Order of Amount: '.$subtotal,
            'amount' => $subtotal,
            'phone' => $customer->phone,
            'buyer_name' => $customer->name,
            'redirect_url' => url('/payresult'),
            'send_email' => true,
            'send_sms' => true,
            'email' => $customer->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($ch);
        curl_close($ch);
        $response = json_decode($response);

        Session::put('paymentid', $response->payment_request->id);
        Session::put('orderid', $order->id);

        return redirect($response->payment_request->longurl);

      } else {
        return redirect('/checkout')->with('error', 'Your Cart is Empty!');
      }
    } else {
      return redirect('/login')->with('error', 'Session TimeOut, Please Login!');
    }
  }

  public function payresult(Request $request)
  {
    $paymentid = Session::get('paymentid');
    $orderid = Session::get('orderid');

    $details = [];
    $details['razorpay_payment_id'] = $request->input('razorpay_payment_id');
    $details['payment_status'] = $request->input('status');
    $details['payment_request_id'] = $request->input('razorpay_order_id');

    if($request->input('payment_status') == 'Credit') {
      $payment_status = 'Success';
    } elseif($request->input('payment_status') == 'Failed') {
      $payment_status = 'Failed';
    } else {
      $payment_status = 'Pending';
    }

    $order = Order::find($orderid);
    $order->paymentid = $request->input('razorpay_payment_id') ?? '';
    $order->paystatus = $payment_status ?? 'Pending';
    $order->details = $details;
    $order->save();

    if($payment_status == 'Failed') {
      $orderItems = OrderedItems::where('orderid', $orderid)->get();
      foreach ($orderItems as $key => $value) {
        $product::find($value->productid);
        $stock_avalible = $product->stock_avalible + $value->quantity;
        $product->stock_avalible = $stock_avalible;
        $product->save();
      }
    }

    if($payment_status == 'Success' || $payment_status == 'Pending') {
      $data = [
        "orderid" => $orderid
      ];
      Session::put('ordersuccessdetails',$data);

      return redirect('/payment-success');
    } else {
      die;
      return redirect('/')->with('error', 'Payment Failed Try Again!');
    }
  }


  public function paySuccess($orderid = '')
  {

    $userid = Session::get('userid') ?? '0';
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $settings = Settings::where('id','1')->first();

    if(Session::has('ordersuccessdetails'))
    {
      $ordersuccessdetails  = Session::get('ordersuccessdetails');

      $order = Order::where('id', $ordersuccessdetails['orderid'])->with(['orderItems'])->first();
		if($order->paytype=='Online')
		{
		$order->paystatus = 'Success' ?? 'Pending';
    	$order->save();
		}
      $data = [
        'userid' => $userid,
        'username' => Session::get('username') ?? '',
        'title' => 'Payment Success',
        'orderid' => $orderid,
        'categories' => $categories,
        'settings' => $settings,
        'order' => $order,
        'cartCount' => 0,
      ];

      return view('order-success')->with($data);

    }else{
      return redirect('/'.$slugname);
    }



  }


  public function about()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'About Us',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('about')->with($data);
  }


  public function terms()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('terms')->with($data);
  }


  public function privacy()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('privacy')->with($data);
  }

  public function contact()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'relatedProducts' => $relatedProducts,
    ];

    return view('contact')->with($data);
  }

  public function return()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('return')->with($data);
  }

  public function shipping()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('shipping')->with($data);
  }

  public function refund()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('refund')->with($data);
  }

  public function blog()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $blogs = Blogs::where('status', "Active")->limit(10)->get();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Blog',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'blogs' => $blogs,
      'relatedProducts' => $relatedProducts,
    ];

    return view('blog')->with($data);
  }

  public function contactus()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Help & Support',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('contactus')->with($data);
  }

  public function track()
  {
    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Track Orders',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'relatedProducts' => $relatedProducts,
    ];

    return view('trackandorder')->with($data);
  }

  public function updateProfile(Request $request,$id)
  {
    $userid = Session::get('userid') ?? '0';

    $userEmailCount = Customers::where('id','!=' ,$userid)->where('email',$request->input('email'))->count();

    if($userEmailCount > 0){
      return redirect('/profile')->with('error', 'Email Alreday Taken');
    }

    $user = Customers::find($id);
    $user->name = ucwords($request->input('name')) ?? '';
    $user->email = strtolower($request->input('email')) ?? '';
    $user->save();

    return redirect('/profile')->with('success', 'Sucessfully Updated Profile');
  }

  public function saveReview(Request $request,$productid)
  {
    if(Session::get('username') != "Guest User")
    $userid = Session::get('userid') ?? '0';
    else
    $userid = '0';

    if(Session::get('userid') > 0) {} else {
      return redirect('/product/'.$productid)->with('error', 'Please login!');
    }

    $review = Reviews::where('product_id', $productid)->where('customerid',$userid);


    if (Reviews::where('product_id', $productid)->where('customerid',$userid)->exists() && Session::get('username') != "Guest User")
      $review = Reviews::where('product_id', $productid)->where('customerid',$userid)->first();
    else
      $review = new Reviews();


    $review->customerid = Session::get('userid');
    $review->product_id = $productid;
    $review->customername = ucwords($request->input('name')) ?? '';
    $review->rating = $request->input('rating') ?? '0';
    $review->comment =  $request->input('comment') ?? '';
    $review->save();

    return redirect('/product/'.$productid)->with('success', 'Sucessfully Submitted Review');
  }

  public function showCategoryProducts($cat_id,$subcat)
  {

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $category = Category::pluck('name', 'id');
    $settings = Settings::where('id','1')->first();
    $relatedProducts = Products::relateProducts();

	  	if($subcat==0)
		{
    $categoryproducts =  Category::with(
        ['products' =>
        function ($query) {
          $query->where('row_status','New');
        }])
        ->where('id',$cat_id)->first();
		}
	  else
	  {

	$categoryproducts =  SubCategory::with(
        ['products' =>
        function ($query) {
          $query->where('row_status','New');
        }])
        ->where('id',$subcat)->first();

	  }

    $data = [
      'userid' => $userid,
      'title' => 'Categories',
      'username' => Session::get('username') ?? '',
      'categories' => $categories,
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'category' => $category,
      'settings' => $settings,
      'categoryproducts' => $categoryproducts,
      'relatedProducts' => $relatedProducts,
    ];

    return view('listproducts')->with($data);
  }

  public function trackOrder(Request $request)
  {
    $orderid = $request->input('orderid');

    $userid = Session::get('userid') ?? '0';
    // $cartCount = Cart::where('uniqueid', $userid)->count();
    $cartCount = Cart::where('uniqueid', $userid)->sum('quantity');
    $cartItems = Cart::where('uniqueid', $userid)->get();
        $categories = Category::with(['products' =>
      function ($query) {
        $query->where('row_status','New');
      }
    ])->limit(3)->get();
    $subCategories = SubCategory::All();
    $settings = Settings::where('id','1')->first();
    $orderdetails = Order::where('id',$orderid)->where('customerid', $userid)->with(['orderItems'])->first();
    $relatedProducts = Products::relateProducts();

    if(!$orderdetails){
      return redirect('/track')->with('error', 'Invalid OrderId');
    }

    $data = [
      'userid' => $userid,
      'username' => Session::get('username') ?? '',
      'title' => 'Track Orders',
      'cartCount' => $cartCount ?? '0',
      'cartItems' => $cartItems,
      'categories' => $categories,
      'subCategories' => $subCategories,
      'settings' => $settings,
      'orderdetails' => $orderdetails,
      'relatedProducts' => $relatedProducts,
    ];


    return view('trackandorderresult')->with($data);
  }





}
