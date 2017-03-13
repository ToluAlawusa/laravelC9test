<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'category_id';


	public static function getCategories() {
        $cat = Category::all();
        return $cat;
    }

    public static function getCategoryById($id) {
  		$caty = Category::where("category_id", '=', $id)->first();
  		return $caty;
    }

    public static function relateBelongs() {

        return $this->hasMany('App\Product');
    }

	
}