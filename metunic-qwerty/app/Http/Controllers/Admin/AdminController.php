<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCheckRequest;
use Illuminate\Http\Request;


use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function check(AdminCheckRequest $request)
    {

        $credit = $request->only('email','password');

        if (Auth::guard('admin')->attempt($credit))
        {
            return redirect()->route('admin.home');
        }else {

            return redirect()->route('admin.login')->with('fail', 'Login Error !');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }


}
