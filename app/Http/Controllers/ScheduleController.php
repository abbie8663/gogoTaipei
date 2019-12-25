<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //顯示 我的行程
        $schedule = DB::table('schedule')->where('uid', Auth::id())
            ->join('users', 'users.id', '=', 'schedule.uid')
            ->join('views', 'schedule.vid', '=', 'views.vid')
            ->select('users.name as u_name','views.name as v_name')
            ->get();

   

        return view('gogoTaipei.member.schedule', ['schedule' => $schedule]);
    }

    /**
     * Insert the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request, $vid)
    {
        //新增我的行程
        $uid =  Auth::id();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        DB::insert('insert into schedule (vid, uid, start_date, end_date) values (?, ?, ?, ?)', [$vid, $uid, $start_date, $end_date]);
        print_r($request->input('start_date'));
        print_r($uid);
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
    public function update(Request $request, $id)
    {
        //
        print_r($request->input('start_date'));
        print_r($id);
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
