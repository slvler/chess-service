<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::findOrFail(1);
        $title = "Genel Ayarlar";
        return view('admin.setting.index', ['setting' => $setting, 'title' => $title]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $section = $request->input('section');
        $setting = Setting::findOrFail($id);

        if ($section == 1)
        {
            $setting->status = $request->status;
            $setting->title = $request->title;
            $setting->keyword = $request->keyword;
            $setting->description = $request->description;
            $setting->author = $request->author;
            $setting->analytics = $request->analytics;
            $setting->metrica = $request->metrica;
            $setting->facebook = $setting->facebook;
            $setting->instagram = $setting->instagram;
            $setting->twitter = $setting->twitter;
            $setting->pinterest = $setting->pinterest;
            $setting->youtube = $setting->youtube;
        }else{


            $setting->title = $setting->title;
            $setting->keyword = $setting->keyword;
            $setting->description = $setting->description;
            $setting->author = $setting->author;
            $setting->analytics = $setting->analytics;
            $setting->metrica = $setting->metrica;
            $setting->status = $setting->status;

            $setting->facebook = $request->facebook;
            $setting->instagram = $request->instagram;
            $setting->twitter = $request->twitter;
            $setting->pinterest = $request->pinterest;
            $setting->youtube = $request->youtube;

        }







        $update = $setting->save();

        if ($update)
        {
            return back()->with('success','Ayarlar Başarıyla Güncellendi');
        }else {
            return back()->with('fail','Ayarlar Güncelleme Hatası');
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
