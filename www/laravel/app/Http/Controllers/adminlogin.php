<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminLogin extends Controller 
{

	public function showAdminLogin() {

          return view('adminlogin');
	}

	public function doAdminLogin(Request $request) {

       $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            
            if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            	return redirect()->back()->with(['fail' => 'email or password incorrect']);
            }

            $admin = Admin::where("email", $request['email'])->first();

            // $request->session()->put("customer_id", $customer->customer_id);
            Session::put("admin_id", $admin->admin_id);

            

            return redirect()->route('addcategory');
    }
}
