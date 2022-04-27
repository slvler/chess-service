<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;


use Intervention\Image\Facades\Image;
use mysql_xdevapi\XSession;

class SliderController extends Controller
{
    public function index()
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Slider listesi";
        $data['subtitle'] = "Listeleme";


        $data['SliderData'] = Slider::get();


        return view('admin.slider.index', compact('data'));
    }

    public function create()
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Slider Bölümü";
        $data['subtitle'] = "Slider Ekleme";

        return view('admin.slider.create', compact('data') );

    }

    public function store(Request $request)
    {

        $request_image = $request->file('image');
        $image = Image::make($request_image);

        $image_path = public_path('/src/slider/');

        $image_name = time().'.'.$request_image->getClientOriginalExtension();

        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($image_path.$image_name);

        $slider = new Slider();
        $slider->image = "src/slider/".$image_name;
        $slider->title = $request->title;
        $slider->desc = $request->desc;
        $slider->keyword = $request->keyword;
        $slider->url = $request->url;
        $slider->url_adress = $request->url_adress;
        $slider->status = $request->status;
        $slider->order = $request->order;

        $slider->save();


    }

    public function edit($id)
    {

        $data = [];
        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Slider Bölümü";
        $data['subtitle'] = "Slider Ekleme";
        $slider = Slider::findOrfail($id);

        return view('admin.slider.edit', compact('data','slider') );

    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrfail($id);

        $slider->title = $request->title;
        $slider->desc = $request->desc;
        $slider->keyword = $request->keyword;
        $slider->url = $request->url;
        $slider->url_adress = $request->url_adress;
        $slider->status = $request->status;

        $slider->save();

        return redirect()->back();

    }




}
