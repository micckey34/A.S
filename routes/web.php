<?php

use Illuminate\Support\Facades\Route;
use app\Models\User;
use app\Http\Controllers\UsersController;
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

Route::resource('users', UsersController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/search', function () {
    $users = new User;
    // ddd($users);
    $user = $users->find(2);
    return view('search.search', ['users' => $user]);
})->name('search.search');

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
Route::middleware(['auth:sanctum', 'verified'])->get('/user_profile', function () {
    return view('search.user_profile');
})->name('user_profile');
Route::middleware(['auth:sanctum', 'verified'])->get('/group_list', function () {
    return view('group.group_list');
})->name('group_list');
Route::middleware(['auth:sanctum', 'verified'])->get('/create_group', function () {
    return view('group.create_group');
})->name('create_group');
