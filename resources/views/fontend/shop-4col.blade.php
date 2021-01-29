@extends('fontend.layouts.app')

@section('main-content')

 <section class="page-title parallax">
      <div data-parallax="scroll" data-image-src="fontend/images/bg/19.jpg" class="parallax-bg"></div>
      <div class="parallax-overlay">
        <div class="centrize">
          <div class="v-center">
            <div class="container">
              <div class="title center">
                <h1 class="upper">Shop</h1>
                <h4>Free Delivery Worldwide.</h4>
                <hr>
              </div>
            </div>
            <!-- end of container-->
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="shop-menu ml-0 mr-0">
          <div class="row">
            <div class="col-sm-4">
              <h6 class="upper">Displaying 6 of 18 results</h6>
            </div>
            <div class="col-sm-4">
              <form action="{{ route('shop.search') }}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Search Product.." class="form-control">
              </form>
            </div>
            <div class="col-sm-4">
              <div class="form-select">
                <select name="type" class="form-control">
                  <option selected="selected" value="">Sort By</option>
                  <option value="">What's new</option>
                  <option value="">Price high to low</option>
                  <option value="">Price low to high</option>
                </select>
              </div>
            </div>
          </div>
          <!-- end of row-->
        </div>
        <div class="row">
          @foreach( $product as $products )
          <div class="col-md-3 col-sm-6">
            <div class="shop-product">
              <div class="product-thumb">
                <a href="#">
                  <img src="{{ URL::to('/') }}/media/products/{{ $products -> image }}" alt="">
                </a>
                <div class="product-overlay"><a href="#" class="btn btn-color-out btn-sm">Add To Cart<i class="ti-bag"></i></a>
                </div>
              </div>
              <div class="product-info">
                <h4 class="upper"><a href="#">{{ $products -> name }}</a></h4><span>${{ $products -> price }}</span>
                <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <!-- end of row-->
        <ul class="pagination">
          <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
          </li>
          <li class="active"><a href="#">1</a>
          </li>
          <li><a href="#">2</a>
          </li>
          <li><a href="#">3</a>
          </li>
          <li><a href="#">4</a>
          </li>
          <li><a href="#">5</a>
          </li>
          <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
          </li>
        </ul>
        <!-- end of pagination-->
      </div>
      <!-- end of container-->
    </section>

@endsection