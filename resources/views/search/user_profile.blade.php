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
    <img src="{{ $user->profile_photo_url  }}" alt="" width="200px">
<h1>名前：{{ $user->name }}</h1>
<h2>年齢：{{ $user->age }}歳</h2>
@if ($user->sex == 1)
<h3>性別：男性</h3>
    @elseif($user->sex == 2)
<h3>性別：女性</h3>
@endif
<h4>{{ $user->profile }}</h4>
</x-app-layout>