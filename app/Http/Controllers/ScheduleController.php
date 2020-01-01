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
        //選擇 日期 的行程

        $start = $request->input('date');
        return redirect()->route('schedule.date', [$start]);
    }

    public function index_d($date)
    {
        //顯示今天 我的行程

        $today = date("Y-m-d", mktime(date('H') + 8, date('i'), date('s'), date('m'), date('d'), date('Y')));
        print_r($today);
        // $thisday = '2017-04-20';
        // if(strtotime($today)>strtotime($thisday))

        $schedule = DB::table('schedule')->where('uid', Auth::id())->where('start', $date)
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
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start =  substr($start_date,0,10);

        //判斷景點是否已存在
        $schedule =  DB::table('schedule')->where('uid', Auth::id())->where('vid', $vid)->where('start', $start)->first();

        if ($schedule == NULL) {
            DB::insert('insert into schedule (vid, uid, start_date, start, end_date, end) values (?, ?, ?, ?, ?, ?)', [$vid, $uid, $start_date, $start_date, $end_date, $end_date]);
            return redirect()->back()->with('message', '加入成功');
        } 
        else
            return redirect()->back()->with('alert', '景點已在行程中');
    }

    public function edit(Request $request, $sid)
    {
        //修改行程
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        DB::table('schedule')
            ->where('sid', $sid)
            ->update(['start_date' => $start_date,'start' => $start_date, 'end_date' => $end_date, 'end' => $end_date]);
            
        return redirect()->back();
    }

    public function delete($sid)
    {
        //刪除行程
        print_r($sid);
        DB::table('schedule')->where('sid', '=', $sid)->delete();
        return redirect()->back();
    }
