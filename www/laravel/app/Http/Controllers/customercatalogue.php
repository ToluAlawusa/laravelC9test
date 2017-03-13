<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Splash;
use App\Cart;
use App\Trending;
use App\Customer;
use Illuminate\Support\Facades\Session;


class CustomerCatalogue extends Controller {

    public function showCustomerCatalogue() {
          return view('customercatalogue', ['prod'=>Product::getProduct(), 'cat'=>Category::getCategories(), 'totalItems'=> Cart::cartCount(Session::get("customer_id"))]);
    }

    public function showCatalogueCategories($id) {
    	return view('customercatalogue', ['prod'=>Product::showProductById($id), 'cat'=>Category::getCategories(), 'totalItems'=> Cart::cartCount(Session::get("customer_id"))]);
    }

}
