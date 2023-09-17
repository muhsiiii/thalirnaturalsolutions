<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public $timestamps = false;

  public function orderItems()
  {
      return $this->HasMany(OrderedItems::class, 'orderid','id');
  }
}
