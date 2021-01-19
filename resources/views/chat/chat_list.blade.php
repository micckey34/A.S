<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットリスト') }}
        </h2>
    </x-slot>

    <section class="section">

    <h1 class="chath1">参加中のグループ</h1>
    <div class="select_data_box">
    @foreach ($groups as $group)
            <a href="{{ route('group_page',$group->id) }}" class="group_data">
                <h1 class="groupname">{{ $group->group_name }}</h1>
            </a>
    @endforeach
    </div>
    <h1 class="chath1">マッチングした相手</h1>
    </section>


</x-app-layout>
