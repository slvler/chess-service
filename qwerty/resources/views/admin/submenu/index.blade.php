@extends('admin.main')

@section('title')
    Altmenü Listesi
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
                    <div class="col-12">
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                                <a href="{{ route('submenuadmincreate', request()->segment(2)) }}"><button class="btn btn-primary">Altmenü Ekle</button></a>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Başlık</th>
                                        <th>Açıklama</th>
                                        <th>Detay</th>
                                        <th>Durum</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach($submenu as $m)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $m->title }}</td>
                                            <td>{{ $m->body }}</td>
                                            <td>{{ $m->detail }}</td>
                                            <td>{{ $m->status }}</td>
                                            <td>
                                                <a  href="{{ route('submenuadminedit', $m->id) }}"><button class="btn btn-success btn-xs">Güncelleme</button></a>
                                                <form style="display: inline-block !important;" action="{{ route('submenuadmindestroy', $m->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-xs">Sİl</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
