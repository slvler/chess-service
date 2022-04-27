@extends('admin.main')


@section('title')
@endsection

@section('css')

    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('back/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('back/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

@endsection


@section('content')



    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
    @include('admin.layouts.toolbar')
    <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Form-->
                <form method="post" action="{{ route('admin.slider.update', $slider->id) }}"  class="form d-flex flex-column flex-lg-row">
                @csrf
                @method('PUT') <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Slider Durum</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="1" {{ $slider->status == 1 ? "selected" : ""}} >Aktif</option>
                                    <option value="0" {{ $slider->status == 0 ? "selected" : ""}} >Pasif</option>
                                </select>
                                <!--end::Select2-->
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
                                    <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" />
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                        <!--end::Template settings-->
                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">İşlemler</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Genel Alanlar</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Slider Başlık</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="title" class="form-control mb-2" placeholder="Product name" value="{{ $slider->title }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{-- <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                            <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div>
                                                <!--begin::Label-->
                                                <label class="form-label">Slider Açıklama</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <div  class="min-h-200px mb-2 quill-textarea"></div>
                                                <textarea style="display: none" id="detail" name="desc"></textarea>

                                            </div>


                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Slider Keywords</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="keyword" class="form-control mb-2" placeholder="Slider Keywords" value="{{ $slider->keyword }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            {{-- <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>--}}
                                            <!--end::Description-->
                                            </div>

                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <!--begin::Media-->
                                {{--   <div class="card card-flush py-4">
                                       <!--begin::Card header-->
                                       <div class="card-header">
                                           <div class="card-title">
                                               <h2>Media</h2>
                                           </div>
                                       </div>
                                       <!--end::Card header-->
                                       <!--begin::Card body-->
                                       <div class="card-body pt-0">
                                           <!--begin::Input group-->
                                           <div class="fv-row mb-2">
                                               <!--begin::Dropzone-->
                                               <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                   <!--begin::Message-->
                                                   <div class="dz-message needsclick">
                                                       <!--begin::Icon-->
                                                       <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                       <!--end::Icon-->
                                                       <!--begin::Info-->
                                                       <div class="ms-4">
                                                           <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                           <span class="fs-7 fw-bold text-gray-400">Upload up to 10 files</span>
                                                       </div>
                                                       <!--end::Info-->
                                                   </div>
                                               </div>
                                               <!--end::Dropzone-->
                                           </div>
                                           <!--end::Input group-->
                                           <!--begin::Description-->
                                           <div class="text-muted fs-7">Set the product media gallery.</div>
                                           <!--end::Description-->
                                       </div>
                                       <!--end::Card header-->
                                   </div>--}}
                                <!--end::Media-->
                                    <!--begin::Pricing-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Slider URL - Link ALanı</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Url Adresi</label>
                                                <!--end::Label-->

                                                <!--begin::Select2-->
                                                <select name="url" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Özel Url Seçimi" id="kt_ecommerce_add_product_status_select2">
                                                    <option></option>
                                                    <option {{ $slider->url == 0 ? "selected" : ""}} value="0" >Pasif</option>
                                                    <option {{ $slider->url == 1 ? "selected" : ""}}  value="1">Aktif</option>
                                                </select>
                                            </div>

                                            <div id="menuUrl" class="mb-10 fv-row" style="display:{{ $slider->url == 1 ? "block" : "none"}}">
                                                <!--begin::Label-->
                                                <label class="required form-label">Slider Url Alanı</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" value="{{ $slider->url_adress }}" name="url_adress" class="form-control mb-2" placeholder="Menü Url"  />

                                                <!--end::Description-->
                                            </div>
                                            <!--end:Tax-->
                                        </div>

                                        <input type="hidden" name="order" value="0">

                                        <!--end::Input group-->
                                        <!--begin::Input group-->

                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">

                                            <!--begin::Slider-->
                                            <div class="d-flex flex-column text-center mb-5">
                                                <div class="d-flex align-items-start justify-content-center mb-7">
                                                    <span class="fw-bolder fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
                                                    <span class="fw-bolder fs-4 mt-1 ms-2">%</span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                                            </div>

                                        </div>


                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Pricing-->
                                </div>
                            </div>
                            <!--end::Tab pane-->

                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ Route('admin.slider') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Geri Dön</a>
                            <!--begin::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Slider Güncelle</span>
                            </button>
                            <!--end::Button-->
                        </div>





                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>


@endsection


@section('js')

    @if(Session::get('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
    @endif

    @if(Session::get('fail'))
        <script>
            toastr.error("{!! Session::get('fail') !!}");
        </script>
    @endif

    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('back/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('back/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('back/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('back/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('back/assets/js/custom/apps/ecommerce/catalog/save-product.js') }}"></script>
    <script src="{{ asset('back/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('back/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('back/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('back/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('back/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('back/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->

    <link href="{{ asset('back/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />


    <script>
        $('#kt_ecommerce_add_product_status_select2').on('change',function (){
            var menuItem = $(this).val();

            if(menuItem == 1)
            {
                $('#menuUrl').css('display','block');
            }else {
                $('#menuUrl').css('display','none');
            }
        });
    </script>

    <script>

        var quill = new Quill('.quill-textarea', {
            placeholder: 'Slider Açıklama',
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }]
                ]
            }
        });

        quill.root.innerHTML = '{!! !empty($slider->desc) ? $slider->desc : ''  !!} ';

        quill.on('text-change', function(delta, oldDelta, source) {
            console.log(quill.container.firstChild.innerHTML)
            $('#detail').val(quill.container.firstChild.innerHTML);
        });
    </script>

@endsection
