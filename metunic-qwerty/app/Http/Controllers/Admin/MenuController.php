<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\MenuStoreRequest;
use App\Http\Requests\Admin\MenuUpdateRequest;
use App\Models\AdminMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


        $menu = new AdminMenu();
        $menu->parent = 0;
        $menu->title = $request->menu_name;
        $menu->desc = $request->menu_desc;
        $menu->url = $request->url_choise;
        $menu->menu_type = $request->menu_type;
        $menu->url_adress = $request->menu_url == "" ? "admin.".Str::slug($request->menu_name) : $request->menu_url;
        $menu->status = $request->default;

        $save =  $menu->save();
        if ($save)
        {
            return back()->with('success','Dil Başarıyla Eklendi');
        }else {
            return back()->with('fail','Dil Ekleme Hatası');
        }
    }


    public function edit($id)
    {


        //return $menu = AdminMenu::findOrFail($id);

        try {

            $menu = AdminMenu::findOrFail($id);

            $data = [];
            $data['home'] = [
                'title' => "Anasayfa",
                'url' => '/admin/home'
            ];
            $data['title'] = "Menü Bölümü";
            $data['subtitle'] = "Menü Güncelleme";


            return view('admin.menu.edit', compact('data','menu') );

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }

    }


    public function update(AdminMenu $menu, MenuUpdateRequest $request)
    {
        try {


            //return $request->all();

            $menu->parent = 0;
            $menu->title = $request->menu_name;
            $menu->desc = $request->menu_desc;
            $menu->url = $request->url_choise;
            $menu->menu_type = $request->menu_type;
            $menu->url_adress = $request->url_choise == "0" ? "admin.".Str::slug($request->menu_name) : $request->menu_url;
            $menu->status = $request->default;

 /*           return $menu;
            return $request->all();
            exit;

            $language = Language::findOrFail($id);
            $language->lang = $request->lang;
            $language->language = $request->language;
            $language->default = $request->default;*/

            $save =  $menu->save();

            if ($save)
            {
                return back()->with('success','Menü Başarıyla Güncellendi');
            }else {
                return back()->with('fail','Menü Güncelleme Hatası');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return back()->with('fail', 'There was an error');
        }
    }


}
