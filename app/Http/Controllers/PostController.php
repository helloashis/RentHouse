<?php

namespace App\Http\Controllers;

use App\City;
use App\District;
use Illuminate\Http\Request;
use App\Post;
use App\Rendtype;
use App\Thumbnail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $district = District::where('id', Auth::user()->district)
            ->where('status',1)
            ->latest()->get();
        $cities = City::where('district_id',Auth::user()->district)->where('status',1)->latest()->get();
        $category = Rendtype::orderby('title','ASC')->get();
        return view('pages.new-post',compact('district','category','cities'));
    }
    public function store(Request $request){

        $request->validate([
            'title' => 'required|max:30',
            'floore' => 'required',
            'room' => 'required',
            'bath' => 'required',
            'type' => 'required',
            'price' => 'required',
            'date' => 'required',
            'description' => 'required',
            'feature' => 'required',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'images_one' => 'required'

        ]);


        //$post_id = 1+ Post::max('id');
        $images_one = $request->file('images_one');
        $fileName_gen1 = 'apartment_'.hexdec(uniqid()).'.'.$images_one->getClientOriginalExtension();
        Image::make($images_one)->resize(350,250)->save('uploads/apartments/'.$fileName_gen1);
        $img_path1 = 'uploads/apartments/'.$fileName_gen1;

        $images_two = $request->file('images_two');
        $fileName_gen2 = 'apartment_'.hexdec(uniqid()).'.'.$images_two->getClientOriginalExtension();
        Image::make($images_two)->resize(350,250)->save('uploads/apartments/'.$fileName_gen2);
        $img_path2 = 'uploads/apartments/'.$fileName_gen2;

        $images_three = $request->file('images_three');
        $fileName_gen3 = 'apartment_'.hexdec(uniqid()).'.'.$images_three->getClientOriginalExtension();
        Image::make($images_three)->resize(350,250)->save('uploads/apartments/'.$fileName_gen3);
        $img_path3 = 'uploads/apartments/'.$fileName_gen3;

        $images_four = $request->file('images_four');
        $fileName_gen4 = 'apartment_'.hexdec(uniqid()).'.'.$images_four->getClientOriginalExtension();
        Image::make($images_four)->resize(350,250)->save('uploads/apartments/'.$fileName_gen4);
        $img_path4 = 'uploads/apartments/'.$fileName_gen4;

        $images_five = $request->file('images_five');
        $fileName_gen5 = 'apartment_'.hexdec(uniqid()).'.'.$images_five->getClientOriginalExtension();
        Image::make($images_five)->resize(350,250)->save('uploads/apartments/'.$fileName_gen5);
        $img_path5 = 'uploads/apartments/'.$fileName_gen5;

        //$slug = preg_replace('~[\\\\/:*$&@?"<>| ]~',"-",strtolower($request->title));
        $random = Str::random(40);
        Post::insert([
            'user_id' => Auth::user()->id,
            'dist' => $request->district,
            'city' => $request->city,
            'title' => $request->title,
            'slug' => 'AS'.$random,
            'floore' => $request->floore,
            'rooms' => $request->room,
            'bath' => $request->bath,
            'type' => $request->type,
            'price' => $request->price,
            'available' => $request->date,
            'description' => $request->description,
            'features' => $request->feature,
            'address' => $request->address,
            'images_one'    =>  $img_path1,
            'images_two'    =>  $img_path2,
            'images_three'  =>  $img_path3,
            'images_four'   =>  $img_path4,
            'images_five'   =>  $img_path5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('msg',"A new post added succesfully!");
    }


}
