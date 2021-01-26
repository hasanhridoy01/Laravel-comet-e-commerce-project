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
          $client_data = json_decode($client -> clients);
        @endphp
        <div class="row">
            <div class="col-lg-10">
                @include('validate')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Client Upload</h4>
                    </div>
                    <div class="card-body">
                       <form action="{{ route('client.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <h4 style="color: red;">Client 1 Image</h4>
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client_data -> client_name1 }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo1" value="{{ $client_data -> client_name1 }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage1"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage1" name="new-logo1">
                               <br>
                               <img id="client_image1" src="" alt="" style="max-height: 150px; max-width: 150px;">
                           </div>
                           <h4 style="color: yellow;">Client 2 Image</h4>
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client_data -> client_name2 }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo2" value="{{ $client_data -> client_name2 }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage2"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage2" name="new-logo2">
                               <br>
                               <img id="client_image2" src="" alt="" style="max-height: 150px; max-width: 150px;">
                           </div>
                           <h4 style="color: blue;">Client 3 Image</h4>
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client_data -> client_name3 }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo3" value="{{ $client_data -> client_name3 }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage3"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage3" name="new-logo3">
                               <br>
                               <img id="client_image3" src="" alt="" style="max-height: 150px; max-width: 150px;">
                           </div>
                           <h4 style="color: green;">Client 4 Image</h4>
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client_data -> client_name4 }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo4" value="{{ $client_data -> client_name4 }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage4"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage4" name="new-logo4">
                               <br>
                               <img id="client_image4" src="" alt="" style="max-height: 150px; max-width: 150px;">
                           </div>
                           <h4 style="color: gray;">Client 5 Image</h4>
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client_data -> client_name5 }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo5" value="{{ $client_data -> client_name5 }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage5"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage5" name="new-logo5">
                               <br>
                               <img id="client_image5" src="" alt="" style="max-height: 150px; max-width: 150px;">
                           </div>
                           <h4 style="color: orange;">Client 6 Image</h4>
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-light" src="{{ URL::to('/') }}/media/settings/client/{{ $client_data -> client_name6 }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="old_logo6" value="{{ $client_data -> client_name6 }}">
                                <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="cimage6"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <input style="display: none;" type="file" id="cimage6" name="new-logo6">
                               <br>
                               <img id="client_image6" src="" alt="" style="max-height: 150px; max-width: 150px;">
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
