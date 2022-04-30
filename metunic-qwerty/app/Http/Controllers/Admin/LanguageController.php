<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\LanguageStoreRequest;
use App\Http\Requests\Admin\LanguageUpdateRequest;
use App\Models\Permission;
use App\Models\Role;

use Illuminate\Http\Request;

use App\Models\Language;
use Illuminate\Support\Facades\DB;


class LanguageController extends Controller
{
    public function index()
    {



/*
         $user = \Auth::user();
         //assign role
         $role = Role::where('slug','editor')->first();
         $user->roles()->attach($role);
         dd($user->hasRole('editor'));

         //check permission
         $permission = Permission::first();
         $user->permissions()->attach($permission);
         dd($user->permissions);
         dd($user->can('add-post'));




         dd($user->roles);*/


        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Dil listesi";
        $data['subtitle'] = "Listeleme";

        $language = Language::orderBy('order','ASC')->get();
        return view('admin.language.index',compact('language'));


    }

    public function create()
    {

        $data = [];
        $data['home'] = [
          'title' => "Anasayfa",
          'url' => '/admin/home'
        ];
        $data['title'] = "Dil Bölümü";
        $data['subtitle'] = "Dil Ekleme";

        return view('admin.language.create', compact('data') );
    }


    public function store(LanguageStoreRequest $request)
    {

        $language = new Language();
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

    public function edit($id)
    {

        try {

            $language = Language::findOrFail($id);

            $data = [];
            $data['home'] = [
                'title' => "Anasayfa",
                'url' => '/admin/home'
            ];
            $data['title'] = "Dil Bölümü";
            $data['subtitle'] = "Dil Güncelleme";


            return view('admin.language.edit', compact('data','language') );

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }


    }


    public function update(LanguageUpdateRequest $request, $id)
    {

        try {

            $language = Language::findOrFail($id);
            $language->lang = $request->lang;
            $language->language = $request->language;
            $language->default = $request->default;

            $save =  $language->save();

            if ($save)
            {
                return back()->with('success','Dil Başarıyla Güncellendi');
            }else {
                return back()->with('fail','Dil Güncelleme Hatası');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

                return back()->with('fail', 'There was an error');
        }




    }


    public function destroy($id)
    {
        try {

            $language = Language::find($id);
            $delete = $language->delete();

            if ($delete)
            {
                return back()->with('success','Dil Başarıyla Silindi');

            }else {

                return back()->with('fail','Dil Silme Hatası');

            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }

    }


    public function sortable(Request $request)
    {
        try {
            foreach ($request->data as $k => $v) {

                //language::find($v)->update(['order' => $k]);

                //return $request->data;

                $affected = DB::table('languages')->where('lang_key', $v)->update(['order' => $k]);

            }


            $result = [
                'status' => '1',
            ];
            $v = json_encode($result);
            echo $v;
            exit();


        } catch (\Exception $error) {
            return false;
        }
    }



}
