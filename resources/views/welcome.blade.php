<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Machibito</title>
        <link rel="icon" href="machibito.ico">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        {{-- S<link rel="stylesheet" href="css/app.css"> --}}
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/welcome.css">

    </head>
    <body class="antialiased">
       <header>
            {{-- <div class="login">
                    <a href="{{ route('login') }}" class="text-gray-700 underline">ログイン</a>
                    <a href="{{ route('register') }}" class="text-gray-700 underline">新規登録</a>
             </div> --}}
             <div class="summary">
                <img src="image/machibitologo.png" alt="" width="330px">
                <div>
                    <h1 class="text_red size18">Machibitoはあなたの大切な待ち人を見つけるための<br>
                        福岡県限定マッチングアプリです</h1>
                    <div class="top_register_btn">
                        <p class="text_red">安心の登録無料♪</p>
                        <div class="btn">
                            <a href="{{ route('login') }}" ><p class="text_red size24">ログイン</p></a>
                            <a href="{{ route('register') }}" ><p class="text_red size24">新規登録</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="top_section">
            <div>
                <h2 class="text_red size18 secction_title">Machibitoの魅力はグループ交際から始められる所</h2>
                <p class="size12 subtitle">「いろんな人と話してみた方がいいと思うけど、はじめはどんな人か分からないから少し怖いな」</p>
                <p class="size12 subtitle">「同時に色んな人とやり取りするのって疲れちゃうから、アプリ始めたけどすぐやめちゃった」</p>
                <p class="size12 subtitle">あなたにもそんな経験ありませんか？</p>
                <p class="size12 text">従来のマッチングアプリは1対1が主流のなか、Machibitoは趣味友達を目的としたグループから交際に発展することが出来ちゃうアプリです。</p>
                <p class="size12">恋愛だけが目的じゃないから、相談できる友人も出来る♪ゆっくり信頼関係を築きたい方にはとってもおすすめ♡</p>
            </div>
            <h3 class="size18 secction_title" >今注目の検索ワード🔍</h3>
            <div class="sarch_box">
                {{-- 上位検索ワードを表示 --}}
                <div class="sarch">恋人探し</div>
                <div class="sarch">友人探し</div>
                <div class="sarch">仲間探し</div>
                <div class="sarch">福岡</div>
            </div>
        </section>
        <section class="profile_section">
        <h2 class="size18 secction_title">プロフィールを更新して、気の合う人たちと交流してみましょう！</h2>
            <div class="profile_point">
                <div>
                    <div class="profile_photo">
                        <img src="image/machiko.png" alt="" width="250px">
                        <p class="profile_text1">まちこ<br>女性<br>23歳</p>
                    </div>
                    <div class="profile_photo">
                        <p class="profile_text2">参加グループ</p>
                        <img src="image/グループイメージ.png" alt="" class="profile_img">
                    </div>
                    <div class="profile_photo">
                        <p class="profile_text">目的</p>
                        <p class="profile_text">恋人探し</p>
                        <p class="profile_text">友人探し</p>
                    </div>
                    <p profile_text>人と話すのが大好きなので、お友達募集中です！<br>趣味はアニメを見ることで、今期放送中のは大体チェック<br>済みです♪</p>
                </div>

                <div class="explain_box">
                    <div class="profile_explain">
                        <h3 class="text_red size12">プロフィール作成のポイントその①</h3>
                        <p class="subtitle">写真を登録！</p>
                        <p>たくさんの写真を載せると、あなたの雰囲気がお相手 にも伝わりやすくてGood!<br>いいねやマッチング率が向上します♪</p>
                        <p>公開範囲を決めて、グループ内だけでの公開もOK♡</p>
                    </div>
                    <div class="profile_explain">
                        <h3 class="text_red size12">プロフィール作成のポイントその②</h3>
                        <p class="subtitle">自己紹介文には興味のあることを沢山書こう！</p>
                        <p> フリーワード検索では、自己紹介文の中にあるキーワードをもとに表示されます♪</p>
                        <p>同じ趣味の人や好みが似ている人とのマッチング率を向上させましょう♡</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="sarch_section">
            <h2 class="size18 secction_title">目的別の検索やキーワード検索をしてみましょう！</h2>
            <div class="backff7">
                    <div class="sarch_section_box">
                    <div>
                        <div class="sarch_text">
                            <h3 class="text_red size12">検索のポイントその①</h3>
                            <p class="subtitle">プロフィールに登録されている目的で<br>検索！</p>
                            <p>目的に応じたお相手探しは認識のズレ<br>が少なく、マッチング率向上に繋がり<br>ます♡</p>
                        </div>
                        <div class="sarch_text">
                            <h3 class="text_red size12">検索のポイントその②</h3>
                            <p class="subtitle">興味のあるグループに積極的に参加！</p>
                            <p>ひとつの出会いがまた次の素敵な出会<br>いに繋がっていきますよ♪気の合う人<br>を集めた新たなグループを作ってみても<br>いいかも！</p>
                        </div>
                    </div>
                    <div class="sarch_img1">
                        <img src="image/恋人と出会う.png" alt="">
                        <p>恋人と出会う</p></a>
                    </div>
                    <div class="sarch_img2">
                        <img src="image/友人と出会う.png" alt="">
                        <p>友人と出会う</p></a>
                    </div>
                    <div class="sarch_img3">
                        <img src="image/グループを見つける.png" alt="">
                        <p>グループを見つける</p></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="chat_section">
            <h2 class="size18 secction_title">いいねを送って、チャットやメッセージで交流しましょう！</h2>
            <div class="chat_text_box">
                <div class="chat_text">
                   <h3 class="text_red">お相手やグループの画像の右下にある★マークを押すと、いいねが<br>送られます。</h3>
                    <p class="subtitle">自分に送られたいいねはプロフィールページから確認できます。</p>
                    <p>自分からもいいねを返すとマッチングが成立し、メッセージのやり取りが<br>可能になります♪</p>
                </div>
                <img src="image/いいね.png" alt="" width="200px" height="150px">
            </div>
            <div class="chat_text_box">
                <div class="circle">
                    <div class="circle_text">
                        <p>月額わずか500円！
                        <p>先着１万名様まで</p>
                        <p>永久無料で全ての機能を</p>
                        <p>ご利用頂けます！</p>
                    </div>
                </div>
                <div class="chat_text">
                   <h3 class="text_red">充実したチャット機能を使ってオンラインでも楽しもう。</h3>
                    <p class="subtitle">ビデオチャット機能を使えばオンライン飲み会の開催も出来ちゃう！</p>
                    <p>有料会員になると、基本機能に加えてビデオチャット機能や、コンサルタント<br>機能、ブログ機能等が利用できるようになります♪</p>
                </div>
            </div>
        </section>
        <div class="fin_text">
        <h2 class="size18 secction_title">さあ、まずは無料登録から！素敵な出会いが待っています！</h2>
        <a href="{{ route('register') }}" ><p class="text_red size24">新規登録</p></a>
        </div>

        <footer><p>こちらのサイトは開発練習のための架空のサービスです。</p></footer>









    </body>
</html>
