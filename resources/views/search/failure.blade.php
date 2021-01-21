<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('search.search') }}" :active="request()->routeIs('search.search')">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('人を探す') }}
            </h2>
        </x-jet-nav-link>
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
            <x-jet-nav-link href="{{ route('favorite_search') }}" :active="request()->routeIs('favorite_search')">
                {{ __('お気に入りのユーザー') }}
            </x-jet-nav-link>
        </div>
    </x-slot>
    <section class="section">
    @foreach($user as $usr)
        <h1>すでに{{ $usr->name }}さんにリクエストを送っています。
            <br>一人に送れるリクエストは一度までです。
        </h1>
        <a href="{{ route('user_profile',$usr->id) }}">戻る</a>
    @endforeach
    </section>
</x-app-layout>