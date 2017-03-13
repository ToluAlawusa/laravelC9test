<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookorder extends Model 
{
	# eloquent needs u to define ur preferred table name and primary key for overide
  protected $table = 'bookorders';
  protected $primaryKey = 'orders_id';

  public static function getOrders() {
        $order = Bookorder::all();
        return $order;
  }

  public static function getOrdersId($id) {
  		$ordersid = Bookorder::where("orders_id", '=', $id)->first();
  		return $ordersid;
  }

}