@extends('admin.main')

@section('title')
    {{ $title }}
@stop

@section('css')
@stop

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Genel Ayarlar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Sosyal Medya</a>
                                    </li>

                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="card card-primary">

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

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
                                        <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{ route('settingadminupdate', $setting->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Title</label>
                                                        <input name="title" type="text" value="{{ $setting->title }}" class="form-control" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Keyword</label>
                                                        <input name="keyword" type="text" value="{{ $setting->keyword }}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ $setting->description }}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Author</label>
                                                        <input name="author" type="text" value="{{ $setting->author }}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Google Analytics</label>
                                                        <textarea name="analytics" class="form-control" rows="3">{{ $setting->analytics}}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Yandex Metrica</label>
                                                        <textarea name="metrica" class="form-control" rows="3">{{ $setting->metrica }}</textarea>
                                                    </div>

                                                    <input type="hidden" value="1" name="section">


                                                    <div class="form-group">
                                                        <label>Bakım Modu</label>
                                                        <select name="status"  class="form-control">
                                                            @if($setting->status == 0)
                                                                <option value="0">Pasif</option>
                                                                <option value="1">Aktif</option>
                                                            @else
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Pasif</option>

                                                            @endif


                                                        </select>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary float-right">Ayar Kaydet</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="card card-primary">


                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

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
                                        <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{ route('settingadminupdate', $setting->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Facebook</label>
                                                        <input name="facebook" type="text" value="{{ $setting->facebook }}" class="form-control" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Instagram</label>
                                                        <input name="instagram" type="text" value="{{ $setting->instagram }}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Twitter</label>
                                                        <input name="twitter" type="text" value="{{ $setting->twitter }}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Pinterest</label>
                                                        <input name="pinterest" type="text" value="{{ $setting->pinterest }}" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Youtube</label>
                                                        <input name="youtube" type="text" value="{{ $setting->youtube }}" class="form-control">
                                                    </div>

                                                    <input type="hidden" value="2" name="section">

                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary float-right">Ayar Kaydet</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- /.card -->
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop

@section('js')
@stop
