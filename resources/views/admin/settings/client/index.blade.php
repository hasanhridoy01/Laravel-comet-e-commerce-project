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
                        <h4 class="card-title">Logo Upload</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('client.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client -> clients }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo" value="{{ $client -> clients }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage" name="new-logo">
                               <br>
                               <img id="client_image" src="" alt="" style="max-height: 150px; max-width: 150px;">
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
