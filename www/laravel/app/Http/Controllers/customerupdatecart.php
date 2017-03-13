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

class CustomerUpdateCart extends Controller 
{


    public function updateCart(Request $request, $id) {

    	 $this->validate($request, [
                'quant' => 'required'
            ]);

            $upd = "";
            $upd = Session::get('customer_id');

            $quantity = Cart::find($_REQUEST['hid']);

            //dump($quantity); exit();
            $quantity->quantity = $_REQUEST['quant'];

            $quantity->save();

            header("Location: /customercart/$upd/");

    }
}
