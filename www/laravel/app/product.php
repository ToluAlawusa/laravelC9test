<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'product_id';

    public static function getProduct() {
        $prod = Product::all();
        return $prod;
    }

    public static function getProductById($id) {
  		$prodid = Product::where("product_id", '=', $id)->first();
  		return $prodid;
    }

    public static function showProductById($id) {
	    $showp = Product::where('category_id', '=', $id)->get();
	    return $showp;
    }

    public static function relateBelong() {

        return $this->belongsTo('App\Category');
    }
	
}