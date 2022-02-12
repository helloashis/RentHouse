<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $policy = Policy::first();
        return view('admin.policy', compact('policy'));
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
            $img = Policy::where('id',1)->first();

            $img_path1 = $img->thumbnail;


        }else{

            $img = Policy::where('id',1)->first();
            if ($img->thumbnail != Null ) {
                unlink($img->thumbnail);
            }

            $images_one = $request->file('thumbnail');
            $fileName_gen1 = 'Policy_471x356_'.hexdec(uniqid()).'.'.$images_one->getClientOriginalExtension();
            Image::make($images_one)->resize(471,356)->save('uploads/policy/'.$fileName_gen1);
            $img_path1 = 'uploads/policy/'.$fileName_gen1;
        }


        $id = $request->id;

       $result = Policy::find($id)->update([
            'content'       => $request->content,
            'thumbnail'     => $img_path1,
            'updated_at'    => Carbon::now(),
        ]);
       if ($result) {
           return Redirect()->route('admin.policy')->with('success', 'Success! You\'ve Updated');
       } else {
           return Redirect()->route('admin.policy')->with('failed', 'Failed! User not created');
       }
       

        
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
