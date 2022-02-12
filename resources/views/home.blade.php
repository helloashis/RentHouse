@extends('layouts.app')
@section('title', 'Welcome to User Dashboard')
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
                        <span class="last-item">My account</span>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumbs-area -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="woodmart-my-account-sidebar">
                <h3 class="woocommerce-MyAccount-title entry-title">My account</h3>
                <nav class="woocommerce-MyAccount-navigation">
                    <ul>
                        <li class="is-active">
                            <a href="{{ url('/my-account') }}">Dashboard</a>
                        </li>
                        <li class="">
                            <a href="{{ route('posts') }}">All Posts</a>
                        </li>
                        <!--li class="">
                            <a href="{{ route('addresses') }}">Addresses</a>
                        </li-->
                        <li class="">
                            <a href="{{ route('ac-details') }}">Account Details</a>
                        </li>
                        <li class="">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-9">
            <div class="woocommerce-MyAccount-content">
                <div class="woocommerce-notices-wrapper"></div>
                <p>
                    Hello <strong>{{ Auth::user()->name }}</strong></p>
                <p>
                    From your account dashboard you can view your <a href="{{ route('posts') }}">recent posts</a>,
                    manage your
                    <a href="">house addresses</a>, and
                    <a href="">edit your password and account details</a>.
                </p>

                <div class="woodmart-my-account-links">


                    <div class="orders-link">
                        <a href="{{ route('posts') }}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <br>
                            All Posts
                        </a>
                    </div>

                    <div class="edit-address-link">

                        <a href="{{ route('addresses') }}">
                            <i class="fa fa-map" aria-hidden="true"></i>
                            <br>
                            Addresses
                        </a>
                    </div>
                    <div class="edit-account-link">
                        <a href="{{ route('ac-details') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <br>
                            Account details
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
