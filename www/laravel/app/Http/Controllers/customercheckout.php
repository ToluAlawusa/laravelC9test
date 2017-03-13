<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Splash;
use App\Trending;
use App\Customer;
use App\Review;
use App\Cart;
use App\Bookorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CustomerCheckout extends Controller 
{

    

	public function showCustomerCheckout($id) {
    

        return view('customercheckout', ['cartlist'=>Cart::cartTable($id), 'prodid'=>Product::getProductById($id), 'id'=>$id, 'totalItems'=> Cart::cartCount(Session::get("customer_id")),'totalPrice'=> Cart::getTotal($id)]);
    }

    public function doCheckout(Request $request, $id) {

    	 $this->validate($request, [
            'phone' => 'required',
             'address' => 'required',
             "postcode" => 'required',
        ]);

        $data = Cart::cartTable(Session::get('customer_id'));


           foreach ($data as $product) {

            $bkorder = new Bookorder();

            $bkorder->cart_id = $product->cart_id;
            $bkorder->customer_id = Session::get('customer_id');
            $bkorder->product_id = $product->product_id;
            $bkorder->quantity = $product->quantity;
            $bkorder->phone = $_REQUEST['phone'];
            $bkorder->address = $_REQUEST['address'];
            $bkorder->postcode = $_REQUEST['postcode'];

            $bkorder->save();

            DB::table('carts')->where('customer_id', '=', Session::get('customer_id'))->delete();

            }

            header("Location: /customercatalogue");

    }

}