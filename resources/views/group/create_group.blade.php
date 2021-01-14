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
</x-app-layout>
