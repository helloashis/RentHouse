<?php

namespace App\Http\Controllers\Admin;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function showLoginForm()
    {
        return view('admin.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
