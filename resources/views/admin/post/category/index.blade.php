@extends('layouts.app')

@section('main-content')

<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
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
                <a class="btn btn-primary mb-1" data-toggle="modal" href="#category_modal">Add new category</a>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($all_cat as $data)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $data -> name }}</td>
                                        <td>{{ $data -> slug }}</td>
                                        <td>
                                            @if($data -> status == 'Published')
                                                <span class="badge badge-success p-1">Published</span>
                                            @else
                                                <span class="badge badge-danger p-1">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($data -> status == 'Published')
                                                <a class="btn btn-sm btn-danger" href="{{ route('category.unpublished', $data -> id ) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-success" href="{{ route('category.published', $data -> id ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
                                            <a id="category_edit" data-toggle="modal" edit_id="{{  $data -> id }}" class="btn  btn-warning btn-sm" href="#category_modal_update">Edit</a>

                                                <form style="display: inline;" action="{{ route('post-category.destroy', $data -> id ) }}" method="POST">
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
