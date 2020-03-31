<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AndroidLoginController extends Controller
{
    public function checklogin(Request $request)
    {
        
        $user_data = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')

        );
        if(Auth::attempt($user_data))
        {

            return Auth::user()->organization_id;
        }
        else{
            return 'Invalid Username/Password';
        }
    }

}
