<x-app-layout>
    <x-slot name="header">
    <x-jet-nav-link href="{{ route('group_list') }}" :active="request()->routeIs('group_list')">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('コミュニティを探す') }}
        </h2>
        </x-jet-nav-link>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('create_group') }}" :active="request()->routeIs('create_group')">
                {{ __('コミュニティを作る') }}
            </x-jet-nav-link>
        </div>
    </x-slot>
    <section class="section">
        <div class="select_group">
            <h1>{{ $group->group_name }}</h1>
            <h4 class="comment">{{ $group->information }}</h4>
            <div class="favorite_btn">
                <form action="{{ route('group_join') }}" method="POST">
                    @csrf
                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                    <button type="submit" class="like_button">コミュニティに参加</button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
