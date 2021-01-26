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
                <a class="btn btn-primary mb-1" data-toggle="modal" href="#slidercategory_modal">Add new SliderCategory</a>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All SliderCategory</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SliderCategory Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach( $all_data as $slidercategory )
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $slidercategory -> name }}</td>
                                        <td>{{ $slidercategory -> slug }}</td>
                                        <td>
                                        <a id="category_edit" data-toggle="modal" edit_id="" class="btn  btn-warning btn-sm" href="#slidercategory_modal_update">Edit</a>
                                        <form style="display: inline;" action="{{ route('slider-category.destroy', $slidercategory -> id) }}" method="POST">
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

        <div id="slidercategory_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new SliderCategory</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('slider-category.store') }}"  method="POST">
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



        <div id="slidercategory_modal_update" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update SliderCategory</h4>
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
