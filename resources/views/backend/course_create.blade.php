@extends('backend.layout.master')

@section('title', 'Paket Materi - Amanah Kitchen')

@section('content')
    <script>
        function tampilkanPreview(gambar, idpreview) {
            var gb = gambar.files;
            for (var i = 0; i < gb.length; i++) {
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    reader.readAsDataURL(gbPreview);
                } else {
                    alert("Type file tidak sesuai. Khusus image.");
                }
            }
        }
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">System</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/category.html') }}">Paket Materi</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('admin/category/create.html') }}">Create</a></li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Tambah Paket Materi</h4>
                </div>
            </div>
            <!-- end row-->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('admin/course/create.js')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="header-title mt-0 mb-1">Buat Paket Materi Baru
                                    <button type="submit" class="btn btn-success btn-sm float-right"><span data-feather="save" style="padding:2px; margin-right:5px"></span> Simpan</button>
                                    <a href="{{ url('admin/course.html') }}" class="btn btn-primary btn-sm float-right mr-2"><span data-feather="x-circle" style="padding:2px; margin-right:5px"></span>Batal</a>
                                </h4>
                                <p class="sub-header">
                                    Buat paket sesuai kebutuhan kamu!
                                </p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <center>
                                            <a class="user-avatar" href="#">
                                                <img id="photo" class="thumb-md mb-2" src="{{asset('backend/images/no-pict.png')}}" style="width:250px;height:250px" alt="">
                                            </a>
                                        </center>
                                        <div class="form-group">
                                            <center>
                                                <div class="myfileupload-buttonbar" style="margin-top:20px">
                                                    <label class="btn btn-primary">
                                                        <span>Upload Foto</span>
                                                        <input id="file" type="file" name="photo" accept="image/*" onchange="tampilkanPreview(this,'photo')" />
                                                    </label>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Nama Paket Materi</label>
                                            <input type="text" name="name" id="" class="form-control" placeholder="Contoh : Paket Murah Meriah">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="">Pilih Kategori Paket Materi</option>
                                                @foreach($category as $row)
                                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Paket</label>
                                            <input type="text" name="price" id="" class="form-control" placeholder="Rp.">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Promo (* Kosongi jika tidak ada promo)</label>
                                            <input type="text" name="discount" id="" class="form-control" placeholder="Rp.">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Deskripsi Paket Materi</label>
                                            <textarea name="description" class="richtext" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status Publik</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Dipublikasi</option>
                                                <option value="0">Tidak Dipublikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div> <!-- content -->
@endsection
