<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Language;



class LanguageController extends Controller
{
    public function index()
    {

        $language = Language::all();
        return view('admin.language.index',compact('language'));


    }

    public function create()
    {
        return "gel";
    }
}
