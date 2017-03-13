<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class AddProduct extends Controller 
{

	public function showAddProduct() {

          return view('addproduct', ['cat'=>Category::getCategories()]);
	}

    public function doAddProduct(Request $request) {

       $this->validate($request, [
            'bookname' => 'required',
             'author' => 'required',
             "price" => 'required',
             "category" => 'required',
             "image" => 'required'
        ]);

        $rnd = uniqid(rand(0, 9), true);
        $imageName = $rnd . '.'.$request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
        base_path() . '/public/uploads/', $imageName
        );

        
         $product = new Product();
         $product->category_id = $request['category'];
         $product->product_name = $request['bookname'];
         $product->author_name = $request['author'];
         $product->image = $imageName;
         $product->price = $request['price'];
         $product->save();

            
        return view('addproduct', ['cat'=>Category::getCategories()]);
    }
    
}