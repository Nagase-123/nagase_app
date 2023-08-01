<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
  <meta content="width=device-width; initial-scale=1.0" name="viewport">
  <meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
  <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
  <link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style>
  .index_top_img{
  	opacity: 0.5;
  }
  </style>
</head>

<body id="body1">
  <div class="box_all">

    <header>
      <div class="icon2">
        <img src="{{asset('images/hasami.png')}}">
      </div>

      <h2 class="title">Chouette</h2>

      <div class="icon1 animation">
        <img src="{{asset('images/hasami.png')}}">
      </div>

      <ul class="nav_box">
        <li class="btn"><a class="btn_a" href="{{url('/top/faq')}}">Faq</a></li>
        <li class="btn"><a class="btn_a" href="{{url('/contact')}}">Contact</a></li>
        <li class="btn"><a class="btn_a" href="{{url('/rogin_rogout/rogin')}}">Rogin</a></li>
      </ul>
    </header>

    <div class="index_top_img animation2">
      <img decoding="async" id="mypic" src="{{asset('images/24275875_s.jpg')}}">
    </div>

    <section class="consept animation2" id="consept">
      <br>
      <h2 class="index">. . . . .Consept. . . . .</h2>
      <p class="sub_msg">コンセプト</p>
      <br>

      <div class="item_box1 res_img1">

        <div class="item_box2 filter animation">
        </div>

        <div class="item_box2 animation2">
          <h2 class="index2">une chouette femme</h2>
          <p class="sub_msg">素敵な女性</p>
          <br>
          <p class="item_position animation">Chuetteはフランス語で「素晴らしい、素敵な」といった意味があります。<br>
            Chuetteでは忙しく美容室に通う時間がないすべての女性の、<br>
            「綺麗になりたい」「素敵な女性になりたい」そんな想いに応えるべく<br>
            訪問美容のサービスをご提供いたします。<br>
            <br>
            <font color="#e7898c">※現在ご利用いただける地域は福岡市のみとなります。</font>
            <br>
          </p>
        </div>
      </div>
    </section>

    <section class="biginner animation2" id="biginner">
      <br>
      <h2 class="index">. . . . .For biginner. . . . .</h2>
      <p class="sub_msg">初めての方へ</p>
      <br>

      <div class="item_box1 res_img2">
        <div class="item_box3">

          <div class="bigineer_msg animation">
            <p>1.初めての方は新規会員登録の上、マイページにログインください</p>
            <p>2.マイページにて、ご希望の美容師をご選択ください</p>
            <p>3.ご希望日時・要望を選択してご予約ください</p>
            <p>4.当日美容師がご予約時間にご自宅へお伺いします</p>
            <p>5.料金をお支払いいただき、施術をお受けください</p>
          </div>
          <br>
          <p id="siginup" class="signup"><a href="{{ url('/top/signup')}}">新規会員登録はこちらから</a></p>
        </div>

        <div class="item_box2 filter2 animation">
        </div>
      </div>
    </section>

    <section class="menue animation2" id="menue">
      <br>
      <h2 class="index">. . . . .Menue. . . . .</h2>
      <p class="sub_msg">メニュー</p>
      <br>
      <p>　ヘアカット　　　  5,000円</p>
      <p>※ヘアセット追加　  3,000円</p>
      <p>※お子様カット　　  1,000円</p>
      <p>※シャンプー追加　  1,000円</p>
      <br>
      <div class="menue_msg">
        <p class="sub_msg2">※カット以外のメニューにつきましては、単体でのご予約は不可となります。<br>
          ヘアセットのみのご希望の場合は、ご予約時にコメントにてご相談ください。</p>
          <br>
          <p class="sub_msg2">シャンプーは美容師持参となります。<br>
            アレルギー等がある場合は事前にコメントにてお知らせください。</p>
          </div>
          <br>

          <p><font color="#e7898c">6：00～21：00まで幅広い時間で予約が可能です</font></p>

        </section>

        <section class="staff animation2" id="staff">
          <br>
          <h2 class="index">. . . . .Staff. . . . .</h2>
          <p class="sub_msg">スタッフ</p>
          <br>
          <p>訪問する美容師は、登録時に美容師免許の提出と審査を行っています</p>

          <div class="staff_box animation">
            <div class="staff_img1"></div>
            <div class="staff_img2"></div>
            <div class="staff_img3"></div>
            <div class="staff_img4"></div>
            <div class="staff_img5"></div>

          </div>
          <ul class="staff_msg">
            <li class="stylist1"> Name…Test stylist1<br>
              Career…13年</li>
              <li class="stylist1"> Name…Test stylist2<br>
                Career…6年</li>
                <li class="stylist1"> Name…Test stylist3<br>
                  Career…10年</li>
                  <li class="stylist1"> Name…Test stylist4<br>
                    Career…8年</li>
                    <li class="stylist1"> Name…Test stylist5<br>
                      Career…5年</li>
                    </ul>

                  </section>

                  <h2 class="heading2"></h2>
                  <footer>
                    <ul class="footer-menu">
                      <li><a href="#biginner">biginners </a></li>
                      <li><a href="#consept">Consept </a></li>
                      <li><a href="#menue">Menue </a></li>
                      <li><a href="#staff">Staff </a></li>
                    </ul>
                    <p class="footer_msg">© The services on this site are fictitious.</p>

                  </footer>

                </div><!-- box_all -->

                <script>

                const pics_src = ["images/24275875_s.jpg","images/24275499_s.jpg","images/24275481_s.jpg","images/24275333_s.jpg"];
                let num = -1;

                function slideshow_timer(){
                  if (num === 2){
                    num = 0;
                  }
                  else {
                    num ++;
                  }
                  document.getElementById("mypic").src = pics_src[num];
                }

                setInterval(slideshow_timer, 5000);

                $(function(){
                	$(window).on('load scroll',function (){
                		$('.animation').each(function(){
                			//ターゲットの位置を取得
                			var target = $(this).offset().top;
                			//スクロール量を取得
                			var scroll = $(window).scrollTop();
                			//ウィンドウの高さを取得
                			var height = $(window).height();
                			//ターゲットまでスクロールするとフェードインする
                			if (scroll > target - height){
                				//クラスを付与
                				$(this).addClass('active');
                			}
                		});
                	});
                });
                //実験用　
                $(function(){
                  $(window).on('load scroll',function (){
                    $('.animation2').each(function(){
                      //ターゲットの位置を取得
                      var target = $(this).offset().top;
                      //スクロール量を取得
                      var scroll = $(window).scrollTop();
                      //ウィンドウの高さを取得
                      var height = $(window).height();
                      //ターゲットまでスクロールするとフェードインする
                      if (scroll > target - height){
                        //クラスを付与
                        $(this).addClass('active2');
                      }
                    });
                  });
                });

              </script>

            </body>
            </html>
