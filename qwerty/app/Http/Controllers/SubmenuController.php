<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Submenu;
use Illuminate\Support\Facades\Validator;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$submenu = Submenu::where('menu_id','=', $id);

        $submenu = Submenu::where('menu_id','=', $id)->get();
        return view('admin.submenu.index', ['submenu' => $submenu]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $title = "Altmenü Ekleme Sayfası";
        return view('admin.submenu.create', ['submenu' => $id, 'title' => $title]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'body' => 'required',
                'detail' => 'required',
                'keyword' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Başlık Boş Bırakılamaz',
                'body.required' => 'Açıklama Boş Bırakılamaz',
                'detail.required' => 'Detay Boş Bırakılamaz',
                'keyword.required' => 'Keyword Boş Bırakılamaz',
                'status.required' => 'Durum Boş Bırakılamaz'
            ]


        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $submenu = new Submenu();

        $submenu->title = $request->title;
        $submenu->menu_id = $id;
        $submenu->body = $request->body;
        $submenu->detail = $request->detail;
        $submenu->keyword = $request->keyword;
        $submenu->status = $request->status;

        $save = $submenu->save();

        if ($save)
        {
            return back()->with('success','Altmenü Başarıyla Eklendi');
        }else {
            return back()->with('fail','Altmenü Ekleme Hatası');
        }
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
        $submenu = Submenu::findorfail($id);
        $title = "Altmenü Güncelleme Sayfası";

        return view('admin.submenu.edit', ['submenu' => $submenu, 'title' => $title]);
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

        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'body' => 'required',
                'detail' => 'required',
                'keyword' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Başlık Boş Bırakılamaz',
                'body.required' => 'Açıklama Boş Bırakılamaz',
                'detail.required' => 'Detay Boş Bırakılamaz',
                'keyword.required' => 'Keyword Boş Bırakılamaz',
                'status.required' => 'Durum Boş Bırakılamaz'
            ]


        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $submenu = Submenu::findorfail($id);

        $submenu->title = $request->title;
        $submenu->body = $request->body;
        $submenu->detail = $request->detail;
        $submenu->keyword = $request->keyword;
        $submenu->status = $request->status;

        $update = $submenu->save();

        if ($update)
        {
            return back()->with('success','Menü Başarıyla Güncellendi');
        }else {
            return back()->with('fail','Menü Güncelleme Hatası');
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
        try {

            $submenu = Submenu::find($id);
            $delete = $submenu->delete();

            if ($delete)
            {
                return back()->with('success','Altmenü Başarıyla Silindi');
            }else {
                return back()->with('fail','Altmenü Silme Hatası');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }

        //
    }
}
