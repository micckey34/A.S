<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
    <section class="home_section_news">
            @if ($requests == '[]')
            <a href="{{ route('profile.show') }}" class="notice"><p class="n">プロフィールを更新してマッチング率をアップしましょう♪</p></a>
            @else
            <label for="check" class="notice"><p class="n">★新しいお知らせが届いています👇</p></label>
            <input type="checkbox" id="check" class="check">
            <div class="notice_list">
                @foreach ($requests as $request)
                <div class="select">
                    <p><a href="{{ route('user_profile',$request->user_id) }}">{{ $request->name }}さんからリクエストが来ています！</a></p>
                    <form action="{{ route('permit') }}" method="POST">
                    @csrf
                        <input type="hidden" name="id" value="{{ $request->id }}">
                        <input type="hidden" name="result" value="1">
                        <button class="select_btn">受け入れる</button>
                    </form>
                    <form action="{{ route('reject') }}" method="POST">
                    @csrf
                        <input type="hidden" name="id" value="{{ $request->id }}">
                        <input type="hidden" name="result" value="2">
                        <button class="select_btn b">断る</button>
                    </form>
                </div>
                @endforeach
            </div>
            @endif
        <div class="home_box">
            <div class="home_content_box">
                <div class="home_content c1"></div>
                <a href="{{ route('lover_search') }}"><div class="home_content c2"><p>恋人を探す</p></div></a>
                <div class="home_content c3"></div>
            </div>
            <div  class="home_content_box">
                <a href="{{ route('friend_search') }}"><div class="home_content c4"><p>友人を探す</p></div></a>
                <div class="home_content c5"></div>
                <a href="{{ route('group_list') }}"><div class="home_content c6"><p>仲間を探す</p></div></a>
            </div>
        </div>
    </section>
</x-app-layout>
