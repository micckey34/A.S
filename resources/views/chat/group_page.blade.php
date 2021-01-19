<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $group->group_name }}
        </h2>
    </x-slot>
        <section class="home_section_news">
            <h1 class="chath1_red">{{ $group->group_name }}へようこそ！</h1>
            <h2>参加メンバー</h2>
            <div class="select_data_box">
            @foreach ($members as $member)
            <div class="select_data">
            <p class="username">{{ $member->name }}</p>
            <img src="{{ $member->profile_photo_url }}" alt="" class="select_data_img">
            </div>
            @endforeach
            </div>

            <h2>チャット</h2>
            <div class="output">
            @foreach ($messages as $message)
                <p>{{ $message->message }}</p>
            @endforeach
            </div>
            <form action="{{ route('message') }}" method="POST">
                @csrf
                <input type="hidden" name="group_id" value="{{ $group->id }}">
                <textarea name="message" id="" cols="30" rows="10"></textarea>
                <button type="submit">送信</button>
            </form>

            <form action="{{ route('groups.destroy',$group->id) }}" method="POST">
                @method('delete')
                @csrf
                    <button type="submit">退会する</button>
                </form>
        </section>
</x-app-layout>
