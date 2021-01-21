<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットリスト') }}
        </h2>
    </x-slot>
    <section class="section">
    <h1 class="chath2_red">参加中のコミュニティ</h1>
    <div class="select_data_box">
        @foreach ($groups as $group)
            <a href="{{ route('group_page',$group->id) }}" class="group_data">
                <h1 class="groupname">{{ $group->group_name }}</h1>
            </a>
        @endforeach
    </div>
    <h1 class="chath2_red">マッチングした相手</h1>
    <div class="private_chat">
        <div class="private">
            <p>リクエストを送った相手</p>
            <div  class="private_chat_box">
                @foreach ($sends as $send)
                <a href="{{ route('chatroom',$send->id) }}">
                    <div class="private_chat_select">
                        <img src="{{ $send->profile_photo_url  }}" alt="" class="select_data_img">
                        <div>
                            <p class="username">{{ $send->name }}</p>
                            <p class="username">{{ $send->age}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="private">
            <p>リクエストを受けた相手</p>
            <div class="private_chat_box">
                @foreach ($receives as $receive)
                <a href="{{ route('chatroom',$receive->id,) }}">
                    <div  class="private_chat_select">
                        <img src="{{ $receive->profile_photo_url  }}" alt="" class="select_data_img">
                        <div>
                            <p class="username">{{ $receive->name }}</p>
                            <p class="username">{{ $receive->age}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
