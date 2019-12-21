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
Route::post('/viewlist', 'ViewController@search')->name('search_viewlist');


//留言板
Route::get('/message', 'MessageController@index')->name('message');


// Route::get('/viewinfo', function () {
//     return view('gogoTaipei.viewinfo');
// })->name('viewinfo');







Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
