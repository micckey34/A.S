<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
    <section class="home_section_news">
        <div class="home_box">
            <div class="home_content_box">
                <div class="home_content c1"></div>
                <a href="{{ route('lover_search') }}"><div class="home_content c2"><p>恋人を探す</p></div></a>
                <div class="home_content c3"></div>
            </div>

            <div  class="home_content_box">
                <a href="{{ route('friend_search') }}"><div class="home_content c4"><p>友人を探す</p></div></a>
                <div class="home_content c5"></div>
                <a href="{{ route('group_list') }}"><div class="home_content c6"><p>仲間を探す</p></div></a>
            </div>
        </div>

    </section>


</x-app-layout>
