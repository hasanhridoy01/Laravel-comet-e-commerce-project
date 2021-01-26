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
          $slider_json = json_decode($sliders);
        @endphp
        {{-- @php
           $data = json_decode($slider_json -> title);
        @endphp
        @foreach( $data as $dataa )
            {{ $dataa -> title }}
        @endforeach --}}
        <div class="row">
            <div class="col-lg-6">
                @include('validate')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Home Page Slider</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('slider-home.update', $slider_json -> id) }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                              <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/slider/img/{{ $slider_json -> sliderimage }}" alt="">
                                 <br>
                                 <br>
                                <label style="margin-left: 3px; font-size: 50px; cursor: pointer;" for="slider_photo"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                 <input name="old_photo" value="{{ $slider_json -> sliderimage }}" class="form-control" type="hidden">
                                <input style="display: none;" name="new_photo" class="" type="file" id="slider_photo">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="slider_image_show" src="" alt="">
                            </div>

                            {{-- <div class="form-group">
                              <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="" alt="">
                                 <br>
                                 <br>
                                <label style="margin-left: 3px; font-size: 50px; cursor: pointer;" for="Svideo"><i class="fa fa-file-video-o" aria-hidden="true"></i></label>
                                 <input name="old_video" value="" class="form-control" type="hidden">
                                <input style="display: none;" name="new_video" class="" type="file" id="Svideo">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="slider_image" src="" alt="">
                            </div> --}}

                            <div class="form-group">
                              <label for="">Slider Category</label>
                              <select name="" class="form-control" id="">
                                @php
                                  $data = App\Models\SliderCategory::latest() -> get();
                                @endphp
                                @foreach( $data as $slidercat )
                                <option value="">photo slider</option>
                                <option value="{{ $slidercat -> id }}">{{ $slidercat -> name }}</option>
                                @endforeach
                              </select>
                            </div>

                           <div class="form-group">
                             <label for=""></label>
                             <div class="comet-slider-update">

                              <div id="slider-card-" class="card"> 
                               <div data-toggle="collapse" data-target="#Slide-" style="cursor: pointer;" class="card-header"><h4>#Slide <button id="comet_slider_btn_one"  class="close">&times;</button></h4></div>
                               <div id="Slide-" class="collapse">
                                 <div class="card-body">
                                    @php
                                      $subtitle_data = json_decode($slider_json -> subtitle);
                                      $title_data = json_decode($slider_json -> title);
                                      $btn_titleone_data = json_decode($slider_json -> btn_title1);
                                      $btn_linkone_data = json_decode($slider_json -> btn_link1);
                                      $btn_titletwo_data = json_decode($slider_json -> btn_title2);
                                      $btn_linktwo_data = json_decode($slider_json -> btn_link2);
                                    @endphp
                                    @foreach( $subtitle_data as $subtitle )
                                   <div class="form-group">
                                     <label for="">Sub Title</label>
                                     <input type="text" value="{{ $subtitle -> subtitle }}" class="form-control" name="subtitle[]" placeholder="Sub Title">
                                     <input type="hidden" value="" class="form-control">
                                   </div>
                                    @endforeach
                                    @foreach( $title_data as $title )
                                   <div class="form-group">
                                     <label for="">Title</label>
                                     <input type="text" name="title[]" value="{{ $title -> title }}" class="form-control" placeholder="Main Title">
                                   </div>
                                   @endforeach
                                   @foreach( $btn_titleone_data as $btn_titleone )
                                   <div class="form-group">
                                     <label for="">Button 01 Title</label>
                                     <input type="text" name="btn_titleone[]" value="{{ $btn_titleone -> btn_titleone }}" class="form-control">
                                  </div>
                                  @endforeach
                                  @foreach( $btn_linkone_data as $btn_linkone )
                                   <div class="form-group">
                                     <label for="">Button 01 Link</label>
                                     <input type="text" name="btn_linkone[]" value="{{ $btn_linkone -> btn_linkone }}" class="form-control">
                                   </div>
                                   @endforeach
                                   @foreach( $btn_titletwo_data as $btn_titletwo )
                                   <div class="form-group">
                                     <label for="">Button 02 Title</label>
                                     <input type="text" name="btn_titletwo[]" value="{{ $btn_titletwo -> btn_titletwo }}" class="form-control">
                                   </div>
                                   @endforeach
                                   @foreach( $btn_linktwo_data as $btn_linktwo )
                                   <div class="form-group">
                                     <label for="">Button 02 Link</label>
                                     <input type="text" name="btn_linktwo[]" value="{{ $btn_linktwo -> btn_linktwo }}" class="form-control">
                                    </div>
                                    @endforeach
                                   </div>
                                   </div>
                               </div>
                               
                             </div>
                           </div>

                            <div class="form-group">
                             <label for="">Add Slide</label>
                             <button id="comet_update_slide" class="btn btn-primary ml-1">Add New Slide</button>
                           </div>
                           <div class="form-group">
                               <input type="submit" value="Update" class="btn btn-info" style="margin-left: 600px;">
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
