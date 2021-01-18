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
    @foreach ($users as $user)
    <style>
        .box{
            border: 2px solid black;
            width: 200px;
            margin-bottom: 1rem;
        }
    </style>
    <div class="box">
        <a href="{{ route('user_profile',$user->id) }}">
            <h1>{{ $user->name }}</h1>
            <h1>{{ $user->age}}</h1>
            @if($user->sex == 1)
            <h1>男性</h1>
            @elseif($user->sex == 2)
            <h1>女性</h1>
            @endif
        </a>
    </div>
    @endforeach
    
    {{-- テスト --}}
</x-app-layout>
