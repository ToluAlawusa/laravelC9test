<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ViewProduct extends Controller 
{

	public function showViewProduct() {

          return view('viewproduct', ['prod'=>Product::getProduct()]);
	}
}
