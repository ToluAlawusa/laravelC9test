<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CustomerLogout extends Controller {

	

	public function doCustomerLogout() {


		Session::all();


		// unset(Session::all());

		Session::flush();
		// Auth::logout();

		return redirect()->route('index'); //We redirect to admin_login page
    }
}
