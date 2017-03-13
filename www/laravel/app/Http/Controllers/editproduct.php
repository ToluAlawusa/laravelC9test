<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Product;
use Illuminate\Http\Request;


class EditProduct extends Controller 
{

    public function showEditProduct($id) {
        
        return view('editproduct', ['cat'=>Category::getCategories(), 'prodid'=>Product::getProductById($id), 'id'=>$id]);
    }

    public function doEditProduct(Request $request, $id) {

        $this->validate($request, [
            'bookname' => 'required',
             'author' => 'required',
             "price" => 'required',
             "category" => 'required',
        ]);


         $user = Product::getProductById($id);

         $user->product_name = $request['bookname'];
         $user->author_name = $request['author'];
         $user->price = $request['price'];
         $user->category_id = $request['category'];
         $user->save();

         return view('viewproduct', ['prod'=>Product::getProduct()]);
    }

}
