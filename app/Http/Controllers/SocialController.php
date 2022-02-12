<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Social;
use Carbon\Carbon;


class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Social::first();


        return view('admin.social-link', compact('links'));
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
            'fb'    => 'required',
            'twt'   => 'required',
            'inst'  => 'required',
            'gle'   => 'required',

        ]);
        $id = $request->id;
        Social::find($id)->update([
            'fb_ulr'    => $request->fb,
            'twt_url'   => $request->twt,
            'inst_url'  => $request->inst,
            'gle_url'   => $request->gle,
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->route('admin.social')->with('msg',"All Links Update succesfully!");

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
