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
                    <div class="col-md-8 offset-2">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Slider Güncelleme Formu</h3>
                            </div>

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
                            <form action="{{ route('slideradminupdate', $slider->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Başlık</label>
                                        <input name="title" type="text" value="{{ $slider->title }}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Açıklama</label>
                                        <input name="body" type="text" value="{{ $slider->body }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Keyword</label>
                                        <input name="keyword" type="text" value="{{ $slider->keyword }}" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Durum</label>
                                        <select name="status"  class="form-control">
                                            @if($slider->status == 0)
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
                                    <button type="submit" class="btn btn-primary float-right">Slider Güncelleme</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>


                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop

@section('js')
@stop
