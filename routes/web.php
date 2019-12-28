<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('layouts.master');
});






Route::get('/home', function () {
    return view('gogoTaipei.index');
})->name('home');

//景點列表
Route::resource('views', 'ViewController');
Route::get('/viewlist', 'ViewController@search')->name('search_viewlist');

//我的行程
Route::resource('schedule', 'ScheduleController');
Route::post('schedule/insert/{id}', 'ScheduleController@insert');
Route::post('schedule/update/{id}', 'ScheduleController@update');


// //留言板
// Route::resource('message', 'MessageController');
// Route::post('message/search', 'MessageController@search');

//留言板
Route::resource('message', 'MessageController');
Route::post('message','MessageController@store')->name('store')->middleware('auth');
Route::post('message/search', 'MessageController@search')->name('search');
Route::get('deletemessage', 'MessageController@index1')->name('delete_message')->middleware('auth');
Route::post('deletemessage', 'MessageController@delete')->name('delete');

// Route::post('message/insert', 'MessageController@insert')->middleware('auth');
// Route::gett('message/delete', 'MessageController@delete')->middleware('auth');

//收藏
Route::get('/favorite', 'FavoriteController@index')->name('favorite');
Route::post('/favorite/add', 'FavoriteController@add')->name('addfavorite');
Route::get('/favorite/destory/{id}', 'FavoriteController@destory')->name('destoryfavorite');

//管理員
Route::get('/admin/vl', 'AdminController@index')->name('admin.viewlist.index');
Route::get('/admin/vl_', 'AdminController@search')->name('admin.viewlist.search');
Route::get('/admin/vl_edit/{id}', 'AdminController@edit')->name('admin.viewlist.edit');
Route::post('/admin/vl_edit', 'AdminController@update')->name('admin.viewlist.update');
Route::post('/admin/vl/{id}', 'AdminController@destroy')->name('admin.viewlist.destroy');
Route::get('/admin/vl_add', 'AdminController@add')->name('admin.viewlist.add');
Route::post('/admin/vl', 'AdminController@insert')->name('admin.viewlist.insert');


//判斷是否登入
//在Route最後加上這條 ->middleware('auth');


// Route::get('/viewinfo', function () {
//     return view('gogoTaipei.viewinfo');
// })->name('viewinfo');







Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
