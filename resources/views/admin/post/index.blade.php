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
                        <li class="breadcrumb-item active">Posts</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->


        <div class="row">
            <div class="col-lg-12">
                @include('validate')
                <a class="btn btn-primary mb-1" data-toggle="modal" href="#post_modal">Add new post</a>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All post</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Featured Image</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_post as $data)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $data -> title }}</td>
                                        <td>
                                           @foreach( $data -> categoris as $category )
                                             {{ $category -> name }} |
                                           @endforeach
                                        </td>
                                        <td>{{ $data -> tags }}</td>
                                        <td>
                                            @if( !empty($data -> featured_image) )
                                            <img style="height: 60px; width: 60px;" src="{{ URL::to('/') }}/media/posts/{{ $data -> featured_image }}" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                        <td>
                                            @if($data -> status == 'Published')
                                                <span class="badge badge-success p-1">Published</span>
                                            @else
                                                <span class="badge badge-danger p-1">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($data -> status == 'Published')
                                                <a class="btn btn-sm btn-danger" href="{{ route('post.unpublished', $data -> id ) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-success" href="{{ route('post.published', $data -> id ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
                                            <a id="post_edit" data-toggle="modal" post_id="{{  $data -> id }}" class="btn  btn-warning btn-sm" href="#post_modal_update">Edit</a>

                                                <form style="display: inline;" action="{{ route('post.destroy', $data -> id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="post_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new post</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        @include('validate')
                        <form action="{{ route('post.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <input name="title" class="form-control" type="text" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="">Categoris</label>
                                <br>
                                @foreach( $all_cat as $cat )
                                <input type="checkbox" id="cn" value="{{ $cat -> id }}" name="categoris[]"><label for="cn"> {{ $cat -> name }} </label><br>
                                @endforeach
                            </div>

                             <div class="form-group">
                                <label style="margin-left: 3px; font-size: 40px; cursor: pointer;" for="fimage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                <input style="display: none;" name="fimg" class="" type="file" id="fimage">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="photo_show" src="" alt="">
                            </div>

                             <div class="form-group">
                                <textarea id="post_editor" name="content"></textarea>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-block btn-primary" type="submit" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div id="post_modal_update" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Post</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="post_edit_form" action="{{ route('category.update') }}"  method="POST">
                            @csrf

                            <div class="form-group">
                                <input name="title" class="form-control" type="text" placeholder="Name">
                                <input name="id" class="form-control" type="hidden" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <input name="content" class="form-control" type="text" placeholder="content">
                            </div>

                            <div class="form-group">
                                <img src="" alt="" style="height: 200px; width: 200px; border: 5px solid gray;">
                                <input name="fimg" class="form-control" type="hidden" placeholder="Featured_images">
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
