@extends('backend.layout.master')

@section('title', 'Materi - Amanah Kitchen')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">System</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('admin/products.html') }}">Materi</a></li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Materi</h4>
            </div>
        </div>
        <!-- end row-->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-1">Daftar Materi <a href="{{ url('admin/products/create.html') }}" class="btn btn-primary btn-sm float-right"><span data-feather="plus-circle" style="padding:2px; margin-right:5px"></span>Tambah</a></h4>
                        <p class="sub-header">
                            Semua materi berdasarkan Paket Materi yang tersimpan di server
                        </p>
                        @if(Session::has('alert'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('alert')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form action="{{ url('admin/products.html') }}" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select data-plugin="customselect" name="course" class="form-control" data-placeholder="Filter Berdasarkan Paket Materi">
                                            <option></option>
                                            <option value="all">Tampilkan semua materi</option>
                                            @foreach($course as $row)
                                            <option value="{{$row['id']}}" @if($row['id']==$id_course) selected @endif>{{ $row['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary btn-sm"><span data-feather="filter" style="padding:2px; margin-right:5px"></span> Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Materi</th>
                                    <th>Paket Materi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($data as $row)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $row['name'] }}</td>
                                <td>{{ $row['course'] }}</td>
                                <td>
                                    <form action="{{ url('admin/products/'.$row['id'].'/delete.js') }}" class="d-inline" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"><span data-feather="trash-2" style="padding:2px; margin-right:5px"></span> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tbody>
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div> <!-- content -->
    @endsection
