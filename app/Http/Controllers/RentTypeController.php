<?php

namespace App\Http\Controllers;

use App\Rendtype;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class RentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Rendtype::orderby('id', 'DESC')->get();

        return view('admin.manage-rent-type', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'title' => 'required|max:30',
            'icon' => 'required',
        ]);


        $icon = $request->file('icon');
        $fileName_gen1 = 'icon_'.hexdec(uniqid()).'.'.$icon->getClientOriginalExtension();
        Image::make($icon)->save('uploads/category/'.$fileName_gen1);
        $img_path1 = 'uploads/category/'.$fileName_gen1;

        $slug = preg_replace('~[\\\\/:*$&@?"<>| ]~',"-",strtolower($request->title));
        Rendtype::insert([
            'title' => $request->title,
            'slug' => $slug,
            'icon' => $img_path1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('msg',"A new type added succesfully!");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Rendtype::find($id)->delete();
        return Redirect()->back()->with('msg',"Data deleted succesfully!");
    }
}
