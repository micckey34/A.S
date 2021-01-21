<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\XmlConfiguration\Group;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Groups;
use App\Models\Group_join;
use App\Models\Group_message;
use App\Models\Requests;

class GroupsController extends Controller
{
    //グループ一覧画面
    public function index()
    {
        $groups = Groups::get();
        return view('group.group_list', ['groups' => $groups]);
    }



    //グループ詳細画面
    public function show($id)
    {
        $group = Groups::find($id);
        return view('group.group_profile', ['group' => $group]);
    }




    //グループ作成処理
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['group_name' => 'require', 'information' => 'require',]
        );
        //作成
        $result = Groups::create($request->all());
        //作ったユーザーの加入
        $group = Groups::orderBy('created_at', 'desc')->first();
        $group_id = $group->id;
        $user_id = Auth::user()->id;
        Group_join::insert(['user_id' => $user_id, 'group_id' => $group_id, 'created_at' => now()]);
        //最初のメッセージを送信（エラー防止）
        $id = $group_id;
        $group = Groups::find($id);
        $message = '〜新しいグループが作成されました〜';
        $text = Group_message::create(['user_id' => $user_id, 'group_id' => $group_id, 'message' => $message, 'created_at' => now()]);
        //メンバー、メッセージを取得
        $members = User::join('group_joins', 'users.id', '=', 'group_joins.user_id')->where('group_id', $id)->get();
        $messages = Group_message::join('users', 'Group_messages.user_id', '=', 'users.id')->where('Group_id', $group_id)->get();
        return view('chat.group_page')->with(['group' => $group, 'members' => $members, 'messages' => $messages]);
    }




    //グループ参加処理
    public function join(Request $data)
    {
        $group_id = $data->group_id;
        $user_id = Auth::user()->id;
        Group_join::insert(['user_id' => $user_id, 'group_id' => $group_id, 'created_at' => now()]);
        $id = $group_id;
        $group = Groups::find($id);
        $members = User::join('group_joins', 'users.id', '=', 'group_joins.user_id')->where('group_id', $id)->get();
        $messages = Group_message::join('users', 'Group_messages.user_id', '=', 'users.id')->where('Group_id', $group_id)->get();
        return view('chat.group_page')->with(['group' => $group, 'members' => $members, 'messages' => $messages]);
    }




    //グループ退会処理
    public function destroy($group_id)
    {
        $user_id = Auth::user()->id;
        $query = ['user_id' => $user_id, 'group_id' => $group_id];
        $data = Group_join::where($query);
        $result = $data->delete();
        return view('group.searchgroup');
    }



    //チャットリストページ
    public function list()
    {
        $user_id = Auth::user()->id;
        $group = Group_join::join('groups', 'group_joins.group_id', '=', 'groups.id')->where('user_id', $user_id)->get();
        $query = ['user_id' => $user_id, 'result' => 1];
        $send = User::leftjoin('requests', 'users.id', '=', 'requests.destination_id')->where($query)->get();
        $query2 = ['destination_id' => $user_id, 'result' => 1];
        $receive = User::leftjoin('requests', 'users.id', '=', 'requests.user_id')->where($query2)->get();
        return view('chat.chat_list')->with(['groups' => $group, 'sends' => $send, 'receives' => $receive]);
    }



    //グループ ホームページ
    public function group_page($id)
    {
        $group = Groups::find($id);
        $messages = Group_message::join('users', 'Group_messages.user_id', '=', 'users.id')->where('Group_id', $id)->get();
        $members = User::join('group_joins', 'users.id', '=', 'group_joins.user_id')->where('group_id', $id)->get();
        return view('chat.group_page')->with(['group' => $group, 'members' => $members, 'messages' => $messages]);
    }




    //グループチャット メッセージ
    public function message(Request $request)
    {
        $user_id = Auth::user()->id;
        $group_id = $request->group_id;
        $message = $request->message;
        $text = Group_message::create(['user_id' => $user_id, 'group_id' => $group_id, 'message' => $message, 'created_at' => now()]);
        $id = $group_id;
        $group = Groups::find($id);
        $messages = Group_message::join('users', 'Group_messages.user_id', '=', 'users.id')->where('Group_id', $group_id)->get();
        $members = User::join('group_joins', 'users.id', '=', 'group_joins.user_id')->where('group_id', $id)->get();
        return view('chat.group_page')->with(['group' => $group, 'members' => $members, 'messages' => $messages]);
    }
}
