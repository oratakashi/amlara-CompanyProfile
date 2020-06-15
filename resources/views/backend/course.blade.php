@extends('backend.layout.master')

@section('title', 'Paket Materi - Amanah Kitchen')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">System</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('admin/category.html') }}">Paket materi</a></li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Paket materi</h4>
            </div>
        </div>
        <!-- end row-->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-1">Daftar Paket materi <a href="{{ url('admin/course/create.html') }}" class="btn btn-primary btn-sm float-right"><span data-feather="plus-circle" style="padding:2px; margin-right:5px"></span>Tambah</a></h4>
                        <p class="sub-header">
                            Semua Materi di Gabung menjadi sebuah paket materi
                        </p>


                        @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('alert')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Promo</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$row['name']}}</td>
                                    <td>{{$row['category']}}</td>
                                    <td>{{ "Rp " . number_format($row['price'],2,',','.') }}</td>
                                    <td>{{ "Rp " . number_format($row['discount'],2,',','.') }}</td>
                                    <td>
                                        @if($row['status'] == 1)
                                        <span class="badge badge-primary badge-pill">Dipublikasi</span>
                                        @else
                                        <span class="badge badge-danger badge-pill">Tidak Dipublikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group mt-2 mr-1">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon"><span data-feather="edit"></span></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('admin/course/').'/'.$row['id'].'/update.html' }}">Ubah</a>
                                                <form action="{{ url('admin/course/').'/'.$row['id'].'/delete.js' }}" class="d-inline" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div> <!-- content -->
    @endsection
