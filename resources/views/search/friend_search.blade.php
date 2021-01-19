<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('人を探す') }}
        </h2>
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
    @foreach ($users as $user)
    <div class="box">
        <a href="{{ route('user_profile',$user->id) }}">
        <div class="select_data">
            <img src="{{ $user->profile_photo_url  }}" alt="" class="select_data_img">
            <div >
                <h1>{{ $user->name }}</h1>
                <h1>{{ $user->age}}</h1>
                @if($user->sex == 1)
                <h1>男性</h1>
                @elseif($user->sex == 2)
                <h1>女性</h1>
                @endif
            </div>
        </div>
        </a>
    </div>
    @endforeach
</x-app-layout>
