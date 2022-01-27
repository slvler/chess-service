<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Subcategory;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$submenu = Subcategory::where('menu_id','=', $id);

        $subcategory = Subcategory::where('category_id','=', $id)->get();
        $title = "Altkategori Listeleme Sayfası";
        return view('admin.subcategory.index', ['subcategory' => $subcategory, 'title' => $title]);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $title = "Altkategori Ekleme Sayfası";
        return view('admin.subcategory.create', ['subcategory' => $id, 'title' => $title]);
        //
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
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


        $subcategory = new Subcategory();

        $subcategory->title = $request->title;
        $subcategory->category_id = $id;
        $subcategory->body = $request->body;
        $subcategory->detail = $request->detail;
        $subcategory->keyword = $request->keyword;
        $subcategory->status = $request->status;

        $save = $subcategory->save();

        if ($save)
        {
            return back()->with('success','Altkategori Başarıyla Eklendi');
        }else {
            return back()->with('fail','Altkategori Ekleme Hatası');
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
        $subcagetory = Subcategory::findorfail($id);
        $title = "Altkategori Güncelleme Sayfası";

        return view('admin.subcategory.edit', ['subcategory' => $subcagetory, 'title' => $title]);
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


        $subcategory = Subcategory::findorfail($id);

        $subcategory->title = $request->title;
        $subcategory->body = $request->body;
        $subcategory->detail = $request->detail;
        $subcategory->keyword = $request->keyword;
        $subcategory->status = $request->status;

        $update = $subcategory->save();

        if ($update)
        {
            return back()->with('success','AltKategori Başarıyla Güncellendi');
        }else {
            return back()->with('fail','AltKategori Güncelleme Hatası');
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

            $subcategory = Subcategory::find($id);
            $delete = $subcategory->delete();

            if ($delete)
            {
                return back()->with('success','Altkategori Başarıyla Silindi');
            }else {
                return back()->with('fail','Altkategori Silme Hatası');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }

        //
        //
    }
}
