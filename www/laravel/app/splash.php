<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Splash extends Model 
{
	# eloquent needs u to define ur preferred table name and primary key for overide
  protected $table = 'splashes';
  protected $primaryKey = 'splash_id';

  public static function getSplash() {
        $splash = Splash::all();
        return $splash;
  }

  public static function getSplashId($id) {
  		$splashid = Splash::where("splash_id", '=', $id)->first();
  		return $splashid;
  }

}