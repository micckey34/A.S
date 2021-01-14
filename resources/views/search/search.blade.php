<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('friend_search') }}" :active="request()->routeIs('friend_search')">
                {{ __('友達を探す') }}
            </x-jet-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('lover_search') }}" :active="request()->routeIs('lover_search')">
                {{ __('恋人を探す') }}
            </x-jet-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('favorite_users') }}" :active="request()->routeIs('favorite_users')">
                {{ __('お気に入りのユーザー') }}
            </x-jet-nav-link>
        </div>
    </x-slot>
    <h1>人を探すトップページ</h1>
    {{-- テスト --}}
    <p>--test--</p>
    <a href="{{ route('user_profile',$users->id) }}">
        <h1>{{ $users->name }}</h1>
        <h1>{{ $users->age}}</h1>
        @if($users->sex == 1)
        <h1>男性</h1>
        @elseif($users->sex == 2)
        <h1>女性</h1>
    </a>
    @endif
    {{-- テスト --}}
</x-app-layout>
