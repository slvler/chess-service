<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Slider;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        $title = "Slider Listeleme Sayfası";

        return view('admin.slider.index',['title' => $title, 'slider' => $slider ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = " Slider Ekleme Sayfası ";

        return view('admin.slider.create', ['title' => $title]);
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
                'title' => 'required',
                'body' => 'required',
                'keyword' => 'required',
                'status' => 'required',
            ],
            [
                'image.required' => 'Görsel Boş Bırakılamaz',
                'title.required' => 'Başlık Boş Bırakılamaz',
                'body.required' => 'Açıklama Boş Bırakılamaz',
                'detail.required' => 'Detay Boş Bırakılamaz',
                'keyword.required' => 'Keyword Boş Bırakılamaz',
                'status.required' => 'Durum Boş Bırakılamaz'
            ]
        );

        $image = time(). '-' . $request->title . '.' .$request->image->extension();

        $request->image->move(public_path('images'),$image);


        $slider = new Slider();

        $slider->image = $image;
        $slider->title = $request->title;
        $slider->body = $request->body;
        $slider->keyword = $request->keyword;
        $slider->status = $request->status;

        $save = $slider->save();

        if ($save)
        {
            return back()->with('success','Slider Başarıyla Eklendi');
        }else {
            return back()->with('fail','Slider Ekleme Hatası');
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

        $slider = Slider::findOrFail($id);

        $title = "Slider Güncelleme Sayfası";

        return view('admin.slider.edit', ['slider' => $slider, 'title' => $title]);
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
        $validator = Validator::make($request->all(),
            [
                'title' => 'required',
                'body' => 'required',
                'keyword' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Başlık Boş Bırakılamaz',
                'body.required' => 'Açıklama Boş Bırakılamaz',
                'keyword.required' => 'Keyword Boş Bırakılamaz',
                'status.required' => 'Durum Boş Bırakılamaz'
            ]


        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $slider = Slider::findOrFail($id);

        $slider->title = $request->title;
        $slider->body = $request->body;
        $slider->keyword = $request->keyword;
        $slider->status = $request->status;

        $save = $slider->save();

        if ($save)
        {
            return back()->with('success','Slider Başarıyla Güncellendi');
        }else {
            return back()->with('fail','Slider Güncelleme Hatası');
        }


    }


    public function gallery(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $title = "Slider Galeri Sayfası";

        return view('admin.slider.gallery', ['slider' => $slider, 'title' => $title]);

    }

    public function image(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'image' => 'required|mines:jpg,png,jpeg|max:5048',
            ],
            [
                'image.required' => 'Görsel Boş Bırakılamaz'
            ]
        );

        $slider = Slider::findOrFail($id);
        $image = public_path('images/'.$slider->image);

        if(file_exists($image)){
            unlink($image);
        }

        $image = time(). '-' . $slider->title . '.' .$request->image->extension();
        $request->image->move(public_path('images'),$image);

        $slider->image = $image;

        $save = $slider->save();

        if ($save)
        {
            return back()->with('success','Slider Görsel Başarıyla Güncellendi');
        }else {
            return back()->with('fail','Slider Ekleme Hatası');
        }

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

            $slider = Slider::findorFail($id);

            $image = public_path('images/'.$slider->image);

            if(file_exists($image)){
                unlink($image);
            }

            $delete = $slider->delete();

            if ($delete)
            {
                return back()->with('success','Slider Başarıyla Silindi');
            }else {
                return back()->with('fail','Slider Silme Hatası');
            }

        } catch (\Exception $exception) {

            \Log::error($exception);

            return redirect()->back()->with(['fail' => 'There was an error']);
        }

    }
}
