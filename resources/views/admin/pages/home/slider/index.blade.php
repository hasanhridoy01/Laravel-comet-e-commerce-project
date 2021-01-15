@extends('layouts.app')

@section('main-content')

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        @php
           $all_slider_data = json_decode($sliders -> sliders);
        @endphp

        <div class="row">
            <div class="col-lg-6">
                @include('validate')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Page Slider</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                           @csrf

                           {{-- <div class="form-group">
                                <label style="margin-left: 3px; font-size: 50px; cursor: pointer;" for="Svideo"><i class="fa fa-file-video-o" aria-hidden="true"></i></label>
                                <input style="display: none;" name="svideo" class="" type="file" id="Svideo">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="slider_image" src="" alt="">
                            </div> --}}


                            <div class="form-group">
                              <label for="">Slider Video</label>
                              <input type="text" value="{{ $all_slider_data -> svideo }}" name="svideo" class="form-control">
                            </div>

                           <div class="form-group">
                             <label for=""></label>
                             <div class="comet-slider-container">

                               @foreach( $all_slider_data -> slider as $slide )

                                  <div id="slider-card-{{ $slide -> slide_code }}" class="card"> 
                                 <div data-toggle="collapse" data-target="#Slide-{{ $slide -> slide_code }}" style="cursor: pointer;" class="card-header"><h4>#Slide {{ $slide -> slide_code }} <button id="comet_slider_btn_one"  class="close">&times;</button></h4></div>
                                 <div id="Slide-{{ $slide -> slide_code }}" class="collapse">
                                   <div class="card-body">
                                     <div class="form-group">
                                       <label for="">Sub Title</label>
                                       <input type="text" value="{{ $slide -> subtitle }}" class="form-control" placeholder="Sub Title">
                                       <input type="hidden" value="{{ $slide -> slide_code }}" class="form-control">
                                     </div>
                                     <div class="form-group">
                                       <label for="">Main Title</label>
                                       <input type="text" value="{{ $slide -> title }}" class="form-control" placeholder="Main Title">
                                     </div>
                                     <div class="form-group">
                                       <label for="">Button 01 Title</label>
                                       <input type="text" value="{{ $slide -> btn1_title }}" class="form-control">
                                    </div>
                                     <div class="form-group">
                                       <label for="">Button 01 Link</label>
                                       <input type="text" value="{{ $slide -> btn1_link }}" class="form-control">
                                     </div>
                                     <div class="form-group">
                                       <label for="">Button 02 Title</label>
                                       <input type="text" value="{{ $slide -> btn2_title }}" class="form-control">
                                     </div>
                                     <div class="form-group">
                                       <label for="">Button 02 Link</label>
                                       <input type="text" value="{{ $slide -> btn2_link }}" class="form-control">
                                    </div>
                                   </div>
                                   </div>
                               </div>
                               
                               @endforeach

                             </div>
                           </div>

                            <div class="form-group">
                             <label for="">Add Slide</label>
                             <button id="comet_add_slide" class="btn btn-primary ml-1">Add New Slide</button>
                           </div>
                           <div class="form-group">
                               <input type="submit" value="Save" class="btn btn-info" style="margin-left: 630px;">
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
