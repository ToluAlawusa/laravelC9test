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


class CustomerBookPreview extends Controller {

    

    public function showBookPreview($id) {

        //dump(Reviews::getReviewsId($id)); exit();

        return view('customerbookpreview', ['review'=>Review::getReviewsId($id), 'prodid'=>Product::getProductById($id), 'id'=>$id, 'totalItems'=> Cart::cartCount(Session::get("customer_id"))]);
    
    }

    public function doAddComments(Request $request, $id) {


            // $details = Customer::getCustomersById($request->session()->get("customer_id"))->first();

        if(Session::has("customer_id")) {

            $udd = Session::get("customer_id");

            $details = Customer::getCustomersById(Session::get("customer_id"))->first();


            $review = new Review();

            $review->customer_id = $details->customer_id;
            $review->product_id = $id ;
            $review->firstname = $details->firstname;
            $review->lastname = $details->lastname;
            $review->comments = $_REQUEST['comm'];
            $review->save();

            return view('customerbookpreview', ['review'=>Review::getReviewsId($id), 'prodid'=>Product::getProductById($id), 'id'=>$id, 'totalItems'=> Cart::cartCount(Session::get("customer_id"))]);

        } 

            header("Location: /customerlogin");
   
    }

}
