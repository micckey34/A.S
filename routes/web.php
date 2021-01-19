<?php

use Illuminate\Support\Facades\Route;
use app\Models\User;

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MatchingController;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//個人検索トップ
Route::get('/search', 'App\Http\Controllers\MatchingController@search')
    ->name('search.search');


//グループページトップ
Route::middleware(['auth:sanctum', 'verified'])->get('/searchgroup', function () {
    return view('group.searchgroup');
})->name('group.searchgroup');


//チャットルーム
Route::middleware(['auth:sanctum', 'verified'])->get('/chat_list', function () {
    return view('chat.chat_list');
})->name('chat.chat_list');


//友達検索
Route::get('/friend_search', 'App\Http\Controllers\MatchingController@friendsearch')
    ->name('friend_search');


//恋人検索
Route::get('/lover_search', 'App\Http\Controllers\MatchingController@loversearch')
    ->name('lover_search');


//お気に入りユーザー
Route::middleware(['auth:sanctum', 'verified'])->get('/favorite_users', function () {
    return view('search.favorite_users');
})->name('favorite_users');


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
