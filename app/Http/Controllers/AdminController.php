<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\view;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // 限認證使用者存取指定路由
    // 在建構子中呼叫 middleware 方法
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        // $view = view::all()->paginate(10);
        // return view("admin.viewlist.index")->with("view",$view);
        $view = DB::table('views')->paginate(10);
        return view('gogoTaipei.backend.viewlist', ['view' => $view]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $view = DB::table('views')->where('vid', 'like', '%' . $search . '%')
            ->orwhere('name', 'like', '%' . $search . '%')
            ->orwhere('description', 'like', '%' . $search . '%')
            ->orwhere('tel', 'like', '%' . $search . '%')
            ->orwhere('address', 'like', '%' . $search . '%')
            ->orwhere('zipcode', 'like', '%' . $search . '%')
            ->orwhere('opentime', 'like', '%' . $search . '%')
            ->orwhere('px', 'like', '%' . $search . '%')
            ->orwhere('py', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('gogoTaipei.backend.viewlist', ['view' => $view]);
    }


    public function edit($vid)
    {
        $view = DB::select('select * from views where vid=?', [$vid]);
        return view('gogoTaipei.backend.viewlist_edit', ['view' => $view]);
    }

    public function update(Request $request)
    {
        $vid = $request->input('vid');
        // print_r($vid);
        // print_r("FK");
        $name = $request->input('name');
        $description = $request->input('description');
        $tel = $request->input('tel');
        $address = $request->input('address');
        $zipcode = $request->input('zipcode');
        $opentime = $request->input('opentime');
        $px = $request->input('px');
        $py = $request->input('py');

        // DB::update('update views set name=?, description=?, tel=?, address=?, zipcode=?, opentime=?, px=?, py=? where vid = ?', [$name, $description, $tel, $address, $zipcode, $opentime, $px, $py, $vid]);
        $view = DB::update('update views set name=?, description=?, tel=?, address=?, zipcode=?, opentime=?, px=?, py=? where vid = ?', [$name, $description, $tel, $address, $zipcode, $opentime, $px, $py,$vid]);
        $view = DB::select('select * from views');
        return redirect()->route('admin.viewlist.insert');

    }

    public function destroy($vid)
    {
        $view = DB::delete('delete from views where vid=?', [$vid]);
        $view = DB::select('select * from views');
        return redirect()->route('admin.viewlist.insert');
    }

    //

    public function add()
    {
        return view('gogoTaipei.backend.viewlist_insert');
    }

    // model寫法
    public function insert(Request $request)
    {
        // $view = new view;
        // id	name	description	tel	address	zipcode	opentime	px	py
        // $data = array(
            $vid = $request->input('vid');
            $name = $request->input('name');
            $description = $request->input('description');
            $tel = $request->input('tel');
            $address = $request->input('address');
            $zipcode = $request->input('zipcode');
            $opentime = $request->input('opentime');
            $px = $request->input('px');
            $py = $request->input('py');
        // );

        // $view->save();


        DB::insert('insert into views (vid, name, description, tel, address, zipcode, opentime, px, py) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
        [
            $vid,$name,$description,$tel,$address,$zipcode,$opentime,$px,$py ]);

        return redirect()->route('admin.viewlist.insert');
    }
}
