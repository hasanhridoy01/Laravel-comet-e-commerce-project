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
                        <h4 class="card-title">CopyRight Update</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('copyright.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <div class="form-group">
                              <label for="">CopyRight</label>
                              <input class="form-control" type="text" name="copyright" value="{{ $copyright -> crt }}"> 
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
