<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;
use App\Upzilla;
use Carbon\Carbon;


class UpzillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::with('user','district')->orderby('title','ASC')->get();
        $dist = District::get();
        return view('admin.upzilla', compact('divisions','dist'));
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
    public function addZilla(Request $request)
    {
        $data = $request->all();
        for ($i = 0; $i < count($request->zilla); $i++) {
            $zilla[] = [
                'division_id' => $request->division,
                'district_id' => $request->district,
                'title' => $request->zilla[$i],
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        $result = Upzilla::insert($zilla);

        if ($result) {
            return Redirect()->back()->with('success',"Upzilla added succesfully!");
        } else {
            return Redirect()->back()->with('failed',"Con\'t upzilla added!");
        }
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
    public function destroy($id)
    {
        //
    }
}
