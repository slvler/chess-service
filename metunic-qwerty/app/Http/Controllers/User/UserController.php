<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCheckRequest;
use App\Http\Requests\UserSaveRequest;
use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /*
    public function login()
    {

    }

     public function register()
    {
    }
    */

    public function index()
    {


        $deger =  session('applocale');
        return $deger;
    }
    public function check(UserCheckRequest $request)
    {
       $credist =  $request->only('email','password');

       if (Auth::guard('web')->attempt($credist))
       {
           return redirect()->route('user.home');
       }else {
           return redirect()->route('user.login')->with('fail','Login Fails..!');
       }
    }


    public function save(UserSaveRequest $request)
    {


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if ($save)
        {
            return redirect()->back()->with('success', 'Success Register');
        }else {
            return redirect()->back()->with('fail', 'Fail Register');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
