<?php

namespace App\Http\Controllers;

use File;

use Form;
use App\Products;
use App\Category;
use App\SubCategory;
use App\ProductUnits;
use App\Ingredients;
use App\Benefits;
use App\Reviews;
use App\HowToUse;
use App\ProductFaqs;
use App\Cart;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Kolkata');

class AdminProductsController extends Controller
{
  public function __construct(Request $request, Redirector $redirect)
  {
    $this->middleware(function ($request, $next) {
      if (!Auth::id() || (isset(Auth::user()->type) && Auth::user()->type != 'superadmin')) {
        return redirect('/admin/login');
      }
      return $next($request);
    });
  }


  public function index(Request $request)
  {

    $status = $request->input('s') ?? '';
    $search = $request->input('q') ?? '';
    $slimit = $request->input('slimit') ?? '10';
    $scategory = $request->input('scategory') ?? '';

    $products = Products::orderBy('id', 'desc')->where('row_status','New');
    if(isset($status) && $status != '' && $status != 'All') {
      $products = $products->where('status', $status);
    }
    if(isset($sshop) && $sshop > 0) {
      $products = $products->where('shopid', $sshop);
    }
    if(isset($scategory) && $scategory > 0) {
      $products = $products->where('cat_id', $scategory);
    }
    if(isset($search) && $search != '') {
      $products = $products->where('name', 'like', "%{$search}%")
                            ->orWhere('id', $search);
    }

    $products = $products->paginate($slimit);
    $category = Category::pluck('name', 'id');
    $subCategory = SubCategory::pluck('name', 'id');

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'products' => $products,
      'status' => $status,
      'search' => $search,
      'slimit' => $slimit,
      'category' => $category,
      'subCategory' => $subCategory,
      'scategory' => $scategory
    ];

    return view('admin.products.index')->with($data);
  }


  public function create()
  {
    $category = Category::pluck('name', 'id');
    $subCategory = SubCategory::pluck('name', 'id');

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Add Product',
      'subCategory' => $subCategory,
      'category' => $category
    ];

    return view('admin.products.create')->with($data);
  }

  public function store(Request $request)
  {
    $ihd = date('ihd');
    $image = $image2 = $image3 = $image4 = $image5 = $image6 = '';
    $slugname = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $request->input('name')));

    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'.'.$extension);
      $image = 'uploads/products/' . $slugname.$ihd.'.' .$extension;
    }

    if($request->hasFile('image2')) {
      $getimage = $request->file('image2');
      $extension = $request->file('image2')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'2.'.$extension);
      $image2 = 'uploads/products/' . $slugname.$ihd.'2.' .$extension;
    }

    if($request->hasFile('image3')) {
      $getimage = $request->file('image3');
      $extension = $request->file('image3')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'3.'.$extension);
      $image3 = 'uploads/products/' . $slugname.$ihd.'3.' .$extension;
    }

    if($request->hasFile('image4')) {
      $getimage = $request->file('image4');
      $extension = $request->file('image4')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'4.'.$extension);
      $image4 = 'uploads/products/' . $slugname.$ihd.'4.' .$extension;
    }
	  
	  if($request->hasFile('image5')) {
      $getimage = $request->file('image5');
      $extension = $request->file('image5')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'5.'.$extension);
      $image5 = 'uploads/products/' . $slugname.$ihd.'5.' .$extension;
    }
	  if($request->hasFile('image6')) {
      $getimage = $request->file('image6');
      $extension = $request->file('image6')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'6.'.$extension);
      $image6 = 'uploads/products/' . $slugname.$ihd.'6.' .$extension;
    }
	  
	  

    $products = new Products();
    $products->cat_id = $request->input('cat_id') ?? '0';
    $products->subcat_id = $request->input('subcat_id') ?? '0';
    $products->name = $request->input('name') ?? '';
    $products->desc = $request->input('desc') ?? '';
    $products->disclaimer = $request->input('disclaimer') ?? '';
    $products->price = $request->input('price') ?? '0';
    $products->offerprice = $request->input('offerprice') ?? '0';
    $products->best_seller = $request->input('best_seller') ?? '0';
    $products->featured = $request->input('featured') ?? '0';
    $products->trending = $request->input('trending') ?? '0';
    $products->status = $request->input('status') ?? '';
    $products->image = $image ?? '';
    $products->image2 = $image2 ?? '';
    $products->image3 = $image3 ?? '';
    $products->image4 = $image4 ?? '';
	$products->image5 = $image5 ?? '';
	$products->image6 = $image6 ?? '';
    $products->heading = $request->input('heading') ?? '';
    $products->sub_heading = $request->input('sub_heading') ?? '';
    $products->features = $request->input('features') ?? '';
    $products->save();

    return redirect('/admin/products')->with('success', 'Product Added');
  }


  public function show($id)
  {
    $product = Products::find($id);
    $category = Category::pluck('name', 'id');
    $subCategory = SubCategory::pluck('name', 'id');

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Edit Product',
      'product' => $product,
      'category' => $category ?? '',
      'subCategory' => $subCategory ?? ''
    ];

    return view('admin.products.edit')->with($data);
  }


  public function update(Request $request, $id)
  {
    $ihd = date('ihd');
    $image = $image2 = $image3 = $image4 = $image5 = $image6 = '';
    $slugname = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $request->input('name')));


    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'.'.$extension);
      $image = 'uploads/products/' .$slugname.$ihd.'.' .$extension;
    }

    if($request->hasFile('image2')) {
      $getimage = $request->file('image2');
      $extension = $request->file('image2')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'2.'.$extension);
      $image2 = 'uploads/products/' . $slugname.$ihd.'2.' .$extension;
    }

    if($request->hasFile('image3')) {
      $getimage = $request->file('image3');
      $extension = $request->file('image3')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'3.'.$extension);
      $image3 = 'uploads/products/' . $slugname.$ihd.'3.' .$extension;
    }

    if($request->hasFile('image4')) {
      $getimage = $request->file('image4');
      $extension = $request->file('image4')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'4.'.$extension);
      $image4 = 'uploads/products/' . $slugname.$ihd.'4.' .$extension;
    }
	   if($request->hasFile('image5')) {
      $getimage = $request->file('image5');
      $extension = $request->file('image5')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'5.'.$extension);
      $image5 = 'uploads/products/' . $slugname.$ihd.'5.' .$extension;
    }
	   if($request->hasFile('image6')) {
      $getimage = $request->file('image6');
      $extension = $request->file('image6')->getClientOriginalExtension();
      $path = 'uploads/products/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $slugname.$ihd.'6.'.$extension);
      $image6 = 'uploads/products/' . $slugname.$ihd.'6.' .$extension;
    }

    $products = Products::find($id);
    $products->cat_id = $request->input('cat_id') ?? '0';
    $products->subcat_id = $request->input('subcat_id') ?? '0';
    $products->name = $request->input('name') ?? '';
    $products->desc = $request->input('desc') ?? '';
    $products->disclaimer = $request->input('disclaimer') ?? '';
    $products->price = $request->input('price') ?? '0';
    $products->offerprice = $request->input('offerprice') ?? '0';
    $products->best_seller = $request->input('best_seller') ?? '0';
    $products->featured = $request->input('featured') ?? '0';
    $products->trending = $request->input('trending') ?? '0';
    $products->status = $request->input('status') ?? '';
    $products->image = ($image ? $image : $request->input('imageOld')) ?? '';
    $products->image2 = ($image2 ? $image2 : $request->input('imageOld2')) ?? '';
    $products->image3 = ($image3 ? $image3 : $request->input('imageOld3')) ?? '';
    $products->image4 = ($image4 ? $image4 : $request->input('imageOld4')) ?? '';
	$products->image5 = ($image5 ? $image5 : $request->input('imageOld5')) ?? '';
	$products->image6 = ($image6 ? $image6 : $request->input('imageOld6')) ?? '';
    $products->heading = $request->input('heading') ?? '';
    $products->sub_heading = $request->input('sub_heading') ?? '';
    $products->features = $request->input('features') ?? '';
    $products->save();

    return redirect('/admin/products')->with('success', 'Product Updated');
  }

  public function destroy($id)
  {
    // ProductUnits::where('productid', $id)->delete();
    Cart::where('productid', $id)->delete();
    Products::where('id', $id)->update(['row_status' =>'Delete']);
    return redirect('/admin/products')->with('success', 'Product Deleted');
  }


  public function unitsList($id)
  {
    $product = Products::find($id);
    $units = ProductUnits::where('productid', $id)->orderBy('disp_order', 'asc')->get();
    $disporder = ProductUnits::where('productid', $id)->max('disp_order');

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Product Units',
      'product' => $product,
      'units' => $units ?? [],
      'productid' => $id,
      'disporder' => ($disporder > 0) ? $disporder + 1 : '1'
    ];

    return view('admin.products.units')->with($data);
  }

  public function unitSave(Request $request, $id) {
    $units = new ProductUnits();
    $units->productid = $request->input('productid') ?? '0';
    $units->name = $request->input('name') ?? '';
    $units->price = $request->input('price') ?? '0';
    $units->offerprice = $request->input('offerprice') ?? '0';
    $units->disp_order = $request->input('disp_order') ?? '1';
    $units->save();

    return redirect('/admin/products/units/'.$id)->with('success', 'Product Unit Added');
  }

  public function unitUpdate(Request $request, $id) {
    $units = ProductUnits::find($request->input('eid'));
    $units->name = $request->input('name') ?? '';
    $units->price = $request->input('price') ?? '0';
    $units->offerprice = $request->input('offerprice') ?? '0';
    $units->disp_order = $request->input('disp_order') ?? '1';
    $units->save();

    return redirect('/admin/products/units/'.$id)->with('success', 'Product Unit Updated');
  }

  public function unitDelete(Request $request, $id) {
    ProductUnits::where('id', $request->input('did'))->delete();
    return redirect('/admin/products/units/'.$id)->with('success', 'Product Unit Deleted');
  }

  public static function getUnits($productid) {
    return ProductUnits::where('productid', $productid)->orderBy('disp_order', 'asc')->get();
  }

  public static function getProduct($id)
  {
    return Products::where('id', $id)->first();
  }

  public static function getProductAvgRating($id)
  {
    $product = Products::where('id', $id)->first();
    return  $product->avgRating();
  }

  public static function getProductReviewCount($id)
  {
    $product = Products::where('id', $id)->first();
    return  $product->reviewCount();
  }

  public static function getName($id)
  {
    return Products::where('id', $id)->value('name');
  }

  public static function getUnitName($id)
  {
    return ProductUnits::where('id', $id)->value('name');
  }

  public static function getUnit($id)
  {
    return ProductUnits::where('id', $id)->first();
  }

  public function stockUpdate(Request $request)
  {
    if($request->input('type') == 'Add') {
      $products = Products::find($request->input('productid'));
      $stock_avalible = $products->stock_avalible;
      $stock_avalible = $stock_avalible + $request->input('stock_avalible');
      $products->stock_avalible = $stock_avalible;
      $products->save();
    } else {
      $products = Products::find($request->input('productid'));
      $stock_avalible = $products->stock_avalible;
      $stock_avalible = $stock_avalible - $request->input('stock_avalible');
      if($stock_avalible < 0) {
        $stock_avalible = 0;
      }
      $products->stock_avalible = $stock_avalible;
      $products->save();
    }

    return redirect('/admin/products')->with('success', 'Product Stock Updated');
  }

  public function ingredientsList($id)
  {
    $product = Products::find($id);
    $ingredients = Ingredients::where('productid', $id)->orderBy('disp_order', 'asc')->get();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Product Units',
      'product' => $product,
      'units' => $units ?? [],
      'productid' => $id,
      'ingredients' => $ingredients,
      'banners' => []
    ];

    return view('admin.products.ingredients')->with($data);
  }

  public function ingredientsSave(Request $request, $id) {
    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/ingredients/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/ingredients/' .$name.'_'.$ihd. '.' .$extension;
    }


    $ingredient = new Ingredients();
    $ingredient->name = $request->input('name') ?? '';
    $ingredient->productid = $id;
    $ingredient->desc = $request->input('desc') ?? '';
    $ingredient->image = $image ?? '';
    $ingredient->save();

    return redirect('/admin/products/ingredients/'.$id)->with('success', 'Product Ingredients Added');
  }

  public function ingredientsDelete(Request $request, $id) {
    Ingredients::where('id', $request->input('did'))->delete();
    return redirect('/admin/products/ingredients/'.$id)->with('success', 'Product Ingredient Deleted');
  }

  public function ingredientsUpdate(Request $request, $id) {

    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/ingredients/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/ingredients/' .$name.'_'.$ihd. '.' .$extension;
    }

    $ingredient = Ingredients::find($request->input('eid'));
    $ingredient->name = $request->input('name') ?? '';
    $ingredient->productid = $id;
    $ingredient->desc = $request->input('desc') ?? '';
    $ingredient->image = ($image ? $image : $request->input('imageOld')) ?? '';
    $ingredient->save();

    return redirect('/admin/products/ingredients/'.$id)->with('success', 'Product Ingredient Updated');
  }

  public function benefitsList($id)
  {
    $product = Products::find($id);
    $benefits = Benefits::where('productid', $id)->orderBy('disp_order', 'asc')->get();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Product Units',
      'product' => $product,
      'units' => $units ?? [],
      'productid' => $id,
      'benefits' => $benefits,
      'banners' => []
    ];

    return view('admin.products.benefits')->with($data);
  }

  public function benefitsSave(Request $request, $id) {
    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('title'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/benefits/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/benefits/' .$name.'_'.$ihd. '.' .$extension;
    }


    $ingredient = new Benefits();
    $ingredient->title = $request->input('title') ?? '';
    $ingredient->productid = $id;
    $ingredient->desc = $request->input('desc') ?? '';
    $ingredient->image = $image ?? '';
    $ingredient->save();

    return redirect('/admin/products/benefits/'.$id)->with('success', 'Product Benefit Added');
  }

  public function benefitsDelete(Request $request, $id) {
    Benefits::where('id', $request->input('did'))->delete();
    return redirect('/admin/products/benefits/'.$id)->with('success', 'Product Benefit Deleted');
  }

  public function benefitsUpdate(Request $request, $id) {

    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('title'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/benefits/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/benefits/' .$name.'_'.$ihd. '.' .$extension;
    }

    $ingredient = Benefits::find($request->input('eid'));
    $ingredient->title = $request->input('title') ?? '';
    $ingredient->productid = $id;
    $ingredient->desc = $request->input('desc') ?? '';
    $ingredient->image = ($image ? $image : $request->input('imageOld')) ?? '';
    $ingredient->save();

    return redirect('/admin/products/benefits/'.$id)->with('success', 'Product Benefit Updated');
  }

  public function reviewsList($id)
  {
    $product = Products::find($id);
    $reviews = Reviews::where('product_id', $id)->get();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Product Reviews',
      'product' => $product,
      'productid' => $id,
      'reviews' =>  $reviews
    ];

    return view('admin.products.reviews')->with($data);
  }

  public function reviewsSave(Request $request, $id)
  {
    $reviews = new Reviews();
    $reviews->customerid = '0';
    $reviews->product_id = $id;
    $reviews->customername = $request->input('customername') ?? '';
    $reviews->rating = $request->input('rating') ?? '5';
    $reviews->comment = $request->input('comment') ?? '';
    $reviews->status = 'Active';
    $reviews->save();

    return redirect('/admin/products/reviews/'.$id)->with('success', 'Product Review Added');
  }

  public function reviewsDelete(Request $request, $id) {
    Reviews::where('id', $request->input('did'))->delete();
    return redirect('/admin/products/reviews/'.$id)->with('success', 'Product Review Deleted');
  }

  public function reviewsUpdate(Request $request, $id) {

    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/ingredients/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/ingredients/' .$name.'_'.$ihd. '.' .$extension;
    }

    $ingredient = Ingredients::find($request->input('eid'));
    $ingredient->name = $request->input('name') ?? '';
    $ingredient->productid = $id;
    $ingredient->desc = $request->input('desc') ?? '';
    $ingredient->image = ($image ? $image : $request->input('imageOld')) ?? '';
    $ingredient->save();

    return redirect('/admin/products/ingredients/'.$id)->with('success', 'Product Ingredient Updated');
  }

  public function howToUseList($id)
  {
    $product = Products::find($id);
    $howtouse = HowToUse::where('productid', $id)->orderBy('step', 'asc')->get();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Product Units',
      'product' => $product,
      'units' => $units ?? [],
      'productid' => $id,
      'howtouse' => $howtouse,
      'banners' => []
    ];

    return view('admin.products.howtouse')->with($data);
  }

  public function howToUseSave(Request $request, $id) {
    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/howtouse/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/howtouse/' .$name.'_'.$ihd. '.' .$extension;
    }


    $howtouse = new HowToUse();
    $howtouse->step = $request->input('step') ?? '';
    $howtouse->productid = $id;
    $howtouse->desc = $request->input('desc') ?? '';
    $howtouse->image = $image ?? '';
    $howtouse->save();

    return redirect('/admin/products/howtouse/'.$id)->with('success', 'Product Use Added');
  }

  public function howToUseDelete(Request $request, $id) {
    HowToUse::where('id', $request->input('did'))->delete();
    return redirect('/admin/products/howtouse/'.$id)->with('success', 'Product Use Deleted');
  }

  public function howToUseUpdate(Request $request, $id) {

    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/howtouse/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/howtouse/' .$name.'_'.$ihd. '.' .$extension;
    }

    $howtouse = HowToUse::find($request->input('eid'));
    $howtouse->step = $request->input('step') ?? '';
    $howtouse->productid = $id;
    $howtouse->desc = $request->input('desc') ?? '';
    $howtouse->image = ($image ? $image : $request->input('imageOld')) ?? '';
    $howtouse->save();

    return redirect('/admin/products/howtouse/'.$id)->with('success', 'Product Use Updated');
  }

  public function faqList($id)
  {
    $product = Products::find($id);
    $faqs = ProductFaqs::where('productid', $id)->orderBy('id', 'asc')->get();

    $data = [
      'authuser' => Auth::user(),
      'contentHeader' => 'Products',
      'contentSubHeader' => 'Product Units',
      'product' => $product,
      'units' => $units ?? [],
      'productid' => $id,
      'faqs' => $faqs,
      'banners' => []
    ];

    return view('admin.products.faqs')->with($data);
  }

  public function faqSave(Request $request, $id) {
    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/faq/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/faq/' .$name.'_'.$ihd. '.' .$extension;
    }


    $faq = new ProductFaqs();
    $faq->productid = $id;
    $faq->question = $request->input('question') ?? '';
    $faq->answer = $request->input('answer') ?? '';
    $faq->save();

    return redirect('/admin/products/faqs/'.$id)->with('success', 'Product Use Added');
  }

  public function faqDelete(Request $request, $id) {
    ProductFaqs::where('id', $request->input('did'))->delete();
    return redirect('/admin/products/faqs/'.$id)->with('success', 'Product Use Deleted');
  }

  public function faqUpdate(Request $request, $id) {

    $image = '';
    $ihd = date('ihd');
    $redi = $request->input('redi') ?? 'first';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));
    
    
    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/faq/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
      $image = '/uploads/faqs/' .$name.'_'.$ihd. '.' .$extension;
    }

    $faq = ProductFaqs::find($request->input('eid'));
    $faq->productid = $id;
    $faq->question = $request->input('question') ?? '';
    $faq->answer = $request->input('answer') ?? '';
    $faq->save();

    return redirect('/admin/products/faqs/'.$id)->with('success', 'Product Use Updated');
  }




}
