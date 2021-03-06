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

Route::get('/', 'NewsController@index');
Route::get('/profile', 'NewsController@profile');


Route::group(['prefix' => 'admin'], function() {
  Route::get('news', 'Admin\NewsController@index')->middleware('auth');
  Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
  Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
  Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
  Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
  Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');

  Route::get('profile', 'Admin\ProfileController@index')->middleware('auth');
  Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
  Route::post('profile/edit', 'Admin\ProfileController@update')->middleware('auth');
  Route::get('profile/reup', 'Admin\ProfileController@reup')->middleware('auth');
  Route::post('profile/reup', 'Admin\ProfileController@upgrade')->middleware('auth');
  Route::get('profile/delete', 'Admin\ProfileController@delete')->middleware('auth');
});

//課題10-03
//http://XXXXXX.jp/XXX というアクセスが来たときに
//AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。
Route::get('XXX', 'AAA@bbb');

/*10-04.【応用】 前章でAdmin/ProfileControllerを作成し、edit Actionを追加しました。
web.phpを編集してadmin/profile/edit にアクセスしたら
ProfileController の edit Action に割り当てるように設定してください。 */

//行番号20に追記しました。

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
