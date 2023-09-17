<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Category extends Model
{
  public $timestamps = false;

  
    public function products()
    {
        return $this->HasMany(Products::class, 'cat_id','id');
    }
}
