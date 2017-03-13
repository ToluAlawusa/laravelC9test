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


class CustomerCart extends Controller {

    

	public function showCustomerCart($id) {
        
        return view('customercart', ['cartlist'=>Cart::cartTable($id), 'prodid'=>Product::getProductById($id), 'id'=>$id, 'totalItems'=> Cart::cartCount(Session::get("customer_id"))]);
    }

    public function addToCart(Request $request, $id) {


    	$this->validate($request, [
                'quan' => 'required',
            ]);


        	if(Session::has("customer_id")) {

                $udd = Session::get("customer_id");

                $chk = Cart::checkProduct($id);

            if($chk){

                header("Location: /customercart/$udd/");

            } else {
            
        		$cart = new Cart;
        		$cart->product_id = $id;
        		$cart->customer_id = Session::get("customer_id");
        		$cart->quantity = $_REQUEST['quan'];

        		$cart->save();

                header("Location: /customerbookpreview/$id/");
            }

    	} else {

    		header("Location: /customerlogin");
    	}
         //    return view('customerbookpreview', ['review'=>Review::getReviewsId($id), 'prodid'=>Product::getProductById($id), 'id'=>$id, 'totalItems'=> $this->_cartCount]);
    }

}