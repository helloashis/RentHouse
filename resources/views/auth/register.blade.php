@extends('layouts.app')

@section('title', 'User Registration')
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
                        <span class="last-item">Register</span>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumbs-area -->
    <div class="register-area" style="background-color: rgb(249, 249, 249);">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 offset-md-1">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2 style="margin: 10px 0px;font-size: 25px;font-weight: 300;text-transform: uppercase;letter-spacing: 4px;border-bottom: 4px double #DDD;padding: 8px 0;color: #aa0114;">No Profile yet, create a new one : </h2>
                            <form method="post" enctype="multipart/form-data" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="name">Your Name <span>*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" autocomplete="off" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="email">Email <span>*</span> <span id="show_availavity1" style="font-size: 11px; font-weight: normal; color: red; display: none;"></span><span id="show_availavity2" style="font-size: 11px; font-weight: normal; color: green; display: none;"></span><span id="show_availavity3" style="font-size: 11px; font-weight: normal; color: red; display: none;"></span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" onblur="checkAvailability()" id="email" autocomplete="off" required="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Mobile No <span>*</span></label>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="phone" autocomplete="off" required="">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="name">Password <span>*</span></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Confirm Password <span>*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="division">Select Division <span>*</span></label>
                                        <select name="division" id="division" class="form-control @error('division') is-invalid @enderror">
                                            <option value="">===Select your Division===</option>

                                            @foreach (App\Division::where('status',1)->latest()->get() as $items)
                                                <option value="{{ $items->id }}">{{ $items->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('division')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="district">Select District <span>*</span></label>
                                        <select name="district" id="district" class="district form-control @error('district') is-invalid @enderror">
                                        </select>
                                        <img id="loader" src="{{ asset('frontend') }}/images/loader.gif" width="20px" alt="">
                                        @error('district')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default" style="margin-top: 14px; color: red;margin-bottom:10px;">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
