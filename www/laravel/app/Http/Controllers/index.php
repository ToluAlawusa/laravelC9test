<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Splash;
use App\Cart;
use App\Trending;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class Index extends Controller {


    public function showIndexPage() {
    	
      return view('index', ['splash'=>Splash::getSplash(), 'trending'=>Trending::getTrending(), 
      	'totalItems'=> Cart::cartCount(Session::get("customer_id"))]);
    }
}