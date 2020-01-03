<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $views = DB::table('views')->paginate(15);

        $user_id = Auth::id();

        $favorite = DB::table('favorite')
        ->join('views', 'favorite.Vid', '=', 'views.vid')
        ->where('Uid', $user_id)
        ->get();

                
        foreach($views as $row){
            $row->status = false;
            foreach($favorite as $rew){
                if($row->vid==$rew->Vid){
                    $row->status = true;
                }
            }
        }

        return view('gogoTaipei.viewlist',['view'=>$views,'search'=>'NULL']);
    }

    public function search(Request $request)
    {//搜尋景點
        $search = $request->input('search');
      
        $views = DB::table('views')->where('vid', 'like', '%'.$search.'%')
        ->orwhere('name', 'like', '%'.$search.'%')
        // ->orwhere('description', 'like', '%'.$search.'%')
        // ->orwhere('tel', 'like', '%'.$search.'%')
        ->orwhere('address', 'like', '%'.$search.'%')
        // ->orwhere('zipcode', 'like', '%'.$search.'%')
        // ->orwhere('opentime', 'like', '%'.$search.'%')
        // ->orwhere('px', 'like', '%'.$search.'%')
        // ->orwhere('py', 'like', '%'.$search.'%')
        ->paginate(15);
        
        //判斷哪些該亮愛心
        $user_id = Auth::id();

        $favorite = DB::table('favorite')
        ->join('views', 'favorite.Vid', '=', 'views.vid')
        ->where('Uid', $user_id)
        ->get();

        foreach($views as $row){
            $row->status = false;

            foreach($favorite as $rew){
                if($row->vid==$rew->Vid){
                    $row->status = true;
                }
            }
        }

        return view('gogoTaipei.viewlist',['view'=>$views,'search'=>$search]);
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

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //新增使用者的行程資料
        print_r($request->input('start_date'));
        // print_r($id);

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
        $view = DB::table('views')->where('vid', $id)->first();
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
        //新增使用者的行程資料
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
