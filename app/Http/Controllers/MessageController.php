<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
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
        // $view = DB::table('views')->paginate(15);
        // return view('gogoTaipei.viewlist',['view'=>$view]);
        return view('gogoTaipei.message');
    }
    
     
   
}
