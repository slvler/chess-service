<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PanelUserStoreRequest;
use App\Models\Admin;
use App\Models\PanelUser;
use App\Models\Permission;
use App\Models\Role;

use Illuminate\Http\Request;

class PanelUserController extends Controller
{
    public function index()
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Kullanıcı listesi";
        $data['subtitle'] = "Listeleme";

        $admin = Admin::query()
            ->where('id','!=',1)
            ->get();
        return view('admin.panel_user.index',compact('admin'));
    }

    public function create()
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Kullanıcı Bölümü";
        $data['subtitle'] = "Kullanıcı Ekleme";

        return view('admin.panel_user.create', compact('data') );
    }
    public function store(PanelUserStoreRequest $request)
    {
       return $request->all();

       new PanelUser();

    }
}
