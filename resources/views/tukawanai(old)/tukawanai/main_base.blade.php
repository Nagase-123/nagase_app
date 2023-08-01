<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Landing Page - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
                <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <!-- jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
.heading-msg{
  font-family: 'Kaisei Decol', serif;
  color: #705339;
}
.navbar-brand{
  font-family: 'Kaisei Decol', serif;
}
.row {
margin-top: 3%;
}
</style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#!">予約登録</a>
                <a class="btn btn-primary" href="{{ url('/login_logout/login')}}">ログイン</a>
            </div>
        </nav>
        <!-- Masthead-->
<!--        <header class="masthead">　-->
            <div class="container position-relative">
               <div class="row">

                  @yield('contents')


                    <div class="col-xl-6">
        <!--                <div class="text-center text-white">-->
                            <!-- Page heading-->


                            <h4 class="">希望日時を選ぶ</h4>
                            <p class="msg_p2">※日時が表示されない場合は予約可能な日時がございません<br>
                            誠に恐れ入りますが、再度別の美容師にてご予約ください</p>
                          </div>
                        </div>

                            <table class="tb01">
                            <tr class="head">

                            <th>date</th>
                            @php
                            for($i = 6; $i<=21; $i++){
                            @endphp
                            <th>{{$i}}:00</th>
                            @php
                            }
                            @endphp
                            </tr>
                          </table>
                      <!--  </div>
                    </div>-->
                    <!--ここから下はtdを入れる-->

                    <h4>要望・追加メニューがある場合は選択してください</h4>
                    <div class="box3">

                    <fieldset>
                        <div>
                          <input type="checkbox" id="quiet" name="request1" value="静かに過ごしたい">
                          <label for="">静かに過ごしたい</label>
                        </div>

                        <div>
                          <input type="checkbox" id="talk" name="request2" value="話しながら過ごしたい">
                          <label for="">話しながら過ごしたい</label>
                        </div>

                          <div>
                            <input type="checkbox" id="hairset" name="request3" value="ヘアセット追加">
                            <label for="">ヘアセット追加　(+3,000円)</label>
                          </div>

                          <div>
                            <input type="checkbox" id="shampoo" name="request4" value="シャンプー追加">
                            <label for="">シャンプー追加　(+1,000円)</label>
                          </div>

                          <div>
                            <input type="checkbox" id="child" name="request5" value="お子様カット追加">
                            <label for="">お子様カット追加　(+1,000円)</label>
                          </div>

                        </fieldset>
                      </div> <!-- box3 -->

                      <h4>メッセージがあればご記入ください</h4>
                      <br>
                      <textarea class="text" name="メッセージ" value="">{{old('メッセージ')}}</textarea>
                      <span class = "error_msg"></span>

                      <div class="bt_box">
                        <button type ="button" id="return" class="sb_bt" onclick=history.back()>戻る</button>
                        <button type="submit" id="reservation" class="sb_bt">予約確認画面へ</button>

                      <br>
                      </div>




                </div>
           </div>
<!--</header>-->


    </body>
</html>
