@extends('admin.main')

@section('title')
@stop

@section('css')
@stop

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Subscriptions List</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ $data['home']['url'] }}" class="text-muted text-hover-primary">{{ $data['home']['title'] }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ $data['title'] }}</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-300 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->

                        <li class="breadcrumb-item text-dark">{{ $data['subtitle'] }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        {{--    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif--}}



        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif


        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
    @endif
    <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Form-->
                <form action="{{ route('admin.panel.user.update', [$admin->id]) }}" method="post"  class="form d-flex flex-column flex-lg-row" >
                @csrf
                @method('PUT')
                <!--begin::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                            <!--begin:::Tab item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">İşlemler</a>
                            </li>

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
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">


                                                <!--begin::Label-->
                                                <label class="@if($errors->has('name')) required @endif  form-label">Kullanıcı Adı @if($errors->has('name'))  <strong>{{ $errors->first('name') }}</strong> @endif</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name" class="form-control mb-2" value="{{ $admin->name }}"  />

                                                <!--end::Description-->
                                            </div>

                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="@if($errors->has('email')) required @endif form-label">E Mail Adresi   @if($errors->has('email'))  <strong>{{ $errors->first('email') }}</strong> @endif  </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="email" class="form-control mb-2" value="{{ $admin->email }}" />

                                                <!--end::Description-->
                                            </div>


                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="@if($errors->has('password')) required @endif form-label">Kullanıcı Şifresi  @if($errors->has('password'))  <strong>{{ $errors->first('password') }}</strong> @endif </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password" class="form-control mb-2"  />

                                                <!--end::Description-->
                                            </div>


                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="@if($errors->has('repassword')) required @endif form-label">Kullanıcı Şifresi Tekrar  @if($errors->has('repassword'))  <strong>{{ $errors->first('repassword') }}</strong> @endif </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="repassword" class="form-control mb-2"  />

                                                <!--end::Description-->
                                            </div>



                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::General options-->
                                    <!--begin::Status-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h4 class="@if($errors->has('default')) required @endif" >Kullanıcı Rolü Belirleme @if($errors->has('default'))  <strong>{{ $errors->first('default') }}</strong> @endif  </h4>
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
                                            <select name="default" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Kullanıcı Rolü Belirleme" id="kt_ecommerce_add_product_status_select">
                                                <option></option>
                                                <option {{ $admin->adminRolesDetail->role_id == 1 ? "selected" : "" }} value="1">Admin</option>
                                                <option {{ $admin->adminRolesDetail->role_id == 2 ? "selected" : "" }} value="2">Yazılım</option>
                                                <option {{ $admin->adminRolesDetail->role_id == 3 ? "selected" : "" }} value="3">Editör</option>
                                                <option {{ $admin->adminRolesDetail->role_id == 4 ? "selected" : "" }} value="4">Yazar</option>
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

                                </div>
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->

                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ Route('admin.panel.user') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Geri Dön</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">Kullanıcı Kaydet</span>
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

    </div>



@stop

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

@endsection
