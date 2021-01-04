@extends('fontend.layouts.app')

@section('main-content')

 <section>
      <div class="container">
        <div class="single-product-details">
          <div class="row">
            @foreach( $product as $products )
            <div class="col-md-6">
              <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-inside control-nav-dark">
                <ul class="slides">
                  <li>
                    <img src="{{ URL::to('/') }}/media/products/{{ $products -> image }}" alt="">
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
              <div class="title mt-0">
                <h2>{{ $products -> name }}<span class="red-dot"></span></h2>
                @foreach( $products -> categoris as $cat )
                <p class="m-0">{{ $cat -> name }}</p> .
                @endforeach
                 |
                @foreach( $products -> tags as $tag )
                <p class="m-0">{{ $tag -> name }}</p> .
                @endforeach
              </div>
              <div class="single-product-price">
                <div class="row">
                  <div class="col-xs-6">
                    <h3><del>{{ $products -> price }}</del><span>{{ $products -> price }}</span></h3>
                  </div>
                  <div class="col-xs-6 text-right"><span class="rating-stars">              <i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star"></i><span class="hidden-xs">(3 Reviews)</span></span>
                  </div>
                </div>
              </div>
              <div class="single-product-desc">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis repellat iste natus at impedit quo consequuntur, quam, vel saepe voluptatum minus temporibus excepturi aspernatur labore molestiae fugit tempora veritatis unde.</p>
              </div>
              <div class="single-product-add">
                <form action="#" class="inline-form">
                  <div class="input-group">
                    <input type="number" placeholder="QTY" value="1" min="1" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-color">Add to Cart<i class="ti-bag"></i></button></span>
                  </div>
                </form>
              </div>
              <div class="single-product-list">
                <ul>
                  <li><span>Sizes:</span> S, M, L, XL</li>
                  <li><span>Colors:</span> Blue, Red, Grey</li>
                  <li><span>Category:</span><a href="#">Blazers</a>
                  </li>
                  <li><span>Tags:</span><a href="#">Outfit</a>-<a href="#">Jeans</a>
                  </li>
                </ul>
              </div>
            </div>
            @endforeach
          </div>
          <!-- end of row-->
        </div>
        <div class="product-tabs">
          <ul role="tablist" class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#first-tab" role="tab" data-toggle="tab">Description</a>
            </li>
            <li role="presentation"><a href="#second-tab" role="tab" data-toggle="tab">Sizes</a>
            </li>
            <li role="presentation"><a href="#third-tab" role="tab" data-toggle="tab">Reviews (3)</a>
            </li>
          </ul>
          <div class="tab-content">
            <div id="first-tab" role="tabpanel" class="tab-pane active">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum hic doloribus dolore explicabo, a voluptate optio culpa, aut nulla voluptatem sit nam sed molestias adipisci! Eius nulla beatae, quidem quae. Praesentium eveniet ullam quos
                accusamus, ea nemo cupiditate. Nemo harum sit, necessitatibus voluptates, sapiente dolorum minima, placeat explicabo consequuntur at neque deserunt.</p>
              <p>Quidem illum, enim aut, minus nesciunt, distinctio inventore sunt autem numquam eveniet non asperiores unde! Corrupti modi minima doloremque, illum aperiam nemo.</p>
            </div>
            <div id="second-tab" role="tabpanel" class="tab-pane">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="upper">Size</th>
                    <th class="upper">Bust (CM)</th>
                    <th class="upper">Waist (CM)</th>
                    <th class="upper">Hips (CM)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>XS</td>
                    <td>78</td>
                    <td>60</td>
                    <td>83</td>
                  </tr>
                  <tr>
                    <td>S</td>
                    <td>80</td>
                    <td>62</td>
                    <td>86</td>
                  </tr>
                  <tr>
                    <td>M</td>
                    <td>88</td>
                    <td>65</td>
                    <td>88</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div id="third-tab" role="tabpanel" class="tab-pane">
              <div id="comments">
                <ul class="comments-list">
                  <li class="rating">
                    <h5 class="upper">Jesse Pinkman - <span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star"></i></span></h5><span class="comment-date">Posted on 29 September at 10:41</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo voluptatem quo sit. Sint fugit quidem totam similique suscipit animi veniam reiciendis, unde facere quia, optio, at ad possimus perferendis asperiores.</p>
                  </li>
                  <li class="rating">
                    <h5 class="upper">Rust Cohle - <span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star"></i></span></h5><span class="comment-date">Posted on 29 September at 10:41</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aspernatur vero dolorum asperiores ratione obcaecati atque quidem aliquid dicta illo, quod, similique suscipit maiores, aperiam expedita cum. Ut fugiat, dolores.</p>
                  </li>
                  <li class="rating">
                    <h5 class="upper">Arya Stark - <span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i></span></h5><span class="comment-date">Posted on 29 September at 10:41</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aspernatur vero dolorum asperiores ratione obcaecati atque quidem aliquid dicta illo, quod, similique suscipit maiores, aperiam expedita cum. Ut fugiat, dolores.</p>
                  </li>
                </ul>
              </div>
              <div id="respond">
                <h5 class="upper">Leave a rating</h5>
                <div class="comment-respond">
                  <form class="comment-form">
                    <div class="form-double">
                      <div class="form-group">
                        <input name="author" type="text" placeholder="Name" class="form-control">
                      </div>
                      <div class="form-group last">
                        <input name="email" type="text" placeholder="Email" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-select">
                        <select class="form-control">
                          <option value="" selected="selected">Chose a rating</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <textarea placeholder="Comment" class="form-control"></textarea>
                    </div>
                    <div class="form-submit text-right">
                      <button type="button" class="btn btn-color-out">Post Comment</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="related-products">
          <h5 class="upper">Related Products</h5>
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="shop-product">
                <div class="product-thumb">
                  <a href="#">
                    <img src="images/shop/1.jpg" alt="">
                  </a>
                </div>
                <div class="product-info">
                  <h4 class="upper"><a href="#">Premium Notch Blazer</a></h4><span>$79.99</span>
                  <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="shop-product">
                <div class="product-thumb">
                  <a href="#">
                    <img src="images/shop/2.jpg" alt="">
                  </a>
                </div>
                <div class="product-info">
                  <h4 class="upper"><a href="#">Premium Suit Blazer</a></h4><span>$199.99</span>
                  <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="shop-product">
                <div class="product-thumb">
                  <a href="#">
                    <img src="images/shop/3.jpg" alt="">
                  </a>
                </div>
                <div class="product-info">
                  <h4 class="upper"><a href="#">Vintage Sweatshirt</a></h4><span>$99.99</span>
                  <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="shop-product">
                <div class="product-thumb">
                  <a href="#">
                    <img src="images/shop/4.jpg" alt="">
                  </a>
                </div>
                <div class="product-info">
                  <h4 class="upper"><a href="#">Longline Jersey Jacket</a></h4><span>$19.99</span>
                  <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection