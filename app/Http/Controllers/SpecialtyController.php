<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;



class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialty = Specialty::first();
        return view('admin.specialty', compact('specialty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request)
    {
        $request->validate([
            'content'       => 'required',
            //'thumbnail'     => 'required',

        ]);

        if ($request->file('thumbnail') === Null ) {
            $img = Specialty::where('id',1)->first();

            $img_path1 = $img->thumbnail;


        }else{

            $img = Specialty::where('id',1)->first();
            if ($img->thumbnail != Null ) {
                unlink($img->thumbnail);
            }

            $images_one = $request->file('thumbnail');
            $fileName_gen1 = 'specialty_471x356_'.hexdec(uniqid()).'.'.$images_one->getClientOriginalExtension();
            Image::make($images_one)->resize(471,356)->save('uploads/specialty/'.$fileName_gen1);
            $img_path1 = 'uploads/specialty/'.$fileName_gen1;
        }


        $id = $request->id;

        Specialty::find($id)->update([
            'content'       => $request->content,
            'thumbnail'     => $img_path1,
            'updated_at'    => Carbon::now(),
        ]);

        return Redirect()->route('admin.specialty')->with('msg',"Update succesfully!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
