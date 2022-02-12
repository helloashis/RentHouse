@extends('layouts.app')
@section('title','User Login')
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
                        <span class="last-item">Login</span>
                    </div>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumbs-area -->
    <div class="container">
        <div class="row">
            <br><br>
            <div class="col-md-3"></div>
            <div class="col-md-6 offset-md-3">
                <!-- log in form -->
                
                <form class="cd-form" style="border:1px solid #1111112e; border-radius:5px;" method="post" action="{{ route('login') }}">
                    @csrf
                    <h3 class="text-center">User Login</h3>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signin-email">E-mail</label>
                        <input class="full-width has-padding has-border " value="{{ old('email') }}" name="email" id="signin-email" type="email" placeholder="E-mail">
                        
                        @error('email')
                            <span class="cd-error-message">{{ $message }}</span>
                        @enderror
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border @error('password') is-invalid @enderror" name="password" id="signin-password" type="text"  placeholder="Password">
                        <a href="#0" class="hide-password">Hide</a>
                        @error('password')
                            <span class="cd-error-message">{{ $message }}</span>
                        @enderror
                    </p>

                    <p class="fieldset">
                        <input type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember-me">Remember me</label>
                        <br>
                        <a class="text-center" style="color:#23ac61" href="{{ route('register') }}">I have no account! Register Now</a>
                        
                    </p>   
                    <p class="fieldset">
                        
                        <input class="full-width" type="submit" name="signin" value="Login">
                    </p>
                    <p class="cd-form-bottom-message">
                        
                        <a  style="color:#111" href="{{ route('password.request') }}">Forgot your password?</a>
                    </p>
                </form>
                
            </div>
        </div>
    </div>

<br>
@endsection