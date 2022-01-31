<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;


use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Menu;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index',['product' => $product]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = " Ürün Ekleme Sayfası ";
        $subcategory = Subcategory::all();

        return view('admin.product.create', ['title' => $title, 'subcategory' => $subcategory]);
        //
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
                'image' => 'required|mines:jpg,png,jpeg|max:5048',
                'subcategory' => 'required',
                'title' => 'required',
                'body' => 'required',
                'keyword' => 'required',
                'status' => 'required',
            ],
            [
                'image.required' => 'Görsel Boş Bırakılamaz',
                'subcategory.required' => 'Alt Kategori Boş Bırakılamaz',
                'title.required' => 'Başlık Boş Bırakılamaz',
                'body.required' => 'Açıklama Boş Bırakılamaz',
                'detail.required' => 'Detay Boş Bırakılamaz',
                'keyword.required' => 'Keyword Boş Bırakılamaz',
                'status.required' => 'Durum Boş Bırakılamaz'
            ]
        );

        $image = $request->image;

        $imageName = time(). '-' . $request->title . '.' .$request->image->extension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(446,446);
        $image_resize->save(public_path('images/').$imageName);



        $product = new Product();

        $product->image = $imageName;
        $product->subcategory_id = $request->subcategory;
        $product->title = $request->title;
        $product->body = $request->body;
        $product->keyword = $request->keyword;
        $product->status = $request->status;
        $product->seo_url = Str::slug($request->title, '-');

        $save = $product->save();

        if ($save)
        {
            return back()->with('success','Ürün Başarıyla Eklendi');
        }else {
            return back()->with('fail','Ürün Ekleme Hatası');
        }
        //

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
