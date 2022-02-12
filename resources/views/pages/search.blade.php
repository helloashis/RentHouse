@extends('layouts.app')
@section('title', 'Search Result')
@section('content')


    <!-- ====== Breadcrumbs Area ====== -->
    <div class="breadcrumbs-area bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <span class="first-item">
                         <a href="index01.html">Home</a></span>
                        <span class="separator">&gt;</span>
                        <span class="last-item">Search Result</span>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumbs-area -->

    <!-- ====== Apartments Area ======= -->
    <div class="apartments-area four bg-gray-color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="apartment-tab-area">

                        <div class="tab-content">
                            <div role="tabpanel" id="popular-apartment" class="tab-pane fade in active">
                                <div class="row">
                                    @if (count($data)>0)
                                        @foreach ($data as $item)
                                            <div class="col-md-4 col-sm-6 col-xs-6">
                                                <div class="apartments-content">
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
                                            <h4 class="alert alert-danger text-center">No result found</h4>
                                        </div>
                                    @endif


                                </div><!-- /.row -->
                                @if (count($data)>0)
                                    <div class="d-flex justify-content-center">
                                        {!! $data->links() !!}
                                    </div>
                                @else

                                @endif
                            </div><!-- /.popular-apartment -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.apartment-tab-area -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.Apartments-area-->
@endsection
