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
         $all_wwa = json_decode($servies -> wwa);
        @endphp
        <div class="row">
            <div class="col-lg-6">
                @include('validate')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Who We Are Section</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('wwa.store') }}" method="POST">
                        @csrf
                           <div class="form-group">
                               <label for="">Title</label>
                               <input type="text" value="{{ $all_wwa -> title }}" name="title" class="form-control" placeholder="Title">
                           </div>
                           <div class="form-group">
                               <label for="">Content</label>
                               <textarea rows="5" name="content" class="form-control">{{ $all_wwa -> content }}</textarea>
                           </div>
                           <div class="form-group">
                               <label for="">Service</label>
                               <br>
                               @foreach( $all_wwa -> service as $servies )
                               <input type="checkbox" checked value="web_design" name="service[]"> <label for="">{{ $servies }}</label><br>
                              {{--  <input type="checkbox" value="web_development" name="service[]"> <label for=""></label><br>
                               <input type="checkbox" value="wordpress_cus" name="service[]"> <label for="">Wordpress Customization</label><br>
                               <input type="checkbox" value="wordpress_dev" name="service[]"> <label for="">Wordpress Development</label> --}}
                               @endforeach
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
