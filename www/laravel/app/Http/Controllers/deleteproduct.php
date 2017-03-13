<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Product;
use Illuminate\Http\Request;

class DeleteProduct extends Controller 
{

	 public function doDeleteProduct($id) {

         $prodd = Product::getProductById($id);

         $prodd->delete();

		 return redirect()->route('viewproduct');
    }

}