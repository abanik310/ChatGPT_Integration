<?php

namespace App\Http\Controllers;
use App\models\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function check_login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = Users::where('username', $credentials['username'])->first();

        //echo "before";exit;
        if ($user && Auth::guard('web')->attempt($credentials)) {
            echo "after";exit;
            return redirect('/welcome');
        }

        return redirect()->back()->with('error', 'Invalid username or password')->withInput($request->only('username'));
    }

    public function welcome(Request $request)
    {
        echo "Welcome";exit;
        $credentials = $request->only('user_name', 'password');
        //echo "<pre>"; print_r($credentials);exit;
        $user = Users::where('user_name', $credentials['user_name'])->first();
        //echo $user;exit;
        if ($user && Auth::guard('web')->attempt($credentials)) {
            session(['fullname' => $user->fullname]);

            return redirect()->intended('/Welcome');
        }
        return redirect()->back()->with('error', 'Invalid username or password');
    }
}
