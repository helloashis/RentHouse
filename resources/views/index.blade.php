@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <!-- ====== Form Block Content======= -->
    <div class="form-block-content default-template-gradient">
        <div class="form-area form-four">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('search') }}" method="GET" class="advance_search_query">
                            <div class="form-bg border-radius">
                                <div class="form-content">
                                    <div class="form-group">
                                        <label>Living area</label>
                                        <input type="text" name="city" placeholder="Where do you want to live?">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="type">
                                            <option value="all">All</option>
                                            @foreach ($category as $cat)
                                            <option value="{{ $cat->slug }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" name="min_price" placeholder="min">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <input type="number" name="max_price" placeholder="max">
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                       <button type="submit" class=" button nevy-button">Check Availability</button>
                                    </div><!-- /.form-group -->
                                </div><!-- /.form-content -->
                            </div><!-- /.form-bg -->
                        </form> <!-- /.advance_search_query -->
                        <h4 class="form-bottom-title"><span>Good Service is our passion</span></h4>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.form-area -->
    </div><!-- /.form-block-content -->

    <!-- ====== Category Area ====== -->
    <div class="category-menu four default-template-gradient">
        <div class="container-fluid pd-zero">
            <div class="row">
                <div class="col-md-12">
                    <div class="category-menu-content">
                        <div class="category-title" style="display: block">
                            <h3><span>We Provide</span></h3>
                        </div><!-- /.category-titel -->
                        <div class="category-slider bg-white-smoke owl-carousel owl owl-theme">
                            @foreach ($category as $cat)


                            <div class="item">
                                <div class="category-list style-one">
                                    <a href="{{ route('category-wise-post', $cat->slug) }}"><img src="{{ $cat->icon }}" alt="{{ $cat->title }}" />
                                    <h4>{{ $cat->title }}</h4></a>
                                </div><!-- /.category-list -->
                            </div><!-- /.item -->

                            @endforeach
                        </div><!-- /.category-slider -->
                    </div><!-- /.category-menu-content -->
                </div> <!-- category-menu -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.catagory-menu -->

    <!-- ====== About Us Area ====== -->
    <div class="aboutus-area four">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content-one">
                        <h2 class="title">About Us</h2>
                        <h5 class="sub-title">Welcome to our House Rent Company</h5>
                    </div><!-- /.heading-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-md-2">
                    <div class="tab-list">
                        <ul class="nav nav-tabs four about-tab hidden-xs hidden-sm" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">About Company</a>
                            </li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Terms &amp; Condition</a>
                            </li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Our specialty</a>
                            </li>
                            <li role="presentation"><a href="#policy" aria-controls="messages" role="tab" data-toggle="tab">Our Policy</a>
                            </li>
                        </ul>
                        <form class="hidden-md hidden-lg">
                            <select class="about-mobile">
                                <option value='0'>About Company</option>
                                <option value='1'>Terms &amp; Condition</option>
                                <option value='2'>Our specialty</option>
                                <option value='3'>Our Policy</option>
                            </select>
                        </form>
                    </div> <!-- /.tab-list -->
                </div> <!-- /.col-md-2 -->

                <div class="col-md-10">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active row" id="home">
                            <div class="col-md-6">
                                <div class="text-content">
                                    <p class="text-justify">
                                        {!! $about->content !!}
                                    </p>

                                </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="image-content">
                                    <img src="{{ $about->thumbnail }}" alt="about Photos" />
                                </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                        </div> <!-- /.home -->

                        <div role="tabpanel" class="tab-pane fade row" id="profile">
                            <div class="col-md-6">
                                <div class="text-content">
                                    <p>{!! $terms->content !!}</p>

                                </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <div class="image-content">
                                    <img src="{{ $terms->thumbnail }}" alt="{{ $terms->thumbnail }}" />
                                </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                        </div> <!-- /.profile -->

                        <div role="tabpanel" class="tab-pane fade row" id="messages">
                            <div class="col-md-6">
                                <div class="text-content">
                                    <p>{!! $specialty->content !!}</p>

                                </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                              <div class="image-content">
                                  <img src="{{ $specialty->thumbnail }}" alt="{{ $specialty->thumbnail }}" />
                              </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                         </div> <!-- /.messages -->

                        <div role="tabpanel" class="tab-pane fade row" id="policy">
                            <div class="col-md-6">
                                <div class="text-content">
                                    <p>{!! $policy->content !!}</p>

                                </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                              <div class="image-content">
                                  <img src="{{ $policy->thumbnail }}" alt="{{ $policy->thumbnail }}" />
                              </div><!-- /.text-content -->
                            </div><!-- /.col-md-6 -->
                         </div> <!-- /.messages -->
                    </div> <!-- /.tab-content -->
                 </div><!-- /.col-md-10 -->
            </div><!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.aboutus-area -->

      <!-- ====== Apartments Area ======= -->
      <div class="apartments-area bg-gray-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content-one border">
                        <h2 class="title default-text-gradient">Rooms &amp; Apartments</h2>
                        <h5 class="sub-title default-text-gradient">Find Your Rooms, for your abaility</h5>
                    </div><!-- /.Apartments-heading-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->

            <div class="row">
                @if (count($posts)>0)
                    @foreach ($posts as $item)
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="apartments-content" >
                                <div class="image-content">
                                    <a href="{{ route('single-post', $item->slug) }}">
                                        <img src="{{ $item->images_one }}" alt="{{ $item->title }}" />
                                    </a>
                                </div><!-- /.image-content -->

                                <div class="text-content">
                                    <div class="top-content">
                                        <h3><a href="{{ route('single-post', $item->slug) }}">{{ $item->title }}</a></h3>
                                        <span>
                                            <i class="fa fa-map-marker"></i>
                                            {{ $item->address }}, {{ $item->getcity->title }}, {{ $item->getdist->title }}
                                        </span>

                                    </div><!-- /.top-content -->
                                    <div class="bottom-content clearfix">

                                        <div class="meta-bed-room" style="text-transform: capitalize">
                                            <i class="fa fa-home"></i>{{ $item->get_type->title }}
                                        </div>

                                        <div class="meta-bed-room">
                                            <i class="fa fa-bed"></i> {{ $item->rooms }} Bedrooms
                                        </div>
                                        <div class="meta-bath-room">
                                            <i class="fa fa-bath"></i>{{ $item->bath }} Bath
                                        </div>
                                        <span class="clearfix"></span>
                                        <div class="rent-price pull-left">
                                            &#2547; {{ $item->price }} Tk
                                        </div>
                                        <div class="share-meta dropup pull-right">
                                            <ul>
                                                <li class="dropup">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.bottom-content -->
                                </div><!-- /.text-content -->
                            </div><!-- /.partments-content -->
                        </div><!-- /.col-md-4 -->

                    @endforeach
                @else
                    <div class="col-md-12">
                        <h4 class="alert alert-danger text-center">No more posts</h4>
                    </div>
                @endif


            </div><!-- /.row -->
            @if (count($posts)>0)
                <a href="{{ route('all-post') }}" class="button nevy-button">All Apartments</a>
            @else

            @endif
        </div><!-- /.container -->
    </div><!-- /.Apartments-area-->

    <!-- ====== Gallery Area ======= -->
    <div class="gallery-area four">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="gallery-left-content">
                        <h2>Our <br/>Photo<br/> Gallery</h2>
                        <a href="gallery.html" class="button nevy-button">All Photos &amp; Video</a>
                    </div><!-- /.right-content -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-8 col-sm-8">
                    <div class="gallery-slider owl-carousel owl-theme">
                        @foreach ($posts as $image)

                            <div class="item">
                                <img src="{{ $image->images_one }}" width="100%" height="200px" alt="{{ $image->images_one }}" />
                            </div><!-- /.item -->

                        @endforeach

                        </div><!-- /.owl-demo -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.gallery-area -->

    <!-- ====== Call To Action ======= -->
    <div class="call-to-action default-template-gradient">
        <div class="container">
            <div class="row tb">
                <div class="col-md-6 col-sm-6 tb-cell">
                    <div class="contact-left-content">
                        <h3>Do you want to Rent your House</h3>
                        <h4>Call us and list your property here</h4>
                    </div><!-- /.contact-left-content -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 tb-cell">
                    <div class="contact-right-content">
                        <h4><a href="#">+880123654987<span>hello@gmail.com</span></a></h4>
                        <a href="#" class="button">Contact us</a>
                    </div><!-- /.contact-right-content -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.contact-area -->

    <!-- ====== Contact Area ====== -->
    <div class="contact-area">
        <div class="container-large-device">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-content-two available">
                            <h2 class="title">We Are Available<br/> For You 24/7</h2>
                            <h5 class="sub-title">Our online support service is always 24 Hours</h5>
                        </div><!-- /.testimonial-heading-content -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-7">
                        <div class="map-left-content">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1611617.809151248!2d90.1494988!3d23.9535742!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3750554e52cb7077%3A0xf183012d4710cc19!2sSylhet%20International%20University!5e1!3m2!1sen!2sbd!4v1632984391756!5m2!1sen!2sbd" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div><!-- /.mapl-left-content -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="map-right-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-address-book"></i>Address</h4>
                                        <p>112/B - Road 121, Bagbari, Sylhet.</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-envelope"></i>Mail</h4>
                                        <p>info@houserent.com help@houserent.com</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-phone-square"></i>Call</h4>
                                        <p>+99 0215469875 <br/>666 35874692050</p>
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="contact">
                                        <h4><i class="fa fa-user-circle"></i>Social account</h4>
                                        <div class="social-icon">
                                            <a target="_blank" href="{{ $url->fb_ulr }}"><i class="fa fa-facebook"></i></a>
                                            <a target="_blank" href="{{ $url->twt_url }}"><i class="fa fa-twitter"></i></a>
                                            <a target="_blank" href="{{ $url->inst_url }}"><i class="fa fa-instagram"></i></a>
                                            <a target="_blank" href="{{ $url->gle_url }}"><i class="fa fa-google-plus"></i></a>
                                        </div><!-- /.Social-icon -->
                                    </div><!-- /.contact -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </div><!-- /.map-right-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div><!-- /.contact-area -->
@endsection
