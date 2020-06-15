@extends('backend.layout.master')

@section('title', 'Kategori - Amanah Kitchen')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row page-title">
      <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">System</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('admin/categories') }}">Kategori</a></li>
          </ol>
        </nav>
        <h4 class="mb-1 mt-0">Kategori</h4>
      </div>
    </div>
    <!-- end row-->


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="header-title mt-0 mb-1">Daftar Kategori <a href="{{ url('admin/category/create.html') }}" class="btn btn-primary btn-sm float-right"><span data-feather="plus-circle" style="padding:2px; margin-right:5px"></span>Tambah</a></h4>
            <p class="sub-header">
              Semua paket materi di kelompokan berdasarkan Kategori, menghapus kategori yang memiliki paket materi akan terhapus juga
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
                  <th>Nama Kategori</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{ $loop->index +1 }}</td>
                  <td>{{ $row['name'] }}</td>
                  <td>
                    <form action="{{ url('admin/category/').'/'.$row['id'].'/delete.js' }}" class="d-inline" method="POST">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger btn-sm"><span data-feather="trash-2" style="padding:2px; margin-right:5px"></span> Hapus</button>
                    </form>
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