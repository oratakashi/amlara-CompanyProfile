@extends('frontend.layout.master')

@section('title', 'Home - Amanah Kitchen')

@section('content')
    <!-- Courses Section -->
    <section class="courses-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Title Column -->
                <div class="title-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>Paket Materi</h2>
                            <div class="text">Berikut paket materi yang kami tawarkan.</div>
                        </div>
                        <a href="https://api.whatsapp.com/send?phone=6282123882733" class="theme-btn btn-style-three"><span class="txt">Info Lebih Lanjut <i class="fa fa-angle-right"></i></span></a>
                    </div>
                </div>

            @foreach($course as $row)
                <!-- Cource Block -->
                    <div class="cource-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="{{ url("/")."/".$row['id'] }}.html"><img src="{{ asset('media')."/".$row['photos'] }}" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h5><a href="{{ url("/")."/".$row['id'] }}.html">{{ $row['name'] }}</a></h5>
                                    </div>
                                    <div class="pull-right">
                                        <div class="price">{{ $row['category']['name'] }}</div>
                                    </div>
                                </div>
                                <div class="text"><?= $row['description'] ?></div>
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <div class="students">
                                            @if($row['discount']!=0)
                                                {{ "Rp " . number_format($row['discount'],2,',','.') }}
                                            @else
                                                {{ "Rp " . number_format($row['price'],2,',','.') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url("/")."/".$row['id'] }}.html" class="enroll">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Courses Section -->
@endsection
