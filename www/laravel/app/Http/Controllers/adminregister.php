<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminRegister extends Controller 
{

	public function showAdminRegister() {

          return view('adminregister');
	}

    public function doAdminRegister(Request $request) {

       $this->validate($request, [
                'firstname' => 'required|alpha',
                'lastname' => 'required|alpha',
                'email' => 'required|email',
                'password' => 'required',
                'confirm_password' => 'same:password',
            ]);

                $admin = new Admin();
                $admin->firstname = $request['firstname'];
                $admin->lastname = $request['lastname'];
                $admin->email = $request['email'];
                $admin->password = bcrypt($request['password']);
                $admin->save();
            
            return view('adminlogin');
    }
}
