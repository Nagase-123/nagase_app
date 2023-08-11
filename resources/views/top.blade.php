<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>chouette 福岡市限定訪問美容サービス</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
  <!-- Core theme CSS (includes Bootstrap)-->
    @if(app('env') == 'production')
    <link href="{{ secure_asset('css/styles.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @endif
  <!-- jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body ontouchstart="">
  <!-- Navigation-->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><i class="bi bi-scissors m-auto text-primary"></i>Chouette
        <i class="bi bi-scissors m-auto text-primary"></i></a>
        <a class="btn btn-primary" href="{{ url('/login_logout/login')}}">ログイン</a>
      </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
      <div class="container position-relative">
        <div class="row justify-content-center">
          <div class="col-xl-6 animation3">
            <div class="text-center text-white">
              <!-- Page heading-->
              <h1 class="mb-5 heading-msg">une chouette femme</h1>
              <a class="btn btn-primary" href="{{ url('/top/signup') }}">新規会員登録はこちらから</a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center animation">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex"><i class="bi bi-signpost-2 m-auto text-primary"></i></div>
              <h3>Information</h3>
              <p class="lead mb-0">chouetteは福岡市限定の訪問美容サービスです<br>
                <a href="#biginner">ご利用方法はこちらをご覧ください</a></p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex"><i class="bi bi-question-circle m-auto text-primary"></i></div>
                <h3>FAQ</h3>
                <p class="lead mb-0"><a href="{{ url('/top/faq') }}">よくある質問はこちらから</a></p>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                <div class="features-icons-icon d-flex"><i class="bi bi-envelope m-auto text-primary"></i></div>
                <h3>Contact</h3>
                <p class="lead mb-0"><a href="{{url('/contact/contact')}}">お問い合わせはこちらから</a><br>
                  ※美容師の方は事前の審査がございます</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- メイン-->
        <section class="showcase">

          <div class="container-fluid p-0">
            <div class="row g-0" id="consept">
              <img class="col-lg-6 order-lg-2 text-white showcase-img animation2" src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
              <div class="col-lg-6 order-lg-1 my-auto showcase-text animation">
                <h2 class="caption-msg">Consept</h2>
                <p class="lead mb-0">Chuetteはフランス語で「素晴らしい、素敵な」といった意味があります。<br>
                  Chuetteでは忙しく美容室に通う時間がないすべての女性の、
                  「綺麗になりたい」「素敵な女性になりたい」そんな想いに応えるべく
                  訪問美容のサービスをご提供いたします。<br><span class="span-color">※現在ご利用いただける地域は福岡市のみとなります。</span></p>
                </div>
              </div>

              <div class="row g-0" id="biginner">
                <img class="col-lg-6 text-white showcase-img animation2" src="{{ asset('assets/img/bg-showcase-2.jpg') }}">
                <div class="col-lg-6 my-auto showcase-text animation">
                  <h2 class="caption-msg">For biginner</h2>
                  <p class="lead mb-0">1.初めての方は新規会員登録の上、マイページにログインください<br>
                    2.マイページにて、ご希望の美容師をご選択ください<br>
                    3.ご希望日時・要望を選択してご予約ください<br>
                    4.当日美容師がご予約時間にご自宅へお伺いします<br>
                    5.料金をお支払いいただき、施術をお受けください</p>
                    <br>
                    <a class="btn btn-primary" href="{{ url('/top/signup') }}">新規会員登録はこちらから</a>
                  </div>
                </div>
                <div class="row g-0" id="menue">
                  <img class="col-lg-6 order-lg-2 text-white showcase-img animation2" src="{{ asset('assets/img/bg-showcase-3.jpg') }}">
                  <div class="col-lg-6 order-lg-1 my-auto showcase-text animation">
                    <h2 class="caption-msg">Menue</h2>
                    <p class="lead mb-0">
                      ヘアカット　　　  5,000円<br>
                      ※ヘアセット追加　  3,000円<br>
                      ※お子様カット　　  1,000円<br>
                      ※シャンプー追加　  1,000円<br>
                      <br>
                      <span class="span-color">※カット以外のメニューにつきましては、単体でのご予約は不可となります。<br>
                        ヘアセットのみのご希望の場合は、ご予約時にコメントにてご相談ください。</span>
                      </p>
                    </div>
                  </div>
                </div>
              </section>

              <!-- Testimonials-->
              <section class="testimonials text-center bg-light animation" id="staff">
                <div class="container">
                  <h2 class="mb-5 caption-msg">Popular staff</h2>
                  <h4 class="mb-5">訪問美容師は、登録時に美容師免許の提出と審査を行っています</h2>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                          <img class="img-fluid rounded-circle mb-3 img-opacity" src="{{ asset('assets/img/testimonials-1.jpg') }}" alt="..." />
                          <h5>Yamada T</h5>
                          <p class="font-weight-light mb-0">美容師歴12年目です！<br>
                            骨格や雰囲気に合わせた似合わせカットが得意です。<br>
                            何が似合うか分からない方などお気軽にご相談ください。</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3 img-opacity" src="{{ asset('assets/img/testimonials-2.jpg') }}" alt="..." />
                            <h5>Suzuki M</h5>
                            <p class="font-weight-light mb-0">美容師歴６年目です。<br>
                              女性目線の柔らかいナチュラルスタイルが得意です。お話し大好きです。</p>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                              <img class="img-fluid rounded-circle mb-3 img-opacity" src="{{ asset('assets/img/testimonials-3.jpg') }}" alt="..." />
                              <h5>Saitou W</h5>
                              <p class="font-weight-light mb-0">美容師歴10年目です。<br>
                                お一人お一人の大切な髪を上質な仕上がりにします。
                                忙しい朝でもセットしやすい髪形や、簡単なアレンジ等アドバイスさせていただきます。</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>

                      <!-- Call to Action-->
                      <section class="call-to-action text-white text-center animation3" id="signup">
                        <div class="container position-relative">
                          <div class="row justify-content-center">
                            <div class="col-xl-6">
                              <h2 class="mb-4 nav-signup">Click here to register as a new member.</h2>
                              <div class="col-auto">
                                <a class="btn btn-primary" href="{{ url('/top/signup') }}">新規会員登録はこちらから</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>

                      <!-- Footer-->
                      <footer class="footer bg-light">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                              <ul class="list-inline mb-2">
                                <li class="list-inline-item"><a href="#biginner">biginners </a></li>
                                <li class="list-inline-item">⋅</li>
                                <li class="list-inline-item"><a href="#consept">Consept</a></li>
                                <li class="list-inline-item">⋅</li>
                                <li class="list-inline-item"><a href="#menue">Menue</a></li>
                                <li class="list-inline-item">⋅</li>
                                <li class="list-inline-item"><a href="#staff">Staff</a></li>
                              </ul>
                              <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
                            </div>
                            <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                              <ul class="list-inline mb-0">
                                <li class="list-inline-item me-4">
                                  <a href="{{ url('https://twitter.com/xx_123_chouette') }}"><i class="bi-twitter fs-3"></i></a>
                                </li>
                                <li class="list-inline-item">
                                  <a href="{{ url('https://www.instagram.com/xx_123_chouette/') }}"><i class="bi-instagram fs-3"></i></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </footer>
                      <!-- Bootstrap core JS-->
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                      <!-- Core theme JS-->
                      <script src="{{ asset('js/scripts.js') }}"></script>
                      <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                      <!-- * *                               SB Forms JS                               * *-->
                      <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
                      <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                      <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                      <script>

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

                      $(function(){
                        $(window).on('load scroll',function (){
                          $('.animation3').each(function(){
                            //ターゲットの位置を取得
                            var target = $(this).offset().top;
                            //スクロール量を取得
                            var scroll = $(window).scrollTop();
                            //ウィンドウの高さを取得
                            var height = $(window).height();
                            //ターゲットまでスクロールするとフェードインする
                            if (scroll > target - height){
                              //クラスを付与
                              $(this).addClass('active3');
                            }
                          });
                        });
                      });

                      </script>
                    </body>
                    </html>
