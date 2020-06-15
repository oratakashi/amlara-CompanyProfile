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
            <li class="breadcrumb-item"><a href="{{url('admin/category.html') }}">Kategori</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('admin/category/create.html') }}">Create</a></li>
          </ol>
        </nav>
        <h4 class="mb-1 mt-0">Tambah Kategori</h4>
      </div>
    </div>
    <!-- end row-->


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <h4 class="header-title mt-0 mb-1">Buat Kategori Baru <a href="{{ url('admin/category.html') }}" class="btn btn-primary btn-sm float-right"><span data-feather="x-circle" style="padding:2px; margin-right:5px"></span>Batal</a></h4>
            <p class="sub-header">
              Membuat kategori baru, agar memudahkan mengatur paket materi kamu!
            </p>


            <form action="{{url('admin/category/create.js')}}" method="post">
              @csrf
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Kue Kering, Dan Sebagainya">
              </div>
              <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-success col-md-12">
              </div>
            </form>
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div>
  </div> <!-- content -->
  @endsection