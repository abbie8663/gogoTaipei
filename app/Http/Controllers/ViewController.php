<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $view = DB::table('views')->paginate(15);
        return view('gogoTaipei.viewlist',['view'=>$view]);
    }

    public function search(Request $request)
    {//搜尋景點
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
        //新增使用者的行程資料
        print_r($request->input('uid'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查看景點詳細內容
        $view = DB::table('views')->where('id', $id)->first();
        return view('gogoTaipei.viewinfo',['view'=>$view]);
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
    public function destroy($id)
    {
        //
    }
}
