@extends('fontend.layouts.app')

@section('main-content')

    @php
     $data = App\Models\HomePage::find(1);
     $client_data = App\Models\Settings::find(1);
     $wwa_json = json_decode($data -> wwa);
     $vision_json = json_decode($data -> vision);
     $client_json = json_decode($client_data -> clients);
    @endphp
    @php
      $sliders = App\Models\Slider::latest() -> get();
      $slider_json = json_decode($sliders);
    @endphp

    <!-- Home Section-->
    <section id="home">
      <!-- Home Slider-->
      <div id="home-slider" class="flexslider">
        <ul class="slides">
          @foreach( $slider_json as $slide )
          <li>
            <img src="{{ URL::to('/') }}/media/slider/img/{{ $slide -> sliderimage }}" alt="">
            <div class="slide-wrap">
              <div class="slide-content">
                <div class="container">
                  @php
                   $title_data = json_decode($slide -> title);
                   $subtitle_data = json_decode($slide -> subtitle);
                   $btn_title1_data = json_decode($slide -> btn_title1);
                   $subtitle_data = json_decode($slide -> subtitle);
                  @endphp
                  @foreach( $title_data as $title )
                  <h1>{{ $title -> title }}<span class="red-dot"></span></h1>
                  @endforeach
                  @foreach( $subtitle_data as $subtitle )
                  <h6>{{ $subtitle -> subtitle }}</h6>
                  @endforeach
                  <p><a href="#" class="btn btn-light-out">Read More</a><a href="#" class="btn btn-color btn-full">Services</a>
                  </p>
                </div>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
      <!-- End Home Slider-->
    </section>
    <!-- End Home Section-->
    <section id="about">
      <div class="container">
        <div class="title center">
          <h4 class="upper">We are driven by creative.</h4>
          <h2>{{  $wwa_json -> title }}<span class="red-dot"></span></h2>
          <hr>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <p class="lead-text serif text-center">{!! htmlspecialchars_decode($wwa_json -> content) !!}</p>
            </div>
          </div>
          <!-- end of row-->
        </div>
        <!-- end of section content-->
      </div>
      <!-- end of container-->
    </section>
    <section class="p-0 b-0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-4 img-side img-left mb-0">
            <div class="img-holder">
              <img src="fontend/images/bg/33.jpg" alt="" class="bg-img">
              <div class="centrize">
                <div class="v-center">
                  <div class="title txt-xs-center">
                    <h4 class="upper">This is what we love to do.</h4>
                    <h3>Expertise<span class="red-dot"></span></h3>
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of side background image-->
          {{-- @foreach( $wwa_json -> service as $service ) --}}
          @foreach( $wwa_json -> service as $service )
          <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
            <div class="services">
              <div class="row">
                <div class="col-sm-6 border-bottom border-right">
                  <div class="service"><i class="icon-focus"></i><span class="back-icon"><i class="icon-focus"></i></span>
                    <h4>{{ $service }}</h4>
                    <hr>
                    <p class="alt-paragraph">Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.</p>
                  </div>
                  <!-- end of service-->
                </div>
                {{-- <div class="col-sm-6 border-bottom">
                  <div class="service"><i class="icon-layers"></i><span class="back-icon"><i class="icon-layers"></i></span>
                    <h4>Interactive</h4>
                    <hr>
                    <p class="alt-paragraph">Commodi totam esse quis alias, nihil voluptas repellat magni, id fuga perspiciatis, ut quia beatae, accus.</p>
                  </div>
                  
                </div> --}}
                {{-- <div class="col-sm-6 border-bottom border-right">
                  <div class="service"><i class="icon-mobile"></i><span class="back-icon"><i class="icon-mobile"></i></span>
                    <h4>Production</h4>
                    <hr>
                    <p class="alt-paragraph">Doloribus qui asperiores nisi placeat volup eum, nemo est, praesentium fuga alias sit quis atque accus.</p>
                  </div>
                  
                </div> --}}
                <div class="col-sm-6 border-bottom">
                  <div class="service"><i class="icon-globe"></i><span class="back-icon"><i class="icon-globe"></i></span>
                    <h4>{{ $service }}</h4>
                    <hr>
                    <p class="alt-paragraph">Aliquid repellat facilis quis. Sequi excepturi quis dolorem eligendi deleniti fuga rerum itaque.</p>
                  </div>
                  <!-- end of service-->
                </div>
              </div>
            </div>
            <!-- end of row-->
          </div>
          @endforeach
        </div>
        <!-- end of row -->
      </div>
    </section>
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-sm-4 img-side img-right">
            <div class="img-holder">
              <img src="fontend/images/bg/10.jpg" alt="" class="bg-img">
            </div>
          </div>
          <!-- end of side background image-->
        </div>
        <!-- end of row-->
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-8">
            <div class="title">
              <h4 class="upper">Not just code.</h4>
              <h3>{{ $vision_json -> title }}<span class="red-dot"></span></h3>
              <hr>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="text-box">
                  <h4 class="upper small-heading">{{ $vision_json -> headingone }}</h4>
                  <p>{!! htmlspecialchars_decode($vision_json -> content) !!}.</p>
                </div>
                <!-- end of text box-->
              </div>
              <div class="col-sm-6">
                <div class="text-box">
                  <h4 class="upper small-heading">{{ $vision_json -> headingtwo }}</h4>
                  <p>{!! htmlspecialchars_decode($vision_json -> content) !!}</p>
                </div>
                <!-- end of text box-->
              </div>
              <div class="col-sm-6">
                <div class="text-box">
                  <h4 class="upper small-heading">{{ $vision_json -> headingthree }}</h4>
                  <p>{!! htmlspecialchars_decode($vision_json -> content) !!}</p>
                </div>
                <!-- end of text box-->
              </div>
              <div class="col-sm-6">
                <div class="text-box">
                  <h4 class="upper small-heading">{{ $vision_json -> headingfour }}</h4>
                  <p>{!! htmlspecialchars_decode($vision_json -> content) !!}</p>
                </div>
                <!-- end of text box-->
              </div>
            </div>
            <!-- end of row              -->
          </div>
        </div>
        <!-- end of row-->
      </div>
      <!-- end of container-->
    </section>
    <section id="portfolio" class="pb-0">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="title m-0 txt-xs-center txt-sm-center">
              <h2 class="upper">Selected Works<span class="red-dot"></span></h2>
              <hr>
            </div>
          </div>
          <div class="col-md-6">
            <ul id="filters" class="no-fix mt-25">
              <li data-filter="*" class="active">All</li>
              <li data-filter=".branding">Branding</li>
              <li data-filter=".graphic">Graphic</li>
              <li data-filter=".printing">Printing</li>
              <li data-filter=".video">Video</li>
            </ul>
            <!-- end of portfolio filters-->
          </div>
        </div>
        <!-- end of row-->
      </div>
      <div class="section-content pb-0">
        <div id="works" class="four-col wide mt-50">
          <div class="work-item branding video">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/1.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Neleman Cava</h3>
                      <p>Branding, Video</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item graphic printing">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/7.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Sweet Lane</h3>
                      <p>Graphic, Printing</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item printing branding">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/6.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Jeff Burger</h3>
                      <p>Printing, Branding</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item video graphic">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/9.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Juice Meds</h3>
                      <p>Video, Graphic</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item branding graphic">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/11.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Prisma</h3>
                      <p>Graphic, Branding</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item printing graphic">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/10.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Delirio Tropical</h3>
                      <p>Printing, Graphic</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item printing branding">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/8.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Amendoas</h3>
                      <p>Printing, Branding</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="work-item graphic video">
            <div class="work-detail">
              <a href="portfolio-single-1.html">
                <img src="fontend/images/portfolio/3.jpg" alt="">
                <div class="work-info">
                  <div class="centrize">
                    <div class="v-center">
                      <h3>Hnina</h3>
                      <p>Graphic, Video</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- end of portfolio grid-->
      </div>
    </section>
    <section>
      <div class="container">
        <div class="title center">
          <h4 class="upper">Some of the best.</h4>
          <h3>Our Clients<span class="red-dot"></span></h3>
          <hr>
        </div>
        <div class="section-content">
          <div class="boxes clients">
            <div class="row">
              <div class="col-sm-4 col-xs-6 border-right border-bottom">
                <img src="{{ URL::to('/') }}/media/settings/client/{{ $client_json -> client_name1 }}" alt="" data-animated="true" class="client-image">
              </div>
              <div class="col-sm-4 col-xs-6 border-right border-bottom">
                <img src="{{ URL::to('/') }}/media/settings/client/{{ $client_json -> client_name2 }}" alt="" data-animated="true" data-delay="500" class="client-image">
              </div>
              <div class="col-sm-4 col-xs-6 border-bottom">
                <img src="{{ URL::to('/') }}/media/settings/client/{{ $client_json -> client_name3 }}" alt="" data-animated="true" data-delay="1000" class="client-image">
              </div>
              <div class="col-sm-4 col-xs-6 border-right">
                <img src="{{ URL::to('/') }}/media/settings/client/{{ $client_json -> client_name4 }}" alt="" data-animated="true" class="client-image">
              </div>
              <div class="col-sm-4 col-xs-6 border-right">
                <img src="{{ URL::to('/') }}/media/settings/client/{{ $client_json -> client_name5 }}" alt="" data-animated="true" data-delay="500" class="client-image">
              </div>
              <div class="col-sm-4 col-xs-6">
                <img src="{{ URL::to('/') }}/media/settings/client/{{ $client_json -> client_name6 }}" alt="" data-animated="true" data-delay="1000" class="client-image">
              </div>
            </div>
            <!-- end of row-->
          </div>
        </div>
        <!-- end of section content-->
      </div>
    </section>
    <section class="parallax">
      <div data-parallax="scroll" data-image-src="fontend/images/bg/7.jpg" class="parallax-bg"></div>
      <div class="parallax-overlay pb-50 pt-50">
        <div class="container">
          <div class="title center">
            <h3>What They Say<span class="red-dot"></span></h3>
            <hr>
          </div>
          <div class="section-content">
            <div id="testimonials-slider" data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-outside">
              <ul class="slides">
                <li>
                  <blockquote>
                    <p>"Blanditiis impedit omnis excepturi rem dolores! Ab consequuntur reiciendis eaque atque."</p>
                    <footer>Jon Snow - Google Inc.</footer>
                  </blockquote>
                </li>
                <li>
                  <blockquote>
                    <p>"Dolorem natus, sint. Enim molestias expedita laboriosam perferendis possimus facere nostrum laudantium vero."</p>
                    <footer>Daenerys Targarien - Apple Inc.</footer>
                  </blockquote>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end of container-->
      </div>
    </section>
    <section>
      <div class="container">
        <div class="title center">
          <h4 class="upper">We have a few tips for you.</h4>
          <h2>The Blog<span class="red-dot"></span></h2>
          <hr>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">

              @php
               $all_post = App\Models\Post::latest() -> get();
              @endphp
              @foreach( $all_post as $posts )
              <div class="blog-post">
                <div class="post-body">
                  <h3 class="serif"><a href="#">{{ $posts -> title }}</a></h3>
                  <hr>
                  <p class="serif"> {!! htmlspecialchars_decode($posts -> content) !!} [...]</p>
                  <div class="post-info upper"><a href="#">Read More</a><span class="pull-right black-text">November 16, 2015</span>
                  </div>
                </div>
                <!-- end of blog post-->
              </div>
              @endforeach
            </div>
          </div>
          <!-- end of row-->
          <div class="clearfix"></div>
          <div class="mt-25">
            <p class="text-center"><a href="#" class="btn btn-color-out">View Full Blog          </a>
            </p>
          </div>
        </div>
        <!-- end of container-->
      </div>
    </section>


@endsection