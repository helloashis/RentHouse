<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is my final year project the university name Sylhet International University">
    <meta name="keywords" content="Final Year Project, Design, Development, Ashis,PHP,Laravel" />
    <meta property="og:site_name" content="House Rent - Developed & Maintenance by Ashis Sarker"/>
    <meta property="og:title" content="House Rent - Developed & Maintenance by Ashis Sarker" />
    <meta name="author" content="Ashis Sarker">

    <!-- Titles
    ================================================== -->

    <title>Rent House - @yield('title')</title>
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/house-logo.png">
    <link rel="apple-touch-icon" href="{{ asset('frontend') }}/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend') }}/images/apple-touch-icon_72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend') }}/images/apple-touch-icon_114x114.png">

    <!-- Custom Font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i%7cPoppins:300,400,500,600,700" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/plugins.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/colors.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/style.css">
    <!-- Modernizr
    ================================================== -->
    <script src="{{ asset('frontend') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <img src="{{ asset('frontend') }}/images/house-logo.png" style="display:none"/>
    <!-- ====== Header Mobile Area ====== -->
    <header class="mobile-header-area bg-gray-color hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 tb">
                    <div class="mobile-header-block">
                        <div class="menu-area tb-cell">
                            <!--Mobile Main Menu-->
                            <div class="mobile-menu-main hidden-md hidden-lg">
                                <div class="menucontent overlaybg"></div>
                                <div class="menuexpandermain slideRight">
                                    <a id="navtoggole-main" class="animated-arrow slideLeft menuclose">
                                        <span></span>
                                    </a>
                                    <span id="menu-marker"></span>
                                </div><!--/.menuexpandermain-->
                                <div id="mobile-main-nav" class="main-navigation slideLeft">
                                    <div class="menu-wrapper">
                                        <div id="main-mobile-container" class="menu-content clearfix"></div>
                                        <div class="left-content">
                                            <ul>
                                                @if (Auth::user())
                                                    <li>
                                                        <a href="{{ route('new-post') }}" class="btn btn-primary btn-sm listing-btn"> Add Listing</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('home') }}"><i class="fa fa-user"></i>{{ Auth::user()->name }}'s Account</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out"></i>Logout</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>

                                                    </li>
                                                @else
                                                    <li>
                                                        @if(request()->is('login'))
                                                            <a class="active" href="{{ route('register') }}" ><i class="fa fa-user-plus"></i> Register</a>
                                                        @elseif(request()->is('register'))
                                                            <a class="active" href="{{ route('login') }}" ><i class="fa fa-address-book"></i>Login</a>
                                                        @else
                                                            <a class="" href="{{ route('login') }}" ><i class="fa fa-address-book"></i>Login / Register</a>
                                                        @endif
                                                    </li>
                                                @endif
                                            </ul>
                                        </div><!-- /.left-content -->
                                        <div class="social-media">
                                            <h5>Follow Us</h5>
                                            <ul>
                                                <li><a target="_blank" href=""><i class="fa fa-instagram"></i></a></li>
                                                <li><a target="_blank" href=""><i class="fa fa-google-plus"></i></a></li>
                                                <li><a target="_blank" href=""><i class="fa fa-facebook"></i></a></li>
                                                <li><a target="_blank" href=""><i class="fa fa-twitter"></i></a></li>
                                            </ul>
                                        </div><!-- /.social-media -->
                                    </div>
                                </div><!--/#mobile-main-nav-->
                            </div><!--/.mobile-menu-main-->
                        </div><!-- /.menu-area -->
                        <div class="logo-area tb-cell">
                            <div class="site-logo">
                                <a href="{{ route('frontpage') }}">
                                    <img src="{{ asset('frontend')}}/images/logo.png" alt="site-logo" />
                                </a>
                            </div><!-- /.site-logo -->
                        </div><!-- /.logo-area -->
                        
                    </div><!-- /.mobile-header-block -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </header><!-- /.mobile-header-area -->

    <!-- ====== Header Top Area ====== -->
    <header class="header-area hidden-xs hidden-sm">
        <div class="container">
            <div class="header-top-content header-three">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="site-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend')}}/images/logo.png" alt="site-logo" />
                            </a>
                        </div><!-- /.site-logo -->
                    </div><!-- /.col-md-8 -->
                    <div class="col-md-5 col-sm-5">
                        <div class="left-content">
                            <ul>

                                <!--li>
                                    <a href="#"><i class="fa fa-phone-square"></i>Call Us - 01623 030020</a>
                                </li-->
                                @if (Auth::user())
                                    <li>
                                        <a href="{{ route('new-post') }}" class="btn btn-primary btn-sm listing-btn"> Add Listing</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}"><i class="fa fa-user"></i>{{ Auth::user()->name }}'s Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out"></i>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                    </li>
                                @else
                                    <li>

                                        @if(request()->is('login'))
                                            <a class="active" href="{{ route('register') }}" ><i class="fa fa-user-plus"></i> Register</a>
                                        @elseif(request()->is('register'))
                                            <a class="active" href="{{ route('login') }}" ><i class="fa fa-address-book"></i>Login</a>
                                        @else
                                            <a class="" href="{{ route('login') }}" ><i class="fa fa-address-book"></i>Login / Register</a>
                                        @endif

                                    </li>
                                @endif
                            </ul>
                        </div><!-- /.left-content -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.header-top-content -->
        </div><!-- /.container -->
    </header><!-- /.head-area -->

    <!-- ====== Header Bottom Area ====== -->
    <div class="header-bottom-area four default-template-gradient  hidden-xs hidden-sm">
        <div class="container">
            <div class="header-bottom-content">
                <div class="row">
                    <div class="col-md-9 col-sm-9">
                        <nav id="main-nav" class="site-navigation top-navigation">
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <ul class="menu-list">
                                        <li>
                                            <a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('frontpage') }}">Home</a>

                                        </li>
                                        <li>
                                            <a class="{{ (request()->is('all-posts')) ? 'active' : '' }}" href="{{ route('all-post') }}">All Apartment</a>
                                        </li>
                                        <li>
                                            <a href="about.html">About</a>
                                        </li>
                                        <li>
                                            <a href="about.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul> <!-- /.menu-list -->
                                </div> <!-- /.menu-content-->
                            </div> <!-- /.menu-wrapper -->
                        </nav><!-- /.site-navigation -->
                    </div><!-- /.col-md-9 -->
                    <div class="col-md-3 col-sm-3">
                        <div class="social-media">
                            <ul>
                                <li><a href="#">follow us</a></li>
                                <li><a target="_blank" href=""><i class="fa fa-instagram"></i></a></li>
                                <li><a target="_blank" href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a target="_blank" href=" "><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href=" "><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div><!-- /.social-media -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.header-bottom-content -->
        </div><!-- /.header-ara -->
    </div><!-- /.head-area -->


    @yield('content')


    <!-- ====== Footer Area ====== -->
    <footer class="footer-area bg-gray-color" style="background-image:url({{ asset('frontend')}}/images/footer-bg.png)">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget widget_about yellow-color">
                        <div class="widget-title-area">
                            <h3 class="widget-title">
                                About House Rent
                            </h3><!-- /.widget-title -->
                        </div><!-- /.widget-title-area -->
                        <div class="widget-about-content">
                            <img src="{{ asset('frontend')}}/images/footer-logo.png" alt="house" />
                            <p>We Provide Premium Word Press, Ghost and HTML template. Our Perm tritium Templates is, develop gaped in a way so that the clients find  Support. Themes are developed in a way so that the clients find.</p>
                            <a href="#" class="button">More</a>
                        </div><!-- /.widget-content -->
                    </div><!-- /.widget widget_about -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="widget widget_place_category yellow-color">
                        <div class="widget-title-area">
                            <h3 class="widget-title">Place Category</h3><!-- /.widget-title -->
                        </div><!-- /.widget-title-area -->
                        <ul>
                            <li>Flat for Rent <a href="#">Francis</a></li>
                            <li>Flat for Rent <a href="#">Collins St</a></li>
                            <li>Flat for Rent <a href="#">Rose Ln</a></li>
                            <li>Flat for Rent <a href="#">Cosgrave Ln</a></li>
                            <li>Flat for Rent <a href="#">Bourke St</a></li>
                            <li>Flat for Rent <a href="#">Flienders Ln</a></li>
                        </ul>
                    </div><!-- /.widget -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="widget widget_instagram yellow-color">
                        <div class="widget-title-area">
                            <h3 class="widget-title">Instagram Image</h3><!-- /.widget-title -->
                        </div><!-- /.widget-title-area -->
                        <div class="instagram-image-content">
                            <a href="#"><img src="{{ asset('frontend')}}/images/instagram/instagram-one.png" alt="" /></a>
                            <a href="#"><img src="{{ asset('frontend')}}/images/instagram/instagram-two.png" alt="" /></a>
                            <a href="#"><img src="{{ asset('frontend')}}/images/instagram/instagram-three.png" alt="" /></a>
                            <a href="#"><img src="{{ asset('frontend')}}/images/instagram/instagram-four.png" alt="" /></a>
                            <a href="#"><img src="{{ asset('frontend')}}/images/instagram/instagram-five.png" alt="" /></a>
                            <a href="#"><img src="{{ asset('frontend')}}/images/instagram/instagram-six.png" alt="" /></a>

                        </div><!-- /.instagram-image-content -->
                    </div><!-- /.widget -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="bottom-content">
                        <p>Copyright  &copy;2017 || All Right & Reserved by <a href="#">House-rent</a></p>
                    </div><!-- /.bottom-top-content -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </footer><!-- /.footer-area -->

    <!-- All The JS Files
    ================================================== -->

    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/plugins.js"></script>
    <script src="{{ asset('frontend') }}/js/main.js"></script> <!-- main-js -->
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script>

        $(document).ready(function(){

            $('.gallery-slider').owlCarousel({
				loop:true,
				items: 3,
				nav: false,
				margin: 15,
				navText: ['<i class="fa fa-angle-left"</i>', '<i class="fa fa-angle-right"></i>'],
				responsive:{
					280:{
						items:2
					},
					480 : {
						items: 2
					},
					768 : {
					   items: 2
					},
					1200 : {
					   items: 3
					}
				}
			});
            $('.owl').owlCarousel({
                loop: true,
				items: 12,
				nav: true,
				navText: ['<i class="fa fa-angle-left"</i>', '<i class="fa fa-angle-right"></i>'],
				responsiveClass: true,
				responsiveRefreshRate: true,
				responsive:{
					280:{
						items: 2
					},
					500:{
						items: 3
					},
					600:{
						items: 4
					},
					800:{
						items: 6
					},
					1000:{
						items: 6
					},
					1200: {
						items: 9
					},
					1400: {
						items: 12
					}
				}
            });

            $('.owl-new').owlCarousel({
                loop: true,
                slideSpeed: 1000,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                resonsiveClass: true,
                responsiveRefreshRate: true,
				responsive:{
					280:{
						items: 1
					},
					500:{
						items: 1
					},
					600:{
						items: 1
					},
					800:{
						items: 1
					},
					1000:{
						items: 1
					},
					1200: {
						items: 1
					},
					1400: {
						items: 1
					}
				}
            });

        });





        $(document).ready(function() {
        var loader = $('#loader'),
        district = $('#district');
            district.attr('disabled','disabled');
            loader.hide();
        $('select[name="division"]').on('change', function() {
            var divID = $(this).val();
            loader.show();
            district.attr('disabled','disabled');
            if(divID) {
                $.ajax({
                    url: '/finddistrict/'+divID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="district"]').empty();
                        $('select[name="district"]').append('<option value="" selected>===Select District===</option>');
                        $.each(data, function(key, value) {
                            $('select[name="district"]').append('<option value="'+ value.id +'">'+ value.title +'</option>');
                        });
                        loader.hide();
                        district.removeAttr('disabled');


                    }


                });
            }else{
                $('select[name="district"]').empty();
            }
        });
    });




$(function() {
    $(document).on("change",".uploadFile", function()
    {
    		var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }

    });
});
    </script>
</body>
</html>
