<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use Illuminate\Http\Request;

class AddCategory extends Controller 
{

	public function showAddCategory() {

          return view('addcategory');
	}

    public function doAddCategory(Request $request) {

       $this->validate($request, [
                'cname' => 'required|alpha',
            ]);

                $category = new Category();
                $category->category_name = $request['cname'];
                $category->save();
            
            return view('addcategory');
    }
}
