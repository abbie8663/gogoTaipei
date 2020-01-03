<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $user_id = Auth::id();

        $favorite = DB::table('favorite')
        ->join('views', 'favorite.Vid', '=', 'views.vid')
        ->where('Uid', $user_id)->get();
        
        //多加的
        foreach($favorite as $row){
            $row->status = true;    
        }

        return view('gogoTaipei.favorite',['favorite'=>$favorite]);
    }
    


    public function add(Request $request){
        $user_id = Auth::id();
        $favorites = DB::table('favorite')
        ->where('Vid', '=', $request->viewid )
        ->where('Uid', '=', $user_id )->first();

        if ($favorites === null) {
            DB::insert('insert into favorite (Uid,Vid) values(?,?)',[$user_id,$request->viewid]);
        }
        else{
            DB::table('favorite')->where('Uid', '=', $user_id)->where('Vid', '=', $request->viewid )->delete();
        }
    }
    
    public function destory($id){
        $user_id = Auth::id();
        $favorites = DB::table('favorite')
        ->where('Vid', '=', $id )
        ->where('Uid', '=', $user_id )->first();

        if ($favorites === null) {
            DB::insert('insert into favorite (Uid,Vid) values(?,?)',[$user_id,$id]);
        }
        else{
            DB::table('favorite')->where('Uid', '=', $user_id)->where('Vid', '=', $id )->delete();
            return redirect()->back();
        }
    }
}
