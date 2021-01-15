<?php

use Illuminate\Support\Facades\Route;
use app\Models\User;
use app\Http\Controllers\UsersController;
use App\Http\Controllers\GroupsController;
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

Route::resource('users', 'UsersController');
Route::resource('groups', GroupsController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/search', 'App\Http\Controllers\UsersController@search')
    ->name('search.search');


Route::middleware(['auth:sanctum', 'verified'])->get('/searchgroup', function () {
    return view('group.searchgroup');
})->name('group.searchgroup');

Route::middleware(['auth:sanctum', 'verified'])->get('/chat_list', function () {
    return view('chat.chat_list');
})->name('chat.chat_list');


Route::middleware(['auth:sanctum', 'verified'])->get('/friend_search', function () {
    return view('search.friend_search');
})->name('friend_search');


Route::middleware(['auth:sanctum', 'verified'])->get('/lover_search', function () {
    return view('search.lover_search');
})->name('lover_search');


Route::middleware(['auth:sanctum', 'verified'])->get('/favorite_users', function () {
    return view('search.favorite_users');
})->name('favorite_users');


Route::get('/user_profile/{id}', 'App\Http\Controllers\UsersController@profile')
    ->name('user_profile');


Route::get('/group_list', 'App\Http\Controllers\GroupsController@idex')
    ->name('group_list');


Route::middleware(['auth:sanctum', 'verified'])->get('/create_group', function () {
    return view('group.create_group');
})->name('create_group');
