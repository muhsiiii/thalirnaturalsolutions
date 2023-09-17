<?php

namespace App\Http\Controllers;

use File;


use App\ShopReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $search = $_GET['q'] ?? '';
        $no = 0;
        //
        $reviews = ShopReviews::where('status','Active')->orderBy('id', 'desc')->paginate(10);

        $data = [
            'authuser' => Auth::user(),
            'ingredients'  => [],
            'contentHeader' => 'Reviews',
            'search' => $search,
            'no' => $no,
            'reviews' => $reviews
        ];

        return view('admin.reviews.reviews')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $image = '';
        $ihd = date('ihd');
        $redi = $request->input('redi') ?? 'first';
        $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('customername'));
    
        if($request->hasFile('image')) {
          $getimage = $request->file('image');
          $extension = $request->file('image')->getClientOriginalExtension();
          $path = public_path(). '/uploads/reviews/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
          $image = '/uploads/reviews/' .$name.'_'.$ihd. '.' .$extension;
        }

        
        $review = new ShopReviews();
        $review->customername = $request->input('customername') ?? '';
        $review->rating = $request->input('rating') ?? 0;
        $review->comment = $request->input('comment') ?? '';
        $review->image = $image ?? '';
        $review->save();
    
        return redirect('/admin/reviews')->with('success', 'Review Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopReviews  $shopReviews
     * @return \Illuminate\Http\Response
     */
    public function show(ShopReviews $shopReviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopReviews  $shopReviews
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopReviews $shopReviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopReviews  $shopReviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image = '';
        $ihd = date('ihd');
        $redi = $request->input('redi') ?? 'first';
        $name = preg_replace("/[^a-zA-Z0-9]+/", "", $request->input('customername'));
    
        if($request->hasFile('image')) {
          $getimage = $request->file('image');
          $extension = $request->file('image')->getClientOriginalExtension();
          $path = public_path(). '/uploads/reviews/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $getimage->move($path, $name.'_'.$ihd.'.'.$extension);
          $image = '/uploads/reviews/' .$name.'_'.$ihd. '.' .$extension;
        }

        
        $review = ShopReviews::find($id);;
        $review->customername = $request->input('customername') ?? '';
        $review->rating = $request->input('rating') ?? 0;
        $review->comment = $request->input('comment') ?? '';
        $review->image = ($image ? $image : $request->input('imageOld')) ?? '';
        $review->save();
    
        return redirect('/admin/reviews')->with('success', 'Review Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopReviews  $shopReviews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $review = ShopReviews::find($id);
        $review->delete();
    
        return redirect('/admin/reviews')->with('success', 'Review Deleted');
    }
}
