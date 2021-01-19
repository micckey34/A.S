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
            <x-jet-nav-link href="{{ route('favorite_users') }}" :active="request()->routeIs('favorite_users')">
                {{ __('お気に入りのユーザー') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

  <section class="section">
        {{-- テスト --}}
        <div class="select_data">
            <img src="{{ $user->profile_photo_url  }}" alt="" width="300px" class="user_img">
            <div>
            <h1>名前：{{ $user->name }}</h1>
            <h2>年齢：{{ $user->age }}歳</h2>
            @if ($user->sex == 1)
            <h3>性別：男性</h3>
            @elseif($user->sex == 2)
            <h3>性別：女性</h3>
            @endif
        </div>
        <h4 class="comment">{{ $user->profile }}</h4>
       </div>

        <div class="favorite_btn">
            <form action="{{ route('matching.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="destination_id">
            <button type="submit" class="like_button">Chat Request</button>
            </form>

            <a href="{{ route('favorite',$user->id) }}" class="like_button">気になる</a>
        </div>
    </section>

</x-app-layout>

