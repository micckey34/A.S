<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットリスト') }}
        </h2>
    </x-slot>
<h1>グループごとのホームページ</h1>
<h1>{{ $group->group_name }}へようこそ！</h1>
<h2>参加メンバー</h2>
<h2>チャット</h2>

<form action="{{ route('groups.destroy',$group->id) }}" method="POST">
    @method('delete')
    @csrf
        <button type="submit">退会する</button>
    </form>
</x-app-layout>