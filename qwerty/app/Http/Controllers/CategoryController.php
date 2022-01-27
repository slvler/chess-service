<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = Category::all();
        $title = "Kategori Listeleme Sayfası";

        return view('admin.category.index', ['category' => $category, 'title' => $title]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Kategori Ekleme Sayfası";
        return view('admin.category.create', ['title' => $title]);
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


        $menu = new Category();

        $menu->title = $request->title;
        $menu->body = $request->body;
        $menu->detail = $request->detail;
        $menu->keyword = $request->keyword;
        $menu->status = $request->status;

        $save = $menu->save();

        if ($save)
        {
            return back()->with('success','Kategori Başarıyla Eklendi');
        }else {
            return back()->with('fail','Kategori Ekleme Hatası');
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
        $category = Category::find($id);
        $title = "Kategori Güncelleme Sayfası";

        return view('admin.category.edit', ['category' => $category, 'title' => $title]);

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


        $category = Category::findorfail($id);

        $category->title = $request->title;
        $category->body = $request->body;
        $category->detail = $request->detail;
        $category->keyword = $request->keyword;
        $category->status = $request->status;

        $save = $category->save();

        if ($save)
        {
            return back()->with('success','Kategori Başarıyla Güncellendi');
        }else {
            return back()->with('fail','Kategori Güncelleme Hatası');
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

            $category = Category::find($id);
            $delete = $category->delete();

            if ($delete)
            {
                return back()->with('success','Kategori Başarıyla Silindi');
            }else {
                return back()->with('fail','Kategori Silme Hatası');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }
    }
}
