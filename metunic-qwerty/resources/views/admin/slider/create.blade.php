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
                <form method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                @csrf
                @method('POST') <!--begin::Aside column-->
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->

                            @for($i =0; $i < count($variable); $i++)
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 {{ $i == 0 ? "active" : "" }}" data-bs-toggle="tab" href="#slider-{{ $variable[$i]['lang'] }}">{{ $variable[$i]['language'] }}</a>
                            </li>

{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Advanced</a>--}}
{{--                            </li>--}}
                         @endfor
                            <!--end:::Tab item-->

                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->

                            @for($i =0; $i < count($variable); $i++)
                            <div class="tab-pane fade show {{ $i == 0 ? "show active" : "" }} " id="slider-{{ $variable[$i]['lang'] }}" role="tab-panel">
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
                                                <input type="text" name="title[{{ $variable[$i]['lang'] }}]" class="form-control mb-2" placeholder="Product name" value="" />
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
                                                <div  class="min-h-200px mb-2 quill-textarea-{{ $variable[$i]['lang'] }}"></div>
                                                <textarea style="display: none" id="detail-{{ $variable[$i]['lang'] }}" name="desc[{{ $variable[$i]['lang'] }}]"></textarea>

                                            </div>


                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Slider Keywords</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="keyword[{{ $variable[$i]['lang'] }}]" class="form-control mb-2" placeholder="Slider Keywords" value="" />
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
                                                    <select name="url[{{ $variable[$i]['lang'] }}]" class="form-select mb-2 urladress-{{ $variable[$i]['lang'] }}" data-control="select2" data-hide-search="true" data-placeholder="Özel Url Seçimi" id="kt_ecommerce_add_product_status_select2">
                                                        <option></option>
                                                        <option selected value="0" >Pasif</option>
                                                        <option value="1">Aktif</option>
                                                    </select>
                                            </div>

                                            <div id="menuUrl{{ $variable[$i]['lang'] }}" class="mb-10 fv-row" style="display: none;">
                                                <!--begin::Label-->
                                                <label class="required form-label">Slider Url Alanı</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="url_adress[{{ $variable[$i]['lang'] }}]" class="form-control mb-2" placeholder="Menü Url"  />

                                                <!--end::Description-->
                                            </div>
                                            <!--end:Tax-->
                                        </div>

                                        <input type="hidden" name="order[{{ $variable[$i]['lang'] }}]" value="0">

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

{{--                                    <div class="card card-flush py-4">--}}
{{--                                        <!--begin::Card header-->--}}
{{--                                        <div class="card-header">--}}
{{--                                            <!--begin::Card title-->--}}
{{--                                            <div class="card-title">--}}
{{--                                                <h2>Slider Görsel</h2>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Card title-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Card header-->--}}
{{--                                        <!--begin::Card body-->--}}
{{--                                        <div class="card-body text-center pt-0">--}}
{{--                                            <!--begin::Image input-->--}}
{{--                                            <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url(assets/media/svg/files/blank-image.svg)">--}}
{{--                                                <!--begin::Preview existing avatar-->--}}
{{--                                                <div  class="image-input-wrapper w-150px h-150px"></div>--}}
{{--                                                <!--end::Preview existing avatar-->--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">--}}
{{--                                                    <i class="bi bi-pencil-fill fs-7"></i>--}}
{{--                                                    <!--begin::Inputs-->--}}
{{--                                                    <input type="file" name="image[{{ $variable[$i]['lang'] }}]" accept=".png, .jpg, .jpeg" />--}}
{{--                                                    <input type="hidden" name="avatar_remove" />--}}
{{--                                                    <!--end::Inputs-->--}}
{{--                                                </label>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Cancel-->--}}
{{--                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">--}}
{{--														<i class="bi bi-x fs-2"></i>--}}
{{--													</span>--}}
{{--                                                <!--end::Cancel-->--}}
{{--                                                <!--begin::Remove-->--}}
{{--                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">--}}
{{--														<i class="bi bi-x fs-2"></i>--}}
{{--													</span>--}}
{{--                                                <!--end::Remove-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Image input-->--}}
{{--                                            <!--begin::Description-->--}}
{{--                                            <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>--}}
{{--                                            <!--end::Description-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Card body-->--}}
{{--                                    </div>--}}

{{--                                    <div class="card card-flush py-4">--}}
{{--                                        <!--begin::Card header-->--}}
{{--                                        <div class="card-header">--}}
{{--                                            <!--begin::Card title-->--}}
{{--                                            <div class="card-title">--}}
{{--                                                <h2>Yayın Alanı</h2>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Card title-->--}}
{{--                                            <!--begin::Card toolbar-->--}}
{{--                                            <div class="card-toolbar">--}}
{{--                                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>--}}
{{--                                            </div>--}}
{{--                                            <!--begin::Card toolbar-->--}}
{{--                                        </div>--}}
{{--                                        <div class="card-body pt-0">--}}
{{--                                            <label class="required form-label">Menu Durum</label>--}}
{{--                                            <!--begin::Select2-->--}}
{{--                                            <select name="default" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Dil Durum Seçimi" id="kt_ecommerce_add_product_status_select">--}}
{{--                                                <option></option>--}}
{{--                                                <option value="1" >Yayında</option>--}}
{{--                                                <option value="0">Pasif</option>--}}
{{--                                            </select>--}}
{{--                                            <!--end::Datepicker-->--}}
{{--                                        </div>--}}
{{--                                        <!--end::Card body-->--}}
{{--                                    </div>--}}
                                    <!--end::Pricing-->
                                </div>
                            </div>
                            @endfor


                            <!--end::Tab pane-->

                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ Route('admin.menu') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Geri Dön</a>
                            <!--begin::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Menü Kaydet</span>
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
        @for($i =0; $i < count($variable); $i++)

            var urladressblock{{ $variable[$i]['lang'] }} = ".urladress-{{ $variable[$i]['lang'] }}";

            var menuUrl{{ $variable[$i]['lang'] }} = "#menuUrl{{ $variable[$i]['lang'] }}";

            $(urladressblock{{ $variable[$i]['lang'] }}).on('change',function (){
                var menuItem = $(this).val();
                if(menuItem == 1)
                {
                    $(menuUrl{{ $variable[$i]['lang'] }}).css('display','block');
                }else {
                    $(menuUrl{{ $variable[$i]['lang'] }}).css('display','none');
                }
            });

        @endfor

    </script>

    <script>

        @for($i =0; $i < count($variable); $i++)



            var quil{{ $variable[$i]['lang'] }} = new Quill(".quill-textarea-{{ $variable[$i]['lang'] }}", {
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

           quil{{ $variable[$i]['lang'] }}.on('text-change', function(delta, oldDelta, source) {
                console.log(quil{{ $variable[$i]['lang'] }}.container.firstChild.innerHTML)
                $("#detail-{{ $variable[$i]['lang'] }}").val(quil{{ $variable[$i]['lang'] }}.container.firstChild.innerHTML);
            });
        @endfor


    </script>

@endsection
