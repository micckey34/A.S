<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Requests;
use App\Models\Likes;
use App\Models\Chat;

use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class MatchingController extends Controller
{


    //ホーム画面
    public function index()
    {
        $user_id = Auth::user()->id;
        $query = ['destination_id' => $user_id, 'result' => 0];
        $data = Requests::select('requests.id', 'users.name', 'users.id as user_id')->join('users', 'requests.user_id', '=', 'users.id')->where($query);
        $request = $data->get();
        return view('dashboard', ['requests' => $request]);
    }



    //検索トップ画面
    public function search()
    {
        $users = User::inrandomorder()->get();
        return view('search.search', ['users' => $users]);
    }



    //友達検索
    public function friendsearch()
    {
        $sex = Auth::user()->sex;
        $users = User::where('sex', $sex)->inrandomorder()->get();
        return view('search.search', ['users' => $users]);
    }



    //恋人検索
    public function loversearch()
    {
        $user_sex = Auth::user()->sex;
        if ($user_sex == 1) {
            $sex = 2;
        } else {
            $sex = 1;
        };
        $users = User::where('sex', $sex)->inrandomorder()->get();
        return view('search.search', ['users' => $users]);
    }



    //お気に入り検索
    public function favoritesearch()
    {
        $user_id = Auth::user()->id;
        $users = User::leftjoin('likes', 'users.id', '=', 'likes.like_user_id')->where('user_id', $user_id)->get();
        return view('search.favoritesearch', ['users' => $users]);
    }



    //ユーザー詳細画面
    public function profile($id)
    {
        $user = User::find($id);
        $user_id = Auth::user()->id;
        $query = ['user_id' => $user_id, 'like_user_id' => $user->id];
        $like = Likes::where($query)->get();
        return view('search.user_profile', with(['user' => $user, 'like' => $like]));
    }



    //リクエスト送信
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $destination_id =  $request->destination_id;
        $query = ['user_id' => $user_id, 'destination_id' => $destination_id];
        $check = Requests::where($query)->get();
        if ($check == '[]') {
            Requests::insert(['user_id' => $user_id, 'destination_id' => $destination_id, 'created_at' => now()]);
            return redirect()->route('search.search');
        } else {
            $user = User::where('id', $destination_id)->get();
            return view('search.failure', ['user' => $user]);
        }
    }



    //リクエスト許可
    public function permit(Request $request)
    {
        $id = $request->id;
        $result = Requests::find($id)->update($request->all());
        return redirect(route('list'));
    }



    //リクエスト拒否
    public function reject(Request $request)
    {
        $id = $request->id;
        $result = Requests::find($id)->update($request->all());
        return redirect(route('dashboard'));
    }



    //お気に入り
    public function favorite($like_user_id)
    {
        $user_id = Auth::user()->id;
        $query = ['user_id' => $user_id, 'like_user_id' => $like_user_id];
        $data = Likes::where($query)->get();
        if ($data == '[]') {
            //お気に入りボタンをおしていない時
            Likes::create(['user_id' => $user_id, 'like_user_id' => $like_user_id, 'created_at' => now()]);
            return redirect()->route('user_profile', $like_user_id);
        } else {
            //すでにおしている時
            $query = Likes::query();
            $query->where('user_id', $user_id);
            $query->where('like_user_id', $like_user_id);
            $query->delete();
            return redirect()->route('user_profile', $like_user_id);
        }
    }



    //ペアでのチャットルーム
    public function chatroom($request_id)
    {
        $user_id = Auth::user()->id;
        $data = Requests::find($request_id);
        if ($data->user_id == $user_id) {
            $pair = User::find($data->destination_id);
        } else if ($data->destination_id == $user_id) {
            $pair = User::find($data->user_id);
        };
        $messages = User::leftjoin('chats', 'users.id', '=', 'chats.user_id')->where('chat_id', $request_id)->get();
        return view('chat.chatroom')->with(['pair' => $pair, 'room' => $data, 'messages' => $messages]);
    }



    //ペアチャット メッセージ
    public function message(Request $request)
    {
        $result = Chat::create($request->all());
        return redirect(route('chatroom', $request->chat_id));
    }
}
