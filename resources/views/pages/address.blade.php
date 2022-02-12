@extends('layouts.app')
@section('title','Address')
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
                    <span class="last-item">My Account</span>
                    <span class="separator">&gt;</span>
                    <span class="last-item">Addresses</span>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.breadcrumbs-area -->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="woodmart-my-account-sidebar">
                <h3 class="woocommerce-MyAccount-title entry-title">My account</h3>
                <nav class="woocommerce-MyAccount-navigation">
                    <ul>
                        <li class="">
                            <a href="{{ url('/my-account') }}">Dashboard</a>
                        </li>
                        <li class="">
                            <a href="{{ route('posts') }}">All Posts</a>
                        </li>
                        <li class="is-active">
                            <a href="{{ route('addresses') }}">Addresses</a>
                        </li>
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

                <p>
                    <strong>{{ Auth::user()->name }}</strong>
                    <br>
                    Address: {{ $last_address->address }}, {{ $getcity->name }}, {{ $district->name }}. <small><i>(By Last Posted)</i></small>
                    <br>
                    Phone: {{ Auth::user()->phone }}
                </p>

            </div>
        </div>
    </div>
</div>
<br>
@endsection
