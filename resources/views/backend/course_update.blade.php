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
                            <li class="breadcrumb-item"><a href="{{url('admin/course.html') }}">Paket Materi</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('admin/course/'.$data['id'].'/update.html') }}">Update</a></li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Ubah Paket Materi</h4>
                </div>
            </div>
            <!-- end row-->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('admin/course/'.$data['id'].'/update.js')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <h4 class="header-title mt-0 mb-1">Ubah Paket Materi
                                    <button type="submit" class="btn btn-success btn-sm float-right"><span data-feather="save" style="padding:2px; margin-right:5px"></span> Simpan</button>
                                    <a href="{{ url('admin/course.html') }}" class="btn btn-primary btn-sm float-right mr-2"><span data-feather="x-circle" style="padding:2px; margin-right:5px"></span>Batal</a>
                                </h4>
                                <p class="sub-header">
                                    Ubah paket materi {{$data['name']}}
                                </p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="">
                                            <center>
                                                <a class="user-avatar" href="#">
                                                    @if($data['photos']=='no-picts.png')
                                                        <img id="photo" class="thumb-md mb-2" src="{{asset('backend/images/no-pict.png')}}" style="width:250px;height:250px" alt="">
                                                    @else
                                                        <img id="photo" class="thumb-md mb-2" src="{{asset('media')."/".$data['photos']}}" style="width:250px;height:250px" alt="">
                                                    @endif
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
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Nama Paket Materi</label>
                                            <input type="text" name="name" id="" class="form-control" placeholder="Contoh : Paket Murah Meriah" value="{{ $data['name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="">Pilih Kategori Paket Materi</option>
                                                @foreach($categories as $row)
                                                    <option value="{{ $row['id'] }}" @if($data['id_category']==$row['id']) selected @endif>{{ $row['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Paket</label>
                                            <input type="text" name="price" id="" class="form-control" placeholder="Rp." value="{{ $data['price'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Promo (* Kosongi jika tidak ada promo)</label>
                                            <input type="text" name="discount" id="" class="form-control" placeholder="Rp." value="{{ $data['discount'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Deskripsi Paket Materi</label>
                                            <textarea name="description" class="richtext" cols="30" rows="10">{{ $data['description'] }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status Publik</label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1" @if($data['status']=='1' ) selected @endif>Dipublikasi</option>
                                                <option value="0" @if($data['status']=='0' ) selected @endif>Tidak Dipublikasi</option>
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
