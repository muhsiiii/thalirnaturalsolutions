<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  public $timestamps = false;

  public function reviews()
  {
      return $this->HasMany(Reviews::class, 'product_id','id');
  }

  public function avgRating()
  {
    return $this->reviews->avg('rating');
  }


  public function reviewCount()
  {
    return $this->reviews->count();
  }

  public static function relateProducts()
  {
    return $relatedProducts = Products::where('status' , 'Available')->where('stock_avalible', '>', 0)->where('row_status','New')->limit(5)->inRandomOrder()->get();
  }


}
