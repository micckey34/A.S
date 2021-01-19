<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\XmlConfiguration\Group;

use Illuminate\Support\Facades\Auth;
use App\Models\Groups;
use App\Models\Group_join;
use App\Models\Group_message;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::get();
        return view('group.group_list', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['group_name' => 'require', 'information' => 'require',]
        );
        $result = Groups::create($request->all());

        $group = Groups::orderBy('created_at', 'desc')->first();
        $group_id = $group->id;
        $user_id = Auth::user()->id;
        Group_join::insert(['user_id' => $user_id, 'group_id' => $group_id, 'created_at' => now()]);
        $id = $group_id;
        $group = Groups::find($id);
        $members = Group_join::join('users', 'group_joins.user_id', '=', 'users.id')->where('group_id', $id)->get();
        $messages = Group_message::where('Group_id', $group_id);
        return view('chat.group_page', ['group' => $group], ['members' => $members], ['messages' => $messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Groups::find($id);
        return view('group.group_profile', ['group' => $group]);
    }

    public function join(Request $data)
    {
        $group_id = $data->group_id;
        $user_id = Auth::user()->id;
        Group_join::insert(['user_id' => $user_id, 'group_id' => $group_id, 'created_at' => now()]);
        $id = $group_id;
        $group = Groups::find($id);
        $messages = Group_message::where('Group_id', $group_id);
        $members = Group_join::join('users', 'group_joins.user_id', '=', 'users.id')->where('group_id', $id)->get();
        return view('chat.group_page', ['group' => $group], ['members' => $members], ['messages' => $messages]);
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
    public function destroy($group_id)
    {
        $user_id = Auth::user()->id;
        $query = ['user_id' => $user_id, 'group_id' => $group_id];
        $data = Group_join::where($query);
        $result = $data->delete();
        return view('group.searchgroup');
    }

    public function list()
    {
        $user_id = Auth::user()->id;
        $group = Group_join::join('groups', 'group_joins.group_id', '=', 'groups.id')->where('user_id', $user_id)->get();
        return view('chat.chat_list', ['groups' => $group]);
    }

    public function group_page($id)
    {
        $group = Groups::find($id);
        $messages = Group_message::where('Group_id', $id);
        $members = Group_join::join('users', 'group_joins.user_id', '=', 'users.id')->where('group_id', $id)->get();
        return view('chat.group_page', ['group' => $group], ['members' => $members], ['messages' => $messages]);
    }

    public function message(Request $request)
    {
        $user_id = Auth::user()->id;
        $group_id = $request->group_id;
        $message = $request->message;
        $text = Group_message::create(['user_id' => $user_id, 'group_id' => $group_id, 'message' => $message, 'created_at' => now()]);

        $id = $group_id;
        $group = Groups::find($id);
        $messages = Group_message::join('users', 'Group_messages.user_id', '=', 'users.id')->where('Group_id', $group_id)->get();
        ddd($messages);
        $members = Group_join::join('users', 'group_joins.user_id', '=', 'users.id')->where('group_id', $id)->get();
        return view('chat.group_page', ['group' => $group], ['members' => $members], ['messages' => $messages]);
    }
}
