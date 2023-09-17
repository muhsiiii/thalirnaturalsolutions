<?php

namespace App\Http\Controllers;
use Session;
use App\Customers;
use App\Address;
use App\Cart;
use App\Products;
use App\ProductUnits;
use App\Order;
use App\Category;
use App\OrderedItems;
use App\Shops;
use App\AdminSettings;
use App\SellerSettings;
use Helper;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Razorpay\Api\Api;

class CheckOutController extends Controller
{

    public function index($search,Request $request) {

    }

    public function placeOrderCoD(Request $request)
    {
      if(Session::get('userid') > 0) {
        $address = Address::where('customerid',  Session::get('userid'))->where('default_address','1')->first();
        $cartitems = Cart::where('uniqueid', Session::get('userid'))->get();
        if(count($cartitems) > 0) {
          $sumtotal = 0;

          foreach ($cartitems as $key => $value) {
            // $unit = ProductUnits::where('id', $value->unitid)->first();
            $product = Products::where('id', $value->productid)->first();

            $sumtotal = $sumtotal + ($product->offerprice * $value->quantity);


          }

          $sumtotal = $sumtotal + 0;
          $subtotal = $sumtotal +45;

          $order = new Order();
          $order->customerid = Session::get('userid');
          $order->price = $sumtotal;
          $order->offerprice = $subtotal;
          $order->paytype = 'CoD';
          $order->paystatus = 'Pending';
          $order->status = 'New';
          $order->addressid = $address->id ?? '0';
          // $order->paymentid = '';
          $order->details = '';
          $order->order_on = date('Y-m-d H:i:00');
          $order->save();

          foreach ($cartitems as $key => $value) {
            $unit = ProductUnits::where('id', $value->unitid)->first();
            $product = Products::where('id', $value->productid)->first();

            $orderedItems = new OrderedItems();
            $orderedItems->orderid = $order->id ?? 0;
            $orderedItems->productid = $value->productid;
            $orderedItems->product_name = $product->name;
            $orderedItems->quantity = $value->quantity;
            $orderedItems->amount = $product->offerprice;
            $orderedItems->offerprice = $product->offerprice;
            $orderedItems->save();

            $product::find($value->productid);
            $stock_avalible = $product->stock_avalible - $value->quantity;
            $product->stock_avalible = $stock_avalible;
            $product->save();

            Cart::where('id', $value->id)->delete();
          }

          $data = [
            "orderid" => $order->id
          ];
          Session::put('ordersuccessdetails',$data);

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
        $subtotal = 0;
        $cartitems = Cart::where('uniqueid', Session::get('userid'))->get();
        $address = Address::where('customerid',  Session::get('userid'))->where('default_address','1')->first();
        if(count($cartitems) > 0) {
          foreach ($cartitems as $key => $value) {
            // $unit = ProductUnits::where('id', $value->unitid)->first();
            $product = Products::where('id', $value->productid)->first();

            $sumtotal = $sumtotal + ($product->offerprice * $value->quantity);

          }

          $sumtotal = $sumtotal + 0;
          $subtotal = $sumtotal + 45;




          $order = new Order();
          $order->customerid = Session::get('userid');
          $order->price = $sumtotal;
          $order->offerprice = $subtotal;
          $order->paytype = 'Online';
          $order->paystatus = 'Pending';
          $order->status = 'New';
          $order->addressid = $address->id ?? '0';
          // $order->paymentid = '';
          $order->details = '';
          $order->order_on = date('Y-m-d H:i:00');
          $order->save();

          foreach ($cartitems as $key => $value) {
            $unit = ProductUnits::where('id', $value->unitid)->first();
            $product = Products::where('id', $value->productid)->first();

            $orderedItems = new OrderedItems();
            $orderedItems->orderid = $order->id ?? 0;
            $orderedItems->productid = $value->productid;
            $orderedItems->product_name = $product->name;
            $orderedItems->quantity = $value->quantity;
            $orderedItems->amount = $product->offerprice;
			$orderedItems->offerprice = $product->offerprice;
            $orderedItems->save();

            $product::find($value->productid);
            $stock_avalible = $product->stock_avalible - $value->quantity;
            $product->stock_avalible = $stock_avalible;
            $product->save();

            Cart::where('id', $value->id)->delete();
          }

          $customer = Customers::where('id', Session::get('userid'))->first();

          $input = $request->all();
          $paymentapi = new Api(env('razor_key'), env('razor_secret'));


          $orderData = [
            'receipt'         => "test",
            'amount'          => $subtotal * 100, // 39900 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
          ];


          $razorpayOrder = $paymentapi->order->create($orderData);
          $razorpayOrderId = $razorpayOrder['id'];
          Session::put('razorpay_order_id', $razorpayOrderId);
          Session::put('orderid', $order->id);
          $displayAmount = $amount = $orderData['amount'];


          $data = [
            "key"               => env('razor_key'),
            "amount"            => intval($subtotal),
            "name"              => "Thalir Natural Solutions",
            "description"       => "Tron Legacy",
            "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
            "prefill"           => [
            "name"              => "$customer->name",
            "email"             => "$customer->email",
            "contact"           => "$customer->phone",
            ],
            "notes"             => [
            "address"           => "Hello World",
            "merchant_order_id" => "12312321",
            ],
            "theme"             => [
            "color"             => "#008C16"
            ],
            "order_id"          => $razorpayOrderId,
            "orderid"           => $order->id
          ];


          return view('payment')->with($data);
        } else {
          return redirect('/checkout')->with('error', 'Your Cart is Empty!');
        }
      } else {
        return redirect('/login')->with('error', 'Session TimeOut, Please Login!');
      }
    }

    public function paySuccess($orderid = '')
    {
      print_r($orderid);
      die;
      $userid = Session::get('userid') ?? '0';
      $categories = Category::with(['products'])->limit(3)->get();
      $settings = Settings::where('id','1')->first();


      $data = [
        'userid' => $userid,
        'username' => Session::get('username') ?? '',
        'title' => 'Payment Success',
        'orderid' => $orderid,
        'categories' => $categories,
        'settings' => $settings,
        'cartCount' => 0,
      ];

      return view('order-success')->with($data);
    }









}
