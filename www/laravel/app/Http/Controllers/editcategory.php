<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use Illuminate\Http\Request;

class EditCategory extends Controller 
{

	public function showEditCategory($id) {

          return view('editcategory', ['cat'=>Category::getCategoryById($id), 'id'=>$id]);
	}

	public function doEditCategory(Request $request, $id) {
		$this->validate($request, [
			'cname' => 'required'
			]);

		$category = Category::getCategoryById($id);
		$category->category_name = $request['cname'];
		$category->save();

		return view('viewcategory', ['cat'=>Category::getCategories()]);
	}

    
}