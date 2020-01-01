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

        $today = date("Y-m-d", mktime(date('H') + 8, date('i'), date('s'), date('m'), date('d'), date('Y')));
        print_r($today);
        // $thisday = '2017-04-20';
        // if(strtotime($today)>strtotime($thisday))

        $schedule = DB::table('schedule')->where('uid', Auth::id())->where('start', $today)
            ->join('users', 'users.id', '=', 'schedule.uid')
            ->join('views', 'schedule.vid', '=', 'views.vid')
            ->select(
                'schedule.sid as sid',
                'users.name as u_name',
                'views.vid as vid',
                'views.name as v_name',
                'schedule.start_date',
                'schedule.end_date'
            )
            ->get();

        return view('gogoTaipei.member.schedule', ['schedule' => $schedule]);
    }

    public function date(Request $request)
    {
        //顯示 我的行程


        $start = $request->input('date');

        $schedule = DB::table('schedule')->where('uid', Auth::id())->where('start', $start)
            ->join('users', 'users.id', '=', 'schedule.uid')
            ->join('views', 'schedule.vid', '=', 'views.vid')
            ->select(
                'schedule.sid as sid',
                'users.name as u_name',
                'views.vid as vid',
                'views.name as v_name',
                'schedule.start_date',
                'schedule.end_date'
            )
            ->get();

        return view('gogoTaipei.member.schedule', ['schedule' => $schedule]);
    }

    public function insert(Request $request, $vid)
    {
        //新增行程
        $uid =  Auth::id();
        $today = date("Y-m-d", mktime(date('H') + 8, date('i'), date('s'), date('m'), date('d'), date('Y')));
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $schedule =  DB::table('schedule')->where('uid', Auth::id())->where('vid', $vid)->where('start_date', $start_date)->first();
        


        if ($schedule == NULL) {
            DB::insert('insert into schedule (vid, uid, start_date, start, end_date, end) values (?, ?, ?, ?, ?, ?)', [$vid, $uid, $start_date, $start_date, $end_date, $end_date]);
            return redirect()->back()->with('message', '加入成功');
        } 
        else
            return redirect()->back()->with('alert', '景點已存在');


        // print_r($request->input('start_date'));
        // print_r($schedule/);


    }

    // public function update(Request $request, $sid)
    // {
    //     //修改行程
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     DB::table('schedule')
    //         ->where('sid', $sid)
    //         ->update(['start_date' => $start_date, 'end_date' => $end_date]);
    //         return redirect()->back();
    //     // return redirect('schedule/date');
    //     // return redirect()->route('schedule_date');

    //     return redirect('schedule/date');
    // }
    public function update_(Request $request, $sid)
    {
        //修改行程
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        DB::table('schedule')
            ->where('sid', $sid)
            ->update(['start_date' => $start_date, 'end_date' => $end_date]);
            // return redirect()->back();
        // return redirect('schedule/date');
        // return redirect()->route('schedule_date');

        // return redirect('schedule/date');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sid)
    {
        //刪除行程
        print_r($sid);
        DB::table('schedule')->where('sid', '=', $sid)->delete();
        return redirect('schedule');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $sid)
    // {
    //     //修改行程
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     DB::table('schedule')
    //         ->where('sid', $sid)
    //         ->update(['start_date' => $start_date, 'end_date' => $end_date]);
    // }



















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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sid)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($vid)
    // {
        //
        //顯示 我的行程

        // $today = date("Y-m-d", mktime(date('H') + 8, date('i'), date('s'), date('m'), date('d'), date('Y')));

        // print_r($today);

        // $thisday = '2017-04-20';

        // if(strtotime($today)>strtotime($thisday))


    //     $schedule = DB::table('schedule')->where('uid', Auth::id())->where('start', $today)
    //         ->join('users', 'users.id', '=', 'schedule.uid')
    //         ->join('views', 'schedule.vid', '=', 'views.vid')
    //         ->select(
    //             'schedule.sid as sid',
    //             'users.name as u_name',
    //             'views.vid as vid',
    //             'views.name as v_name',
    //             'schedule.start_date',
    //             'schedule.end_date'
    //         )
    //         ->get();



    //     return view('gogoTaipei.member.schedule', ['schedule' => $schedule]);
    // }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sid)
    {
        //
    }
}
