<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Requests;
use App\Models\Likes;

use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class MatchingController extends Controller
{

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
        $users = User::where('sex', $sex)->get();
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
        $users = User::where('sex', $sex)->get();
        return view('search.search', ['users' => $users]);
    }

    //ユーザー詳細画面
    public function profile($id)
    {
        $user = User::find($id);
        return view('search.user_profile', ['user' => $user]);
    }

    //ホーム画面
    public function index()
    {
        $user_id = Auth::user()->id;
        $query = ['destination_id' => $user_id, 'result' => 0];
        $data = Requests::select('requests.id', 'users.name', 'users.id as user_id')->join('users', 'requests.user_id', '=', 'users.id')->where($query);
        $request = $data->get();
        return view('dashboard', ['requests' => $request]);
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


    //リクエスト送信
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $destination_id =  $request->destination_id;
        Requests::insert(['user_id' => $user_id, 'destination_id' => $destination_id, 'created_at' => now()]);
        return redirect()->route('user_profile', $destination_id);
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
        // ddd($result);
        return redirect(route('dashboard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //お気に入り
    public function favorite($like_user_id)
    {
        $user_id = Auth::user()->id;

        $data = Likes::where('user_id', $user_id);
        $data = Likes::where('like_user_id', $like_user_id);
        $id = $data->get('id');
        // ddd($id);

        if (!isset($id[0])) {
            Likes::create(['user_id' => $user_id, 'like_user_id' => $like_user_id, 'created_at' => now()]);
            return redirect()->route('user_profile', $like_user_id);
        } else {
            $query = Likes::query();
            $query->where('user_id', $user_id);
            $query->where('like_user_id', $like_user_id);
            $query->delete();
            return redirect()->route('user_profile', $like_user_id);
        }
    }


    //ペアでのチャットルーム
    public function chatroom($request_id, $user_id)
    {

        return view('chat.chatroom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
