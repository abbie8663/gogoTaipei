<?php

namespace App\Http\Controllers;

use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    protected $gmap; //map
    public function __construct(GMaps $gmap)
    {
        $this->gmap = $gmap;
        $this->middleware('auth');
    }


    public function index()
    {
        //顯示 我的行程

        $today = date("Y-m-d", mktime(date('H') + 8, date('i'), date('s'), date('m'), date('d'), date('Y')));
        // print_r($today);
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
                'views.px as px',
                'views.py as py',
                'schedule.start_date',
                'schedule.end_date'
            )
            ->orderBy('start_', 'asc')
            ->get();


        /******** End Controls ********/
        // foreach ($schedule as $row) {
        //     print_r($row->px);
        //     // print_r($schedule->py);

        //     print_r('FK');
        // }
        $center_px = $schedule[0]->px;
        $center_py = $schedule[0]->py;


        $config = array();
        $config['map_height'] = "500px";
        $config['center'] = "$center_py, $center_px";
        $config['zoom'] = '15';

        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';
        $this->gmap->initialize($config); // Initialize Map with custom configuration
        // set up the marker ready for positioning

        /******** marker ********/
        // $marker = array();
        // $marker['position'] = "$schedule->py, $schedule->px";
        // $marker['draggable'] = false;
        // $marker['ondragend'] = '
        // iw_' . $this->gmap->map_name . '.close();
        // reverseGeocode(event.latLng, function(status, result, mark){
        //     if(status == 200){
        //         iw_' . $this->gmap->map_name . '.setContent(result);
        //         iw_' . $this->gmap->map_name . '.open(' . $this->gmap->map_name . ', mark);
        //     }
        // }, this);
        // ';

        // $this->gmap->add_marker($marker);

        /******** foreach  marker ********/
        foreach ($schedule as $row) {
            $marker = array();
            $marker['position'] = "$row->py, $row->px";
            $marker['draggable'] = false;
            $marker['ondragend'] = '
        iw_' . $this->gmap->map_name . '.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_' . $this->gmap->map_name . '.setContent(result);
                iw_' . $this->gmap->map_name . '.open(' . $this->gmap->map_name . ', mark);
            }
        }, this);
        ';

            $this->gmap->add_marker($marker);
        }



        $map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']




        return view('gogoTaipei.member.schedule', ['schedule' => $schedule, 'map' => $map]);
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
            ->orderBy('start_', 'asc')
            ->get();

        return view('gogoTaipei.member.schedule', ['schedule' => $schedule]);
    }



    public function insert(Request $request, $vid)
    {
        //新增行程
        $uid =  Auth::id();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start =  substr($start_date, 0, 10);

        //判斷景點是否已存在
        $schedule =  DB::table('schedule')->where('uid', Auth::id())->where('vid', $vid)->where('start', $start)->first();

        if ($schedule == NULL) {
            DB::insert('insert into schedule (vid, uid, start_date, start,start_, end_date, end) values (?, ?, ?, ?, ?, ?,?)', [$vid, $uid, $start_date, $start_date, $start_date, $end_date, $end_date]);
            return redirect()->back()->with('message', '加入成功');
        } else
            return redirect()->back()->with('alert', '景點已在行程中');
    }

    public function edit(Request $request, $sid)
    {
        //修改行程
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        DB::table('schedule')
            ->where('sid', $sid)
            ->update(['start_date' => $start_date, 'start' => $start_date, 'start_' => $start_date, 'end_date' => $end_date, 'end' => $end_date]);

        return redirect()->back();
    }

    public function delete($sid)
    {
        //刪除行程
        print_r($sid);
        DB::table('schedule')->where('sid', '=', $sid)->delete();
        return redirect()->back();
    }
}
