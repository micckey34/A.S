<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('group_list') }}" :active="request()->routeIs('group_list')">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループを探す') }}
                </h2>
        </x-jet-nav-link>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('create_group') }}" :active="request()->routeIs('create_group')">
                {{ __('グループを作る') }}
            </x-jet-nav-link>
        </div>
    </x-slot>
        <section class="home_section_news">
            <div class="select_data_box">
                {{-- グループ一覧 --}}
                @foreach ($groups as $group)

                <a href="{{ route('group_profile',$group->id) }}" class="group_data">
                <h1 class="groupname">{{ $group->group_name }}</h1>
                </a>

                @endforeach
            </div>
        </section>

</x-app-layout>
