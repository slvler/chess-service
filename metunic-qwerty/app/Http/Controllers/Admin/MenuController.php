<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\MenuStoreRequest;
use App\Models\AdminMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Menü listesi";
        $data['subtitle'] = "Listeleme";

        $AdminMenu = AdminMenu::get();

        return view('admin.menu.index', compact('AdminMenu'));
    }

    public function create()
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Menü Bölümü";
        $data['subtitle'] = "Menü Ekleme";

        return view('admin.menu.create', compact('data') );
    }

    public function store(MenuStoreRequest $request)
    {

        return $request->all();
        $menu = new AdminMenu();
        $language->lang = $request->lang;
        $language->language = $request->language;
        $language->default = $request->default;
        $language->order = 0;

        $save =  $language->save();
        if ($save)
        {
            return back()->with('success','Dil Başarıyla Eklendi');
        }else {
            return back()->with('fail','Dil Ekleme Hatası');
        }
    }


}
