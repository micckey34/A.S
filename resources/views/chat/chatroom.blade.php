<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットルーム') }}
        </h2>
    </x-slot>

    <section class="section">

        <h1>{{ $pair->name }}とのチャットルーム</h1>
        <div class="output">
        @foreach ($messages as $message)
            <p>{{ $message->name }}：{{ $message->message }}</p>    
        @endforeach
        </div>
        <div>
            <form action="{{ route('chat_message') }}" method="POST">
                @csrf
                <input type="hidden" name="chat_id" value="{{ $room->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <textarea type="text" name="message" required></textarea>
                <button type="submit">送信</button>
            </form>
        </div>
    </section>
</x-app-layout>