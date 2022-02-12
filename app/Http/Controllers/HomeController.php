<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use Illuminate\Http\Request;
use App\Post;
use App\Division;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function posts(){
        $posts = Post::where('user_id',Auth::user()->id)
        ->with('get_type')
        ->latest()->get();
        return view('pages.posts',compact('posts'));
    }

    public function address(){
        $user =Auth::user()->id;
        $last_address = Post::where('user_id',$user)->first();


        $division = Division::where('id', Auth::user()->division)->first();
        $district = District::where('id', Auth::user()->district)->first();
        $getcity = City::where('id',$last_address->city )->first();
        return view('pages.address', compact('district','last_address','getcity'));
    }
    public function acDetails(){

        $district = District::where('id', Auth::user()->district)->first();
        $division = Division::where('id', Auth::user()->division)->first();


        return view('pages.ac-details',compact('district','division'));
    }

}
