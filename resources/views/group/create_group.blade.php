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
    <section class="home_section_news">
        <div class="create_form">
            <form action="{{ route('groups.store') }}" method="POST">
                @csrf
                <p><label for="title">コミュニティの名前</label></p>
                <p><input type="text" id="title" name="group_name"></p>
                <p><label for="text">説明欄</label></p>
                <p><textarea name="information" id="text" cols="50" rows="10"></textarea></p>
                <button tyoe="submit" class="button">登録する</button>
            </form>
        </div>
    </section>
</x-app-layout>
