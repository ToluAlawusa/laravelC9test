<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trending extends Model 
{
	# eloquent needs u to define ur preferred table name and primary key for overide
  protected $table = 'trendings';
  protected $primaryKey = 'trending_id';

  public static function getTrending() {
        $trending = Trending::all();
        return $trending;
  }

  public static function getTrendingId($id) {
  		$trend = Trending::where("trending_id", '=', $id)->first();
  		return $trend;
  }

}