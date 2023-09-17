<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $timestamps = false;
	 public function products()
    {
        return $this->HasMany(Products::class, 'subcat_id','id');
    }
}
