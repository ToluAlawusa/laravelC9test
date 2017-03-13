<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use Illuminate\Http\Request;

class ViewCategory extends Controller 
{

	public function showViewCategory() {

          return view('viewcategory', ['cat'=>Category::getCategories()]);
	}
}
