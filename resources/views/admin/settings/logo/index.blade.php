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
                       <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                           <div class="form-group">
                               <img style="max-width: 150px; max-width: 150px;" class="bg-dark" src="{{ URL::to('/') }}/media/settings/logo/{{ $logo -> logo_name }}" alt="">
                               <br>
                               <br>
                               <input type="hidden" name="oldlogo" value="{{ $logo -> logo_name }}">
                               <input style="display: none;" type="file" id="limage" name="new-logo">
                               <label style="margin-left: 3px; font-size: 45px; cursor: pointer;" for="limage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                               <br>
                               <img id="logo_image" src="" alt="" style="max-height: 150px; max-width: 150px;">
                           </div>
                           <div class="form-group">
                              <label for="">Logo Width</label>
                              <input class="form-control" type="text" name="logo_width" value="{{ $logo -> logo_width }}"> 
                           </div>
                           <div class="form-group">
                               <input type="submit" value="Update" class="btn btn-info">
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="category_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new category</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('post-category.store') }}"  method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-primary" type="submit" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div id="category_modal_update" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update category</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.update') }}"  method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                                <input name="id" class="form-control" type="hidden" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-primary" type="submit" value="Update">
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
