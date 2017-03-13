<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerRegister extends Controller {


	public function showCustomerRegister() {
         return view('customerregister');
	}

   public function doCustomerRegister(Request $request) {

       $this->validate($request, [
                'firstname' => 'required|alpha',
                'lastname' => 'required|alpha',
                'email' => 'required|email',
                'username' => 'required',
                'password' => 'required',
                'confirm_password' => 'same:password',
            ]);

                $customer = new Customer();
                $customer->firstname = $request['firstname'];
                $customer->lastname = $request['lastname'];
                $customer->email = $request['email'];
                $customer->username = $request['username'];
                $customer->password = bcrypt($request['password']);
                $customer->save();
            
            return view('customerregister');
    }
}
