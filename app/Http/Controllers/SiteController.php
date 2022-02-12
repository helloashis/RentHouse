<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Post;
use App\Rendtype;
use App\Thumbnail;
use App\Social;
use App\About;
use App\Term;
use App\Specialty;
use App\Policy;

use Carbon\Carbon;

class SiteController extends Controller
{
    //


    public function index()
    {
        $posts = Post::where('status',1)

                ->with('get_type')
                ->with('getcity')
                ->with('getdist')
                ->with('getuser')
                ->whereDate('available','>',Carbon::now())
                ->limit('9')
                ->latest()->get();

        $images = Thumbnail::latest()->get();
        $category = Rendtype::orderby('title','ASC')->get();
        $url = Social::where('id',1)->first();
        $about = About::where('id',1)->first();
        $terms = Term::where('id',1)->first();
        $specialty = Specialty::where('id',1)->first();
        $policy = Policy::where('id',1)->first();
        return view('index', compact('posts','category','images','url','about','terms','specialty','policy'));
    }

    public function allPost()
    {
        $posts = Post::where('status',1)->whereDate('available','>',Carbon::now())->latest()->paginate(12);
        //$divisions = Division::latest()->get();
        $images = Thumbnail::latest()->get();
        $url = Social::where('id',1)->first();
        return view('pages.all-post',compact('posts','images','url'));
    }

    public function singlepost($key){
        $post = Post::with('get_type')
                ->with('getcity')
                ->with('getdist')
                ->with('getuser')
                ->where('slug',$key)
                ->first();

        $images = Thumbnail::where('post_id', $post->id)->first();
        $url = Social::where('id',1)->first();

        $rltd_post = Post::where('type',$post->type)->where('status',1)->where('id', '!=', $post->id)->get();
        return view('pages.post-details', compact('post','images', 'rltd_post','url'));
    }

    public function categoryPost($keyword){
        $category = Rendtype::where('slug',$keyword)->first();


            $post = Post::where('type',$category->id)->latest()->paginate(12);
            $row = Post::where('type',$category->id)->count();
            $url = Social::where('id',1)->first();
            return view('pages.category-wise', compact('post','category','row','url'));



    }

}
