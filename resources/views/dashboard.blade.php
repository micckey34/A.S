<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
    <section class="home_section_news">
        <h3>お知らせ</h3>
        <ul class="news_list">
            <li>○○さんからいいねが届いています</li>
            <li>新しいメッセージがあります</li>
        </ul>
            <a href="{{ route('profile.show') }}"><h3>プロフィール情報</h3></a>
         <div>
         </div>


        <h3>参加中のグループ</h3>
        {{-- 通知の表示 --}}
        @if ($requests == '')
        <p>新しい通知はございません</p>
        @else
        <p class="home_section_p">新しいメッセージがあります</p>
            @foreach ($requests as $request)
                <p>{{ $request->name }}さんからリクエストが来ています！</p>
                <form action="{{ route('permit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $request->id }}">
                    <input type="hidden" name="result" value="1">
                    <button>受け入れる</button>
                </form>
                <form action="{{ route('reject') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $request->id }}">
                    {{-- <input type="text" name="id" value="{{ $request->id }}">
                    <input type="text" name="id" value="{{ $request->user_id }}"> --}}
                    <input type="hidden" name="result" value="2">
                    <button>断る</button>
                </form>
            @endforeach
        @endif

        <h3>最近やり取りを行ったお相手</h3>
    </section>


</x-app-layout>
