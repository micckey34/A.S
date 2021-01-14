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
    <h1>同性の友人を探すところ</h1>
</x-app-layout>
