<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use App\Models\Login;



class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login.index');
    }

    public function check(Request $request)
    {



        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $user = Login::where('email','=', $request->email)->first();

        if (!$user)
        {
            return back()->with('fail','Hatalı Deneme');
        }else {

            if (Hash::check($request->password, $user->password))
            {
                $request->session()->put('logUser', $user->id);
                return redirect('admin');
            }else {
                return back()->with('fail', 'password');
            }
        }
    }



    public function logout()
    {
        if (session()->has('logUser'))
        {
            session()->pull('logUser');
            return redirect('/login');
        }
    }

}
