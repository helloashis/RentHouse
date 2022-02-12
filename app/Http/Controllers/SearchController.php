<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Post;
use App\Rendtype;
use App\Social;



class SearchController extends Controller
{
    //

    public function search(Request $request)
    {
        $data = Post::with('get_type')
                        ->with('getcity')
                        ->with('getdist')
                        ->with('getuser')
                        ->whereDate('available','>',Carbon::now());

       if($request->city != Null ){
            $data = $data->where('address', 'LIKE', "%" . $request->city . "%");

        }else{
            $data = $data;
        }

        if($request->type == 'all'){

            $data = $data->where('type','>', 0);

        }else{
            $type = Rendtype::where('slug',$request->type)->first();
            $data = $data->where('type',$type->id);
        }

        if( $request->min_price && $request->max_price){
            $data = $data->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $data = $data->orderby('id', 'DESC')->paginate(12);
        $url = Social::where('id',1)->first();

        return view('pages.search', compact('data','url'));
    }

}
