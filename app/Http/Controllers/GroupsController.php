<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Groups;
use App\Models\Group_join;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use PHPUnit\TextUI\XmlConfiguration\Group;


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
        return view('chat.group_page', ['group' => $group]);



        return view('group.searchgroup');
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
        return view('chat.group_page', ['group' => $group]);
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
        $data = Group_join::where('user_id', $user_id);
        $data = Group_join::where('group_id', $group_id)->delete();
        return view('group.searchgroup');
    }
}
