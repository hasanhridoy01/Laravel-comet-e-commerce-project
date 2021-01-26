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
        @php
         $vision_json = json_decode($vision -> vision);
        @endphp
        <div class="row">
            <div class="col-lg-6">
                @include('validate')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vision</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('vision.store') }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="">Title</label>
                               <input type="text" value="{{ $vision_json -> title }}" name="title" class="form-control" placeholder="Title">
                           </div>
                           <div class="form-group">
                               <label for="">Content</label>
                               <textarea placeholder="Content" rows="5" name="content" class="form-control">{{ $vision_json -> content }}</textarea>
                           </div>
                           <div class="form-group">
                               <div class="card">
                                <div class="card-header" data-toggle="collapse" data-target="#col">
                                  <h4>Sub Heading</h4>
                                </div>
                                  <div id="col" class="collapse">
                                     <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Heading One</label>
                                            <input type="text" value="{{ $vision_json -> headingone }}" name="headingone" class="form-control" placeholder="Heading One">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Heading Two</label>
                                            <input type="text" value="{{ $vision_json -> headingtwo }}" name="headingtwo" class="form-control" placeholder="Heading Two">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Heading Three</label>
                                            <input type="text" value="{{ $vision_json -> headingthree }}" name="headingthree" class="form-control" placeholder="Heading Three">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Heading Four</label>
                                            <input type="text" value="{{ $vision_json -> headingfour }}" name="headingfour" class="form-control" placeholder="Heading Four">
                                          </div>
                                     </div>
                                  </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <input type="submit" class="btn btn-info" value="Add">
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
