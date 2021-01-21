<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $group->group_name }}
        </h2>
    </x-slot>

        <section class="home_section_news">
            <h1 class="chath1_red">{{ $group->group_name }}へようこそ！</h1>
            <div class="chat_style">
                <div class="private">
                    <h2>参加メンバー</h2>
                    <div class="chatmember">
                        @foreach ($members as $member)
                        <div class="select_data">
                            <img src="{{ $member->profile_photo_url }}" alt="" class="chat_img">
                            <p class="username">{{ $member->name }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="private">
                    <h2>チャット</h2>
                    <div>
                        <div  class="output">
                            @foreach ($messages as $message)
                            <div class="group_chat_text">
                                <img src="{{ $message->profile_photo_url }}" alt="" width="30px" height="30px">
                                <div class="balloon1-left">
                                    <p>{{ $message->name }}：{{ $message->message }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            <form action="{{ route('message') }}" method="POST">
                                @csrf
                                <input type="hidden" name="group_id" value="{{ $group->id }}">
                                <textarea name="message" id="" cols="30" rows="3"></textarea>
                                <button type="submit" class="chath1_red">送信</button>
                            </form>
                        </div>
                 </div>
        </div>

                <form action="{{ route('groups.destroy',$group->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="withdrawal">退会する</button>
                </form>
        </section>
</x-app-layout>
