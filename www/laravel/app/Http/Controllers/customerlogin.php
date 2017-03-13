<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class CustomerLogin extends Controller 
{

	public function showCustomerLogin() {

          return view('customerlogin');
	}


	public function doCustomerLogin(Request $request) {

       $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            
            // if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            // 	return redirect()->back()->with(['fail' => 'email or password incorrect']);
            // }

            $credentials = $request->only('email', 'password');

            try {
                if(! $token = JWTAuth::attempt($credentials)) {
                    return redirect()->back()->with(['fail' => 'email or password incorrect']);
                }

             } catch (JWTException $e) {
                    return redirect()->back()->with(['fail' => 'could not create token']);

             }

            $customer = Customer::where("email", $request['email'])->first();

            // $request->session()->put("customer_id", $customer->customer_id);
            Session::put("customer_id", $customer->customer_id);

            Session::get('customer_id');


            return redirect()->route('index');
    }

}