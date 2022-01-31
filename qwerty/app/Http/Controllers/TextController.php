<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


use App\Models\Text;


class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text = Text::all();
        $title = "Text Listeleme Sayfası";
        return view('admin.text.index', ['text' => $text, 'title' => $title]);

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
        $title = " Yazı Ekleme Sayfası ";

        return view('admin.text.create', ['title' => $title]);
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

        $validator = Validator::make($request->all(),
            [
                'type' => 'required',
                'status' => 'required',
            ],
            [
                'type.required' => 'Tür Boş Bırakılamaz',
                'status.required' => 'Durum Boş Bırakılamaz'
            ]


        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $text = new Text();

        $text->title = $request->title;
        $text->body = $request->body;
        $text->detail = $request->detail;
        $text->type =  Str::slug($request->type, '-');
        $text->status = $request->status;

        $save = $text->save();

        if ($save)
        {
            return back()->with('success','Yazı Başarıyla Eklendi');
        }else {
            return back()->with('fail','Yazı Ekleme Hatası');
        }
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
