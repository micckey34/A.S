<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットリスト') }}
        </h2>
    </x-slot>

    <section class="section">

    <h1 class="chath1">参加中のグループ</h1>
    <div class="select_data_box">
        @foreach ($groups as $group)
            <a href="{{ route('group_page',$group->id) }}" class="group_data">
                <h1 class="groupname">{{ $group->group_name }}</h1>
            </a>
        @endforeach
    </div>
    <h1>マッチングした相手</h1>
    <div class="test">
        <style>
            .test{
                display: flex;
                width: 80%;
                margin: 0 auto;
            }
            .private_chat{
                width: 50%
            }
        </style>
        <div class="private_chat">
            <p>リクエストを送った相手</p>
            @foreach ($sends as $send)
                <a href="{{ route('chatroom',$send->id) }}">{{ $send->name }}</a>
            @endforeach
        </div>
        <div class="private_chat">
            <p>リクエストを受けた相手</p>
            @foreach ($receives as $receive)
                <a href="{{ route('chatroom',$receive->id,) }}">{{ $receive->name }}</a>
            @endforeach
        </div>
    </div>
    
    
</x-app-layout>
