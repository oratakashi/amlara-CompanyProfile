@extends('frontend.layout.detail')

@section('title', $course['name'].' - Amanah Kitchen')

@php
    $text = "Hallo Amanah Kitchen, Saya ingin tertarik dengan ".$course['name']." apakah masih tersedia ?";
    $endcoded = str_replace(" ", "%20", $text);
@endphp

@section('content')
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h1 style="padding-bottom: 50px;">{{ $course['name'] }}</h1>

        </div>
    </section>
    <!--End Page Title-->

    <!-- Intro Courses -->
    <section class="intro-section">
        <div class="patern-layer-one paroller" data-paroller-factor="0.40" data-paroller-factor-lg="0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url('{{asset('frontend')}}/images/icons/icon-1.png')"></div>
        <div class="patern-layer-two paroller" data-paroller-factor="0.40" data-paroller-factor-lg="-0.20" data-paroller-type="foreground" data-paroller-direction="vertical" style="background-image: url('{{asset('frontend')}}/images/icons/icon-2.png')"></div>
        <div class="circle-one"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <!-- Intro Info Tabs-->
                            <div class="intro-info-tabs">
                                <!-- Intro Tabs-->
                                <div class="intro-tabs tabs-box">

                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-overview" class="tab-btn active-btn">Overview</li>
                                        <li data-tab="#prod-curriculum" class="tab-btn">Materi</li>
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab / Active Tab-->
                                        <div class="tab active-tab" id="prod-overview">
                                            <div class="content">

                                                <!-- Cource Overview -->
                                                <div class="course-overview">
                                                    <div class="inner-box"><?= $course['description'] ?></div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Tab -->
                                        <div class="tab" id="prod-curriculum">
                                            <div class="content">

                                                <!-- Accordion Box -->
                                                <ul class="accordion-box">

                                                    <!-- Block -->
                                                    @foreach($materi as $row)
                                                        <li class="accordion block">
                                                            <div class="acc-btn @if($loop->index == 0) active @endif">
                                                                <div class="icon-outer"><span class="icon icon-plus flaticon-angle-arrow-down"></span></div> {{$row['name']}}
                                                            </div>
                                                            @if(count($row['details']) > 0)
                                                                <div class="acc-content @if($loop->index == 0) current @endif">
                                                                    @foreach($row['details'] as $detail)
                                                                        <div class="content">
                                                                            <div class="clearfix">
                                                                                <div class="pull-left">
                                                                                    <span class="play-icon"><span class="fa fa-play"></span>{{ $detail['name'] }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Video Column -->
                    <div class="video-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column sticky-top">

                            <!-- Video Box -->
                            <div class="intro-video" style="background-image: url('{{ asset('media')."/".$course['photos'] }}')">
                                <span href="#" class="intro-video-box"></span>
                                <h4> </h4>
                            </div>
                            <!-- End Video Box -->
                            <div class="price">
                                @if($course['discount']!=0)
                                    {{ "Rp " . number_format($course['discount'],2,',','.') }}
                                @else
                                    {{ "Rp " . number_format($course['price'],2,',','.') }}
                                @endif
                            </div>
                            @if($course['discount']!=0)
                                <div class="time-left">{{ "Rp " . number_format($course['price'],2,',','.') }}</div>
                            @else
                                <br><br>
                            @endif
                            <a href="https://api.whatsapp.com/send?phone=6282123882733&text={{$endcoded}}" class="theme-btn btn-style-three"><span class="txt">Daftar Sekarang <i class="fa fa-angle-right"></i></span></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End intro Courses -->
@endsection
