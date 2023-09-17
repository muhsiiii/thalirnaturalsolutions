<?php

namespace App\Http\Controllers;

use File;

use App\Category;
use App\Products;
use App\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Kolkata');

class AdminCategoryController extends Controller
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
    $no = 0;
    $page = $request->input('page') ?? 1;
    $page = $page - 1;
    if(isset($page)) { $no = $page * 10; }
    $search = $request->input('search') ?? '';

    $categories = Category::orderBy('disporder', 'asc');
    if(isset($search) && $search != '') {
      $categories = $categories->where('name', 'like', "%{$search}%");
    }
    $categories = $categories->paginate(10);
    $disporder = Category::max('disporder');

    $data = [
      'authuser' => Auth::user(),
      'categories'  => $categories,
      'contentHeader' => 'Category',
      'search' => $search,
      'disporder' => ($disporder > 0) ? $disporder + 1 : '1',
      'no' => $no
    ];

    return view('admin.category.index')->with($data);
  }


  public function create(Request $request)
  {
    $image = '';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));

    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/category/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'.'.$extension);
      $image = '/uploads/category/' .$name. '.' .$extension;
    }

    $category = new Category();
    $category->name = $request->input('name');
    $category->disporder = $request->input('disporder') ?? '1';
    $category->image = $image ?? '';
    $category->desc = $request->input('desc') ?? '';
    $category->save();

    return redirect('/admin/category')->with('success', 'New Category Created');
  }


  public function update(Request $request)
  {
    $image = '';
    $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('name'));

    if($request->hasFile('image')) {
      $getimage = $request->file('image');
      $extension = $request->file('image')->getClientOriginalExtension();
      $path = public_path(). '/uploads/category/';
      File::makeDirectory($path, $mode = 0777, true, true);
      $getimage->move($path, $name.'.'.$extension);
      $image = '/uploads/category/' .$name. '.' .$extension;
    }

    $category = Category::find($request->input('id'));
    $category->name = $request->input('name');
    $category->disporder = $request->input('disporder') ?? '1';
    $category->image = ($image ? $image : $request->input('imageOld')) ?? '';
    $category->desc = $request->input('desc') ?? '';
    $category->save();

    return redirect('/admin/category')->with('success', 'Category Updated');
  }


  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();

    return redirect('/admin/category')->with('success', 'Category Deleted');
  }

  public static function countProducts($id)
  {
    return Products::where('status', 'Available')->where('cat_id', $id)->count();
  }

  public function subCategory(Request $request)
  {
    $no = 0;
    $page = $request->input('page') ?? 1;
    $page = $page - 1;
    if(isset($page)) { $no = $page * 10; }
    $search = $request->input('search') ?? '';

    $subCategories = SubCategory::orderBy('id', 'asc');
    if(isset($search) && $search != '') {
      $subCategories = $subCategories->where('name', 'like', "%{$search}%");
    }
    $subCategories = $subCategories->paginate(10);

    $categories = Category::pluck('name', 'id');

    $data = [
      'authuser' => Auth::user(),
      'subCategories'  => $subCategories,
      'contentHeader' => 'SubCategory',
      'search' => $search,
      'no' => $no,
      'categories' => $categories
    ];

    return view('admin.subcategory.index')->with($data);
  }

  public function createSubCategory(Request $request)
  {
    $subcategory = new SubCategory();
    $subcategory->cat_id = $request->input('cat_id') ?? '0';
    $subcategory->name = $request->input('name');
    $subcategory->save();

    return redirect('/admin/subcategory')->with('success', 'Sub-Category Updated');
  }

  public function updateSubCategory(Request $request)
  {
    $subcategory = SubCategory::find($request->input('id'));
    $subcategory->cat_id = $request->input('cat_id') ?? '0';
    $subcategory->name = $request->input('name');
    $subcategory->save();

    return redirect('/admin/subcategory')->with('success', 'SubCategory Updated');
  }

  public function destroySubCategory($id)
  {
    $subcategory = SubCategory::find($id);
    $subcategory->delete();

    return redirect('/admin/subcategory')->with('success', 'SubCategory Deleted');
  }


  public static function countSubCatProducts($id)
  {
    return Products::where('status', 'Available')->where('subcat_id', $id)->count();
  }


  public static function getSubCats($catid)
  {
      return SubCategory::where('cat_id', $catid)->get();
  }

}
