@extends('layouts.app')

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
                    <span class="last-item">Account Details</span>
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
                        <li class="">
                            <a href="{{ route('addresses') }}">Addresses</a>
                        </li>
                        <li class="is-active">
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
                <form method="POST" action="{{ route('change.password') }}">
                    @csrf

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card bordered">
                        <div class="card-header">
                            <b>Change Password</b>
                            <hr>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Old Password</label>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="password" name="current_password" autocomplete="current-password" class="form-control" id="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">New Password</label>
                                    <input type="password" name="new_password" autocomplete="current-password" class="form-control" id="">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="new_confirm_password" autocomplete="current-password" class="form-control" id="">
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <br>
                            <button type="submit" class="btn btn-success btn-sm">Change Password</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<br>
@endsection
