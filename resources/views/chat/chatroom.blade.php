<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('チャットルーム') }}
        </h2>
    </x-slot>

    <section class="section">

        <h1>{{ $pair->name }}とのチャットルーム</h1>

    </section>
</x-app-layout>
