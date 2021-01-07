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


        <div class="row">
            <div class="col-lg-10">
                @include('validate')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Social Media Settings</h4>
                    </div>
                    <div class="card-body">
                       
                       @php
                         $social = $settings -> social;
                         $social_data = json_decode($social);
                       @endphp

                       <form action="{{ route('social.update') }}" method="POST">
                        @csrf
                           <div class="form-group">
                              <label for="">Facebook</label>
                              <input class="form-control" type="text" name="facebook" value="{{ $social_data -> facebook }}"> 
                           </div>
                           {{-- <div class="form-group">
                              <label for="">Twitter</label>
                              <input class="form-control" type="text" name="twitter" value="{{ $social_data -> twitter }}"> 
                           </div> --}}
                           <div class="form-group">
                              <label for="">LinkedIn</label>
                              <input class="form-control" type="text" name="linkedin" value="{{ $social_data -> linkedin }}"> 
                           </div>
                           <div class="form-group">
                              <label for="">Instagram</label>
                              <input class="form-control" type="text" name="instagram" value="{{ $social_data -> instagram }}"> 
                           </div>
                           <div class="form-group">
                              <label for="">Dribble</label>
                              <input class="form-control" type="text" name="dribble" value="{{ $social_data -> dribble }}"> 
                           </div>
                           <div class="form-group">
                               <input type="submit" value="Update" class="btn btn-info">
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
