@extends('backend.layout.master')

@section('title', 'Beranda - Amanah Kitchen')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row page-title align-items-center">
      <div class="col-sm-4 col-xl-6">
        <h4 class="mb-1 mt-0">Selamat Datang, {{ Session::get('name') }}</h4>
      </div>
    </div>

    <div class="row">

    </div>
  </div>
</div> <!-- content -->
@endsection