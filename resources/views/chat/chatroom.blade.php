<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットルーム') }}
        </h2>
    </x-slot>

   <section class="home_section_news">
        <h1 class="chath2_red">{{ $pair->name }}とのチャットルーム</h1>
        <div class="chat_style">
            <div class="private">
                <div class="private_chat_select">
                    <img src="{{ $pair->profile_photo_url }}" alt="" width="300px" class="user_img">
                    <div>
                        <p class="username">{{ $pair->name }}</p>
                        <p class="username">{{ $pair->age }}</p>
                    </div>
                 </div>
                <p class="private_chat_comment">{{ $pair->profile }}</p>
            </div>

            <div class="private">
                <div  class="output">
                    @foreach ($messages as $message)
                    <div class="group_chat_text">
                        <img src="{{ $message->profile_photo_url }}" alt="" width="30px" height="30px">
                        <div class="balloon1-left">
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                    @endforeach
                 </div>
                    <form action="{{ route('chat_message') }}" method="POST">
                    @csrf
                    <input type="hidden" name="chat_id" value="{{ $room->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <textarea type="text" name="message" required></textarea>
                    <button type="submit" class="chath1_red">送信</button>
                    </form>
            </div>
        </div>

     </section>



</x-app-layout>
