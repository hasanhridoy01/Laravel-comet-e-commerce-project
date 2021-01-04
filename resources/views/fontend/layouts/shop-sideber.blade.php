 <div class="col-md-3 hidden-sm hidden-xs">
          <div class="sidebar">
            <div class="widget">
              <h6 class="upper">Categories</h6>
              <ul class="nav">
                @foreach( $all_cat as $cats  )
                <li><a href="{{ route('category.product', $cats -> slug) }}">{{ $cats -> name }}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- end of widget        -->
            <div class="widget">
              <h6 class="upper">Trending Products</h6>
              <ul class="nav product-list">
                @foreach( $all_product as $product )
                <li>
                  <div class="product-thumbnail">
                    <img src="{{ URL::to('/') }}/media/products/{{ $product -> image }}" alt="">
                  </div>
                  <div class="product-summary"><a href="{{ route('product', $product -> slug) }}">{{ $product -> name }}</a><span>${{ $product -> price }}</span> | <span>
                    @foreach( $product -> tags as $tag )
                     {{ $tag -> name }} .
                    @endforeach
                  </span> | <span>
                    @foreach( $product -> categoris as $cat )
                     {{ $cat -> name }} .
                    @endforeach
                  </span>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- end of widget          -->
            <div class="widget">
              <h6 class="upper">Search Shop</h6>
              <form action="{{ route('product.search') }}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Search.." class="form-control">
              </form>
            </div>
            <!-- end of widget        -->
            <div class="widget">
              <h6 class="upper">Popular Tags</h6>
              <div class="tags clearfix">
                @foreach( $all_tag as $tags )
                <a href="{{ route('tag.product', $tags -> slug) }}">{{ $tags -> name }}</a>
                @endforeach
              </div>
            </div>
            <!-- end of widget      -->
          </div>
          <!-- end of sidebar-->
        </div>