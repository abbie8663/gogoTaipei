<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $view = DB::table('views')->paginate(15);
        return view('gogoTaipei.viewlist',['view'=>$view]);
    }
    
     
    public function search(Request $request)
    {
        $search = $request->input('search');
      
        $view = DB::table('views')->where('id', 'like', '%'.$search.'%')
        ->orwhere('name', 'like', '%'.$search.'%')
        ->orwhere('description', 'like', '%'.$search.'%')
        ->orwhere('tel', 'like', '%'.$search.'%')
        ->orwhere('address', 'like', '%'.$search.'%')
        ->orwhere('zipcode', 'like', '%'.$search.'%')
        ->orwhere('opentime', 'like', '%'.$search.'%')
        ->orwhere('px', 'like', '%'.$search.'%')
        ->orwhere('py', 'like', '%'.$search.'%')
        ->paginate(15);

        return view('gogoTaipei.viewlist',['view'=>$view]);
    }

    public function viewinfo($id){
        $view = DB::table('views')->where('id', $id)->first();
        return view('gogoTaipei.viewinfo',['view'=>$view]);
    }
}
