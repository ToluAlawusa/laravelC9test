<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use Illuminate\Http\Request;

class DeleteCategory extends Controller 
{

	 public function doDeleteCategory($id) {

         $catd = Category::getCategoryById($id);

         $catd->delete();

		 return redirect()->route('viewcategory');
    }

}