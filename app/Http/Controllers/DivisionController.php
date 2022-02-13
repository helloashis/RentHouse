<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DivisionController extends Controller
{

    public function index()
    {   
        $divisions = Division::with('user','district')->orderby('title','ASC')->get();
        $dist = District::get();
        return view('admin.division', compact('divisions','dist'));
    }
    
    public function myformAjax($id)
    {
        $district = District::where("division_id",$id)
                    ->get();
        return json_encode($district);
    }

    public function disabled($id)
    {

        $result = Division::find($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);

        if ($result) {
            return Redirect()->route('divisions.manage')->with('success',"Division disabled succesfully!");
        } else {
            return Redirect()->route('divisions.manage')->with('failed',"Con\'t disabled!");
        }

    }
    public function enabled($id)
    {

        $result = Division::find($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        if ($result) {
            return Redirect()->route('divisions.manage')->with('success',"Division enabled succesfully!");
        } else {
            return Redirect()->route('divisions.manage')->with('failed',"Con\'t enabled!");
        }

    }

    public function addDist(Request $request)
    {

        $data = $request->all();
        for ($i = 0; $i < count($request->dist); $i++) {
            $dist[] = [
                'division_id' => $request->division,
                'title' => $request->dist[$i],
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        $result = District::insert($dist);

        if ($result) {
            return Redirect()->route('divisions.manage')->with('success',"Districts added succesfully!");
        } else {
            return Redirect()->route('divisions.manage')->with('failed',"Con\'t district added!");
        }

        
    }


}
