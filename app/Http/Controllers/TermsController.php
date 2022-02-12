<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = Term::first();
        return view('admin.terms', compact('terms'));
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
            $img = Term::where('id',1)->first();

            $img_path1 = $img->thumbnail;


        }else{

            $img = Term::where('id',1)->first();
            if ($img->thumbnail != Null ) {
                unlink($img->thumbnail);
            }

            $images_one = $request->file('thumbnail');
            $fileName_gen1 = 'terms_471x356_'.hexdec(uniqid()).'.'.$images_one->getClientOriginalExtension();
            Image::make($images_one)->resize(471,356)->save('uploads/terms/'.$fileName_gen1);
            $img_path1 = 'uploads/terms/'.$fileName_gen1;
        }


        $id = $request->id;

        Term::find($id)->update([
            'content'       => $request->content,
            'thumbnail'     => $img_path1,
            'updated_at'    => Carbon::now(),
        ]);

        return Redirect()->route('admin.terms')->with('msg',"Update succesfully!");
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
