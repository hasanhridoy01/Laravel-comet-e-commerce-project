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
            <div class="col-lg-12">
                @include('validate')
                <a class="btn btn-primary mb-1" data-toggle="modal" href="#product_add_modal">Add new product</a>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>product Name</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Tag</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach( $all_product as $product )
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $product -> name }}</td>
                                        <td>{{ $product -> slug }}</td>
                                        <td>
                                            @foreach( $product -> categoris as $category )
                                             {{ $category -> name }} |
                                           @endforeach
                                        </td>
                                        <td>
                                            @foreach( $product -> tags as $tag )
                                             {{ $tag -> name }} |
                                            @endforeach
                                        </td>
                                        <td>
                                            <img style="height: 60px; width: 60px; object-fit: cover;" src="{{ URL::to('/') }}/media/products/{{ $product -> image }}" alt="">
                                        </td>
                                        <td>{{ $product -> brand }}</td>
                                        <td>{{ $product -> price }}</td>
                                        <td>
                                            @if($product -> status == 'Published')
                                                <span class="badge badge-success p-1">Published</span>
                                            @else
                                                <span class="badge badge-danger p-1">Unpublished</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product -> status == 'Published')
                                                <a class="btn btn-sm btn-danger" href="{{ route('product.unpublished', $product -> id ) }}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            @else
                                                <a class="btn btn-sm btn-success" href="{{ route('product.published', $product -> id ) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endif
                                            <a id="product_edit" product_id="{{ $product -> id }}" class="btn  btn-warning btn-sm" href="">Edit</a>

                                            <form style="display: inline;" action="{{ route('product.destroy', $product -> id) }}" method="POST">
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

        <div id="product_add_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Product</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                            </div>
                             <div class="form-group">
                                <label for="">Categoris</label>
                                <hr>
                                @foreach( $all_cat as $cat )
                                <input type="checkbox" id="cn" value="{{ $cat -> id }}" name="categoris[]"><label for="cn"> {{ $cat -> name }} </label><br>
                                @endforeach
                            </div>
                             <div class="form-group">
                                <label for="">Tags</label>
                                <hr>
                                @foreach( $all_tag as $tag )
                                <input type="checkbox" id="tg" value="{{ $tag -> id }}" name="tags[]"><label for="tg"> {{ $tag -> name }} </label><br>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 3px; font-size: 40px; cursor: pointer;" for="image"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                <input style="display: none;" name="fimg" class="" type="file" id="image">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="photo_show_product" src="" alt="">
                            </div>
                            <div class="form-group">
                                <input name="brand" class="form-control" type="text" placeholder="Brand">
                            </div>
                            <div class="form-group">
                                <input name="price" class="form-control" type="text" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-primary" type="submit" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div id="tag_modal_update" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update product</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="product_update_form" action="{{ route('product.update') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="Name">
                                <input name="id" class="form-control" type="hidden">
                            </div>
                             <div class="form-group">
                                <label for="">Categoris</label>
                                <hr>

                                <div class="cl"></div>
                                
                            </div>
                             <div class="form-group">
                                <label for="">Tags</label>
                                <hr>
                                
                                <div class="tg"></div>
                                
                            </div>
                            <div class="form-group">
                                <label style="margin-left: 3px; font-size: 40px; cursor: pointer;" for="upmage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                                <input style="display: none;" name="upimg" class="" type="file" id="upmage">
                                <img style="max-width:200px; max-height: 200px; display: block;" id="photo_update_product" src="" alt="">
                            </div>
                            <div class="form-group">
                                <input name="brand" class="form-control" type="text" placeholder="Brand">
                            </div>
                            <div class="form-group">
                                <input name="price" class="form-control" type="text" placeholder="Price">
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
