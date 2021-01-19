<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $group->group_name }}
        </h2>
    </x-slot>
<h1>{{ $group->group_name }}へようこそ！</h1>
<h2>参加メンバー</h2>
@foreach ($members as $member)
<p>{{ $member->name }}</p>
<img src="{{ $member->profile_photo_url }}" alt="" width="200px">  
@endforeach
<h2>チャット</h2>
<div class="output">
@foreach ($messages as $message)
    <p>{{ $message->message }}</p>
@endforeach
</div>
<form action="{{ route('message') }}" method="POST">
    @csrf
    <input type="hidden" name="group_id" value="{{ $group->id }}">
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <button type="submit">送信</button>
</form>

<form action="{{ route('groups.destroy',$group->id) }}" method="POST">
    @method('delete')
    @csrf
        <button type="submit">退会する</button>
    </form>
</x-app-layout>