@extends('backend.layout.master')

@section('title', 'Pilihan Materi - Amanah Kitchen')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">System</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/details.html') }}">Pilihan Materi</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('admin/details/create.html') }}">Create</a></li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Tambah Pilihan Materi</h4>
                </div>
            </div>
            <!-- end row-->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-0 mb-1">Buat Pilihan Materi Baru <a href="{{ url('admin/products.html') }}" class="btn btn-primary btn-sm float-right"><span data-feather="x-circle" style="padding:2px; margin-right:5px"></span>Batal</a></h4>
                            <p class="sub-header">
                                Membuat Pilihan Materi baru, agar pelanggan mengetahui detail apa yang kamu tawarkan!
                            </p>


                            <form action="{{url('admin/details/create.js')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <select data-plugin="customselect" name="product" id="product" class="form-control">
                                        <option value="null">Pilih Materi</option>
                                        @foreach($product as $row)
                                            <option value="{{$row['id']}}">{{ $row['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="frName">
                                    <label for="">Nama Pilihan Materi</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Mie Kocok Bandung, Dan Sebagainya">
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
        <script>
            $(document).ready(function() {
                $('#frName').slideUp();
                $('#product').change(function(e) {
                    e.preventDefault();
                    if ($('#course').val() != "null") {
                        $('#frName').slideDown();
                    } else {
                        $('#frName').slideUp();
                    }
                });
            });
        </script>
@endsection
