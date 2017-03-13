<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Cart extends Model 
{
	# eloquent needs u to define ur preferred table name and primary key for overide
  protected $table = 'carts';
  protected $primaryKey = 'cart_id';

  // public static function getCart() {
  //       $cart = Cart::all();
  //       return $cart;
  // }

  public static function getCartId($id) {
  		$cartid = Cart::where("cart_id", $id)->get();
  		return $cartid;
  }

  public static function cartTable($user_id) {
    $cart = DB::table('carts')
    ->join('products', function($join){
      $join->on('carts.product_id', '=', 'products.product_id');

      })->where('customer_id', '=', Session::get("customer_id"))
    ->get();

    return $cart;
  }

  public static function checkProduct($id) {

    $result = false;

    $cproduct = DB::table('carts')->where('product_id', '=', $id)
    ->where('customer_id', '=', Session::get("customer_id"))->get()->count();

    if($cproduct > 0){
      $result = true;

    }

    return $result;
    
  }

  public static function cartCount($id) {

    $chkcount = DB::table('carts')->where('customer_id', '=', $id)->get()->count();

    return $chkcount;

  }

  public static function getTotal($id) {
        $cartlist = Cart::cartTable($id);
        $total = 0;

        foreach ($cartlist as $cartItem) {
            $total += $cartItem->quantity * $cartItem->price;
        }

        return $total;
    }

}
