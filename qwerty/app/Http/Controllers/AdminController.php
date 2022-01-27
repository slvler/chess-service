<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Login;




class AdminController extends Controller
{
    public function index()
    {

        $user = Login::findOrFail(session('logUser'));
        return view('admin.index')->with('user', $user);

    }
}
