@extends('layouts.app')
@section('title', 'Post Details')
@section('content')


<!-- ====== Breadcrumbs Area====== -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <span class="first-item">
                    <a href="{{ url('/') }}">Home</a></span>
                    <span class="separator">&gt;</span>
                    <span class="last-item">Post Details</span>
                    <span class="separator">&gt;</span>
                    <span class="last-item">{{ $post->title }}</span>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.breadcrumbs-area -->
<!-- ====== Single post Area====== -->
<div class="apartment-single-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="corousel-gallery-content">
                    <div class="gallery">
                        <div class="full-view owl-carousel owl-new">
                            <a class="item image-pop-up" href="{{ asset('').$post->images_one }}">
                                <img src="{{ asset('').$post->images_one }}" alt="{{ $post->images_one }}">
                            </a>
                            <a class="item image-pop-up" href="{{ asset('').$post->images_two }}">
                                <img src="{{ asset('').$post->images_two }}" alt="{{ $post->images_two }}">
                            </a>
                            <a class="item image-pop-up" href="{{ asset('').$post->images_three }}">
                                <img src="{{ asset('').$post->images_three }}" alt="{{ $post->images_three }}">
                            </a>
                            <a class="item image-pop-up" href="{{ asset('').$post->images_four }}">
                                <img src="{{ asset('').$post->images_four }}" alt="{{ $post->images_four }}">
                            </a>
                            <a class="item image-pop-up" href="{{ asset('').$post->images_five }}">
                                <img src="{{ asset('').$post->images_five }}" alt="{{ $post->images_five }}">
                            </a>
                        </div>
                    </div> <!-- /.gallery-two -->
                </div> <!-- /.corousel-gallery-content -->

                <div class="family-apartment-content mobile-extend">
                    <div class="tb">
                        <div class="tb-cell">
                            <h3 class="apartment-title">{{ $post->title }}</h3>
                        </div><!-- /.tb-cell -->
                        <div class="tb-cell">
                            <p class="pull-right rent">Rent/Month: &#2547; {{ $post->price }} Tk</p>
                        </div><!-- /.tb-cell -->
                    </div><!-- /.tb -->


                    <div class="price-details">
                        <h3>Apartment Details-</h3>
                        <ul>
                            <li><span>Apartment For: </span> {{ $post->get_type->title }} </li>
                            <li><span>Address  &amp; Area :</span> {{ $post->address }}, {{ $post->getcity->name }}, {{ $post->getdist->name }}</li>

                            <li><span>Available :</span> {{ date('d M Y', strtotime($post->available))  }}</li>
                            <li><span>Floor :</span> {{ $post->floore }}</li>
                            <li><span>Room :</span> {{ $post->rooms }}</li>
                            <li><span>Facilities :</span> {{ $post->description }}</li>
                            <li><span>Additional Facilities :</span> {{ $post->features }} </li>

                        </ul>
                    </div><!-- /.Property -->

                    <div class="price-details">
                        <h3>Owner Details-</h3>
                        <ul>
                            <li><span>Owner Nome: </span> {{ $post->getuser->name }} </li>
                            <li><span>Contact :</span> <a href="callto:{{ $post->getuser->phone }}">{{ $post->getuser->phone }}</a></li>

                        </ul>
                    </div><!-- /.Property -->

              </div><!-- /.family-apartment-content -->
              <div class="hidden-md hidden-lg text-center extend-btn">
                  <span class="extend-icon">
                      <i class="fa fa-angle-down"></i>
                  </span>
              </div>
          </div> <!-- /.col-md-8 -->

          <!--
            <div class="col-md-4">
              <div class="apartment-sidebar">
                  <div class="widget_rental_search clerafix">
                      <div class="form-border gradient-border">
                          <form action="booking.html" method="get" class="advance_search_query booking-form">
                              <div class="form-bg seven">
                                  <div class="form-content">
                                      <h2 class="form-title">Book This Apartment</h2>
                                      <div class="form-group">
                                         <label>Full Name</label>
                                         <input type="text" name="FirstName" placeholder="Full name">
                                      </div>
                                      <div class="form-group">
                                          <label>Phone Number</label>
                                          <input type="tel" name="phone number" placeholder="+99(99)9999-9999">
                                      </div>
                                      <div class="form-group">
                                          <label>Email Address</label>
                                          <input type="email" name="Email" placeholder="example@domain.com">
                                      </div>
                                      <div class="form-group">
                                          <label>Family Member</label>
                                          <input type="number" step="1" min="1" max="100" name="quantity" value="1" title="Qty" size="4" class="input-text">
                                      </div>
                                      <div class="form-group">
                                          <label>Children</label>
                                          <input type="number" step="1" min="1" max="100" name="quantity" value="1" title="Qty" size="4" class="input-text">
                                      </div>
                                      <div class="form-group">
                                          <label>Your Message</label>
                                          <textarea name="message" placeholder="Message" class="form-controller"></textarea>
                                      </div>
                                      <div class="form-group">
                                          <button type="submit" class="button default-template-gradient button-radius">Request Booking</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>

                  <div class="apartments-content seven post clerafix">
                      <div class="image-content">
                          <a href="#"><img class="overlay-image" src="assets/images/apartment-ad.png" alt="about"></a>
                      </div>
                  </div>
              </div>
          </div>
        -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>


<!--======Releted Post=======-->
<div class="apartments-related-area bg-gray-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content-one">
                    <h2 class="title default-text-gradient">Related apartments</h2>
                </div><!-- /.Apartments-heading-content -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="row">

            @if (count($rltd_post) >0)
                @foreach ($rltd_post as $item)
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="apartments-content" >
                            <div class="image-content">
                                <a href="{{ route('single-post', $item->slug) }}">
                                    <img src="../../{{ $item->images_one }}" alt="{{ $item->title }}" />
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
                                        <i class="fa fa-bed"></i> {{ $item->rooms }} Bed
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
    </div><!-- /.container -->
</div>


@endsection

