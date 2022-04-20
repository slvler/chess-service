<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PanelUserStoreRequest;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\PanelUser;
use App\Models\Permission;
use App\Models\Role;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

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


        $PanelUser = new Admin();

        $PanelUser->name = $request->name;
        $PanelUser->phone = "9999";
        $PanelUser->email = $request->email;
        $PanelUser->password = \Hash::make($request->password);

        $save = $PanelUser->save();

        $default = $request->default;

        $role = Role::where('id','=',$default)->first();
        $PanelUser->roles()->attach($role);

        if ($save)
        {
            return redirect()->back()->with('success', 'Kayıt Başarıyla Oluştuldu.');
        }else {
            return redirect()->back()->with('fail', 'Fail Register');
        }

    }


    public function edit(Admin $admin)
    {

        //$admins = Admin::with('adminRolesDetail')->where('id','=', $admin->id)->first();

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Kullanıcı Bölümü";
        $data['subtitle'] = "Kullanıcı Güncelleme";

        return view('admin.panel_user.edit', compact('data','admin') );

    }


    public function update(Admin $admin, Request $request)
    {

        $admin->name = $request->name;
        $admin->phone = "9999";
        $admin->email = $request->email;
        $admin->password = \Hash::make($request->password);


        $save = $admin->save();

        $RolesUpdate = DB::table('roles')
            ->join('admins_roles','admins_roles.role_id','=','roles.id')
            ->where('admins_roles.admin_id','=', $admin->id)
            ->update(array("admins_roles.role_id"=> $request->default));

        if ($save)
        {
            return redirect()->back()->with('success', 'Kayıt Başarıyla Güncellendi.');
        }else {
            return redirect()->back()->with('fail', 'Fail Register');
        }



    }


    public function destroy($id)
    {

        $admin = Admin::findOrFail($id);
        $admin->AdminRole()->where('admin_id',$id)->detach();
        $adminRole = $admin->delete();

        if ($adminRole)
        {
            return redirect()->back()->with('success', 'Kayıt Başarıyla Silindi.');
        }else {
            return redirect()->back()->with('fail', 'Fail Register');
        }

    }
}
