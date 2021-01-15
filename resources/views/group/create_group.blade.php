<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('group_list') }}" :active="request()->routeIs('group_list')">
                {{ __('グループを探す') }}
            </x-jet-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('create_group') }}" :active="request()->routeIs('create_group')">
                {{ __('グループを作る') }}
            </x-jet-nav-link>
        </div>
    </x-slot>
<h1>グループを作るところ</h1>

<form action="{{ route('groups.store') }}" method="POST">
    @csrf
        <p><label for="title">グループ名</label></p>
    <p><input type="text" id="title" name="group_name"></p>
    <p><label for="text">説明欄</label></p>
    <p><textarea name="information" id="text" cols="30" rows="10"></textarea></p>
    <button tyoe="submit">登録する</button>
</form>
</x-app-layout>
