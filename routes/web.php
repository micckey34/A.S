<?php

use Illuminate\Support\Facades\Route;
use app\Models\User;

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MatchingController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::resource('groups', GroupsController::class);
Route::resource('matching', MatchingController::class);



//トップページ
Route::get('/', function () {
    return view('welcome');
});


//ホームページ
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\MatchingController@index')

    ->name('dashboard');


//個人検索トップ
Route::get('/search', 'App\Http\Controllers\MatchingController@search')
    ->name('search.search');


//グループページトップ
Route::middleware(['auth:sanctum', 'verified'])->get('/searchgroup', function () {
    return view('group.group_list');
})->name('group.searchgroup');


//チャットルームトップ
Route::get('/chat_list', 'App\Http\Controllers\GroupsController@list')
    ->name('list');


//友達検索
Route::get('/friend_search', 'App\Http\Controllers\MatchingController@friendsearch')
    ->name('friend_search');


//恋人検索
Route::get('/lover_search', 'App\Http\Controllers\MatchingController@loversearch')
    ->name('lover_search');


//恋人検索
Route::get('/favorite_search', 'App\Http\Controllers\MatchingController@favoritesearch')
    ->name('favorite_search');


//プロフィール詳細画面
Route::get('/user_profile/{id}', 'App\Http\Controllers\MatchingController@profile')
    ->name('user_profile');


//グループ検索
Route::get('/group_list', 'App\Http\Controllers\GroupsController@index')
    ->name('group_list');


//グループ作成
Route::middleware(['auth:sanctum', 'verified'])->get('/create_group', function () {
    return view('group.create_group');
})->name('create_group');


//グループ詳細画面
Route::get('/group_profile/{id}', 'App\Http\Controllers\GroupsController@show')
    ->name('group_profile');


//グループ参加機能
Route::post('/group_profile', 'App\Http\Controllers\GroupsController@join')
    ->name('group_join');


//いいね機能
Route::get('/{like_user_id}', 'App\Http\Controllers\MatchingController@favorite')
    ->name('favorite');


//グループごとのページ
Route::get('/group_page/{id}', 'App\Http\Controllers\GroupsController@group_page')
    ->name('group_page');


//グループチャット、メッセージ
Route::post('/group_page', 'App\Http\Controllers\GroupsController@message')
    ->name('message');



//リクエスト許可
Route::post('/permit', 'App\Http\Controllers\MatchingController@permit')
    ->name('permit');


//リクエスト拒否
Route::post('/reject', 'App\Http\Controllers\MatchingController@reject')
    ->name('reject');


//個人チャット
Route::get('/chatroom/{request_id}', 'App\Http\Controllers\MatchingController@chatroom')
    ->name('chatroom');


//個人チャット メッセージ
Route::post('/chatroom', 'App\Http\Controllers\MatchingController@message')
    ->name('chat_message');
