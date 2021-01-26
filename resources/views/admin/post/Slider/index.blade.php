@extends('layouts.app')

@section('main-content')

@php
  $slider_json = json_decode($all_slider);
@endphp

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user() -> name }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        @include('validate')
        <a class="btn btn-primary mb-1" data-toggle="modal" href="#slider_modal">Add new SliderCategory</a>
        <div class="row">
            @foreach( $slider_json as $sliders )
            <div class="col-lg-4">
                <div class="card shadow-lg">
                    <div class="imgs">
                     <a href="{{ route('slider.edit', $sliders -> id) }}"><img class="sliderimg" src="{{ URL::to('/') }}/media/slider/img/{{ $sliders -> sliderimage }}" alt=""></a>
                    </div>
                    <div class="card-body">
                        @php
                         $title_data = json_decode($sliders -> title);
                         $subtitle_data = json_decode($sliders -> subtitle);
                        @endphp
                        @foreach( $title_data as $title )
                        #<a href="#" style="font-size: 20px;">{{ $title -> title }}</a> 
                        @endforeach
                        @foreach( $subtitle_data as $subtitle )
                        <a href="{{ route('slider-home.edit',$sliders -> id) }}"><h2 style="font-size: 22px; color: black;">{{ $subtitle -> subtitle }}</h2></a>  
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="slider_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Slider</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('slider-home.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf

                             <div class="form-group">
                                <label style="margin-left: 3px; font-size: 50px; cursor: pointer;" for="Simg"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                <input style="display: none;" name="simage" class="" type="file" id="Simg">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="slider_image" src="" alt="">
                            </div>

                            <div class="form-group">
                                <label for="">Slider Video</label>
                                <input type="text" class="form-control" name="svideo">
                            </div>

                            {{-- <div class="form-group">
                                <label style="margin-left: 3px; font-size: 50px; cursor: pointer;" for="Svideo"><i class="fa fa-file-video-o" aria-hidden="true"></i></label>
                                <input style="display: none;" name="svideo" class="" type="file" id="Svideo">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="slider_video" src="" alt="">
                            </div> --}}

                            <div class="form-group">
                                <label for="">SliderCategory</label>
                                <select name="slidercategory" id="" class="form-control">
                                    @foreach( $data as $slidercat )
                                    <option value=""></option>
                                    <option value="{{ $slidercat -> id }}">{{ $slidercat -> name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                             <label for=""></label>
                             <div class="comet-slider2-container">

                             </div>
                           </div>

                           <div class="form-group">
                             <label for="">Add Slide</label>
                             <button id="comet_add_slide2" class="btn btn-primary ml-1">Add New Slide</button>
                           </div>

                            <div class="form-group">
                                <input class="btn btn-block btn-primary" type="submit" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

@endsection
