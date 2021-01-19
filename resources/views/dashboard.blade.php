<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
    <section class="home_section_news">
        <h3>お知らせ</h3>
        <ul class="news_list">
            <li>○○さんからいいねが届いています</li>
            <li>○○グループへの参加が承認されました</li>
            <li>新しいメッセージがあります</li>
        </ul>

        <h3>プロフィール情報</h3>
         <div class="profile">
         </div>
    </section>
    <section class="home_section">
        <h3>参加中のグループ</h3>
        {{-- 通知の表示 --}}
        <p class="home_section_p">新しいメッセージがあります</p>
        <div class="select_data_box">

            {{-- グループのサムネを表示 --}}
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>group1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>group1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>group1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>group1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>group1</p>
            </div>
            {{-- 5件 --}}


        </div>
    </section>
    <section class="home_section">
        <h3>最近やり取りを行ったお相手</h3>
        <p class="home_section_p">新しいメッセージがあります</p>
        <div class="select_data_box">

            {{-- 相手のサムネと名前を表示 --}}
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>match1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>match1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>match1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>match1</p>
            </div>
            <div class="select_data">
                <img src="" alt="" class="select_data_img">
                <p>match1</p>
            </div>
            {{-- 5件 --}}

        </div>
    </section>


</x-app-layout>
