<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('login.forgotpassword');
    }

     public function resetPassword()
     {

        return view('login.pinvalidation');

     }
     public function changePassword()
     {

        return view('login.validatePassword');

     }

     public function passworchange()
     {
         return view('login.passwordaproved');
     }


}
