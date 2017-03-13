<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Splash;
use App\Trending;
use App\Customer;
use App\Review;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerDeleteCart extends Controller 
{

	


	public function deleteCart(Request $request, $id) {
    	
    	$uid = Session::get('customer_id');

    	$cart = Cart::find($_REQUEST['delhid']);

        $cart->delete();

         header("Location: /customercart/$uid/");


     }

}