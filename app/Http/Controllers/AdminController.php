<?php

namespace App\Http\Controllers;

use App\Admin;
use App\District;
use App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    //

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {   

        $todays_posts = Post::where('created_at',date('Y-m-d'))->get(); 
        $all_posts = Post::get(); 
        $all_users = USer::get(); 
        return view('admin.dashboard', compact('all_posts','todays_posts','all_users'));
    }

    public function manageUsers()
    {
        $users = User::with('getposts')
        ->with('getdist')
        ->with('getdiv')
        ->with('getcity')
        ->withCount('getposts')->latest()->get();


        return view('admin.manage-users', compact('users'));
    }

    public function managePosts(){
        $posts = Post::with('getuser')
        ->with('get_type')
        ->with('getdist')
        ->with('getcity')
        ->latest()->get();


        return view('admin.manage-posts', compact('posts'));
    }

    public function manageAdmin()
    {
        $admins = Admin::latest()->get();
        return view('admin.manage-admins', compact('admins'));
    }

    public function addAdmin(Request $request)
    {

        $passoword = rand(100000,999999);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'rolls' => 'required',

        ]);

        $result = Admin::insert([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'is_super' => $request['rolls'],
            'password' => Hash::make($passoword),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($result) {
            return Redirect()->back()->with('success',"Admin added succesfully!".$passoword);
        } else {
            return Redirect()->back()->with('failed',"Con\'t added!");
        }


        
    }
    public function deleteAdmin($id){
        
        $result =Admin::find($id)->delete();
        if ($result) {
            return Redirect()->back()->with('success',"Admin delete succesfully!");
        } else {
            return Redirect()->with('failed',"Con\'t deleted!");
        }

    }

    
    public function superAdmin($id)
    {

        Admin::where('id',$id)->update([
            'is_super' => 1,
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success',"SuperAdmin maked succesfully!");
    }


    
    public function confirmedPost($id)
    {

        $result = Post::find($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        if ($result) {
            return Redirect()->route('posts.manage')->with('success',"Post confirmed succesfully!");
        } else {
            return Redirect()->route('posts.manage')->with('failed',"Con\'t confirmed!");
        }
        

        
    }

    public function rejectedPost($id)
    {

        $result = Post::find($id)->update([
            'status' => 2,
            'updated_at' => Carbon::now(),
        ]);

        if ($result) {
            return Redirect()->route('posts.manage')->with('success',"Post rejected succesfully!");
        } else {
            return Redirect()->route('posts.manage')->with('failed',"Con\'t rejected!");
        }

    }

    public function enabledPost($id)
    {

        $result = Post::find($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        if ($result) {
            return Redirect()->route('posts.manage')->with('success',"Post enabled succesfully!");
        } else {
            return Redirect()->route('posts.manage')->with('failed',"Con\'t enabled !");
        }
    }





    





}
