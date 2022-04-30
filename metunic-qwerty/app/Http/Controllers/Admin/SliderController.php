<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Language;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    public function index(Request $request)
    {

        $data = [];


        if (!empty($request->input('choise')))
        {
            $param = $request->input('choise');
            if ($param == "tr")
            {
                $data['SliderData'] =  Slider::query()->where('lang',$param)->groupBy('lang_key')->get();
            }else if ($param == "en")
            {
                $data['SliderData'] =  Slider::query()->where('lang',$param)->groupBy('lang_key')->get();

            }else if ($param == "new")
            {
                $data['SliderData'] =  Slider::query()->groupBy('lang_key')->orderBy('created_at','DESC')->get();

            }else if ($param == "old")
            {
                $data['SliderData'] =  Slider::query()->groupBy('lang_key')->orderBy('created_at','ASC')->get();
            }else{
                $data['SliderData'] = Slider::groupBy('lang_key')->get();
            }
        }else {

            $data['SliderData'] = Slider::groupBy('lang_key')->orderBy('order','ASC')->get();
        }


        $data['home'] = [
            'title' => "Anasayfa",
            'url' => '/admin/home'
        ];
        $data['title'] = "Slider listesi";
        $data['subtitle'] = "Listeleme";




        return view('admin.slider.index', compact('data'));
    }

    public function sortable(Request $request)
    {
        try {
            foreach ($request->data as $k => $v) {

                $affected = DB::table('sliders')->where('lang_key', $v)->update(['order' => $k]);
            }
            $result = [
                'status' => '1'
            ];

            $v = json_encode($result);
            echo $v;
            exit();


        } catch (\Exception $error) {
            return false;
        }
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
        $variable = Language::query()->where('default',1)->get();





        return view('admin.slider.create', compact('data','variable') );

    }

    public function store(Request $request)
    {

        //return $request->all();

        $lang = Language::query()->where('default',1)->get();

        $dataLang = [];
        $countData = [];
        foreach ($lang as $la){
            array_push($dataLang, $la->lang);
        }

        $lang_id =  md5(time() . rand());

        for($i= 0; $i < count($dataLang); $i++)
        {
           $sliderId = Slider::create([
                'lang' => $dataLang[$i],
                'lang_key' => $lang_id,
                'title' => $request->title[$dataLang[$i]],
                'desc' => $request->desc[$dataLang[$i]],
                'url' =>  $request->url[$dataLang[$i]],
                'url_adress' => $request->url_adress[$dataLang[$i]],
                'order' => $request->order[$dataLang[$i]],
            ]);

            $countData[] = $sliderId;

        }

        if (count($dataLang) == count($countData))
        {
            return back()->with('success','Slider Başarıyla Eklendi');

        }else {

            return back()->with('fail','Slider Ekleme Hatası');
        }




//        $request_image = $request->file('image');
//        $image = Image::make($request_image);
//
//        $image_path = public_path('/src/slider/');
//
//        $image_name = time().'.'.$request_image->getClientOriginalExtension();
//
//        $image->resize(null, 200, function($constraint) {
//            $constraint->aspectRatio();
//        });
//
//        $image->save($image_path.$image_name);
//
//        $slider = new Slider();
//        $slider->image = "src/slider/".$image_name;
//        $slider->title = $request->title;
//        $slider->desc = $request->desc;
//        $slider->keyword = $request->keyword;
//        $slider->url = $request->url;
//        $slider->url_adress = $request->url_adress;
//        $slider->status = $request->status;
//        $slider->order = $request->order;
//
//        $slider->save();


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
