<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MessageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $message=DB::table('message')
            ->join('users', 'users.id', '=', 'message.uid')
            ->select('users.name as name', 'message.*')
            ->orderBy('m_id','DESC')
            ->paginate(5);
        
           
        return view('gogoTaipei.message',['message'=>$message]);
       
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $u_mail =  Auth::id();
        $title = $request->input('title');
        $date=$request->input('date');
        $content = $request->input('content');
        // $u_mail = auth()->user()->id;
      

        DB::insert('insert into message (title,date,content,uid)
    values (?,?,?,?)',[$title,$date,$content,$u_mail]);
     return redirect()->action('MessageController@index');
        // return redirect()->refresh();
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
    public function destroy()
    {
        $message->delete();
        return redirect()->route('delete');
    
    }
    public function search(Request $request)
    {
        $search=$request->input('search');
        $message = DB::table('message')->where('title', 'like', '%'.$search.'%')
        ->join('users', 'users.id', '=', 'message.uid')
        ->select('users.name as name', 'message.*')
        ->orderBy('m_id','DESC')
        ->paginate(5);
        return view('gogoTaipei.message',['message'=>$message]);
    
    }
   
}
