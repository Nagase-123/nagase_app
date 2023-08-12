<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
	<meta content="width=device-width; initial-scale=1.0" name="viewport">
	<meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">
	<link href="{{ asset('css/style2.css') }}" rel="stylesheet">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
	<link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
	<style>
	@media screen and (min-width:0px) and (max-width:767px){
		.box_all{
			margin: 0 auto;
		}
	}
	.return_top{
	  text-align: right;
	  margin: auto;
	  width: 100%;
	  color: rgba(117, 79, 68, 0.8);
	  margin-top: 2%;
	}
	.return_top a:hover,
	.return_top a:focus{
	  color: #ff9467;
	}
</style>

</head>

<body>
	<div class="box_all">
		<p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>
		<div id="QandA-1">
			<h4 class="faq_title">よくあるご質問</h4>
			<dl>
				<dt>利用方法を教えてください</dt>
				<dd>ご利用には会員登録が必要となっております。<br>
					新規会員登録後、ログインの上ご予約をお願いいたします。<br>
					<a href="{{ url('/top/signup')}}">新規会員登録はこちらから</a>
				</dd>

				<dt id="menue">カットにかかる料金を教えてください</dt>
				<dd>　（1）ヘアカット　　　 5,000円<br>
					※（2）ヘアセット追加　 3,000円<br>
					※（3）お子様カット　　1,000円<br>
					※（4）シャンプー追加　 1,000円<br>
					<br>
					※（2）（3）（4）のメニューにつきましては、単体でのご予約は不可となります。<br>
					ヘアセットのみのご希望の場合は、ご予約時にコメントにてご相談ください。<br>
					<br>
					（4）シャンプーは美容師持参となります。<br>
					アレルギー等がある場合は事前にコメントにてお知らせください。<br>

				</dd>
				<dt>利用できるのは福岡市在住限定ですか</dt>
				<dd>現在ご利用いただける地域は下記となります。<br>
					博多区、中央区、東区、西区、南区、城南区、早良区<br>
				</dd>

				<dt>美容師として登録をしたい場合どうすればいいですか</dt>
				<dd>美容師のご登録には事前の審査が必要となっております。<br>
					別途ご連絡いたしますので、お手数ですがお問い合わせフォームよりご連絡をお願いいたします。<br>
					<a href="{{ url('/contact/contact')}}">お問い合わせフォームはこちら</a>
				</dd>

				<dt>予約をキャンセルしたいです</dt>
				<dd>ログイン後、【予約履歴】へお進み頂くとご予約状況が確認いただけます。<br>
					キャンセルをされたいご予約をお確かめの上、キャンセルボタンを押下いただくとキャンセルが可能です。<br>
				</dd>

				<dt>予約の日時を変更したいです</dt>
				<dd>予約内容の変更をされたい場合は、一度ご予約をキャンセルし、再度ご予約をお取りください。
				</dd>

				<dt>退会方法を教えてください</dt>
				<dd>退会をご希望の場合は、お手数ですがお問い合わせフォームよりご連絡をお願いいたします。<br>
					<a href="{{ url('/contact/contact')}}">お問い合わせフォームはこちら</a>
				</dd>

				<dt>支払い方法を教えてください</dt>
				<dd>お支払いは現金のみとなっております。当日美容師に直接お支払いください。
				</dd>

				<dt>カットの目安時間を教えてください</dt>
				<dd>髪の長さ・毛量等により多少前後する場合がありますが、約30～40分でございます。
				</dd>

				<dt>パーマ・カラーは可能ですか</dt>
				<dd id="q1">パーマ・カラーには対応しておりません。<br>
					メニューはこちらをご参照ください。<br>
					<a href="{{ url('#menue')}}">メニュー一覧</a>
				</dd>

				<dt>前回と同じ美容師さんを指名したいです</dt>
				<dd>過去の予約履歴は、ログイン後【予約履歴】にてご覧いただけます。<br>
					ご希望の美容師名をお確かめの上、ご予約をお願いいたします。<br>
				</dd>

				<dt>お問い合わせフォームから問い合わせをしたけど返信がありません</dt>
				<dd>お問い合わせにつきましては、3営業日以内に順次ご連絡させていただきます。<br>
					また、お使いのメールサービスによっては、迷惑メールフォルダに受信されている場合もございます。<br>
					対象フォルダをご確認ください。<br>
					【xxxx@example】からのメールを受信できるように受信設定をお願いいたします。
				</dd>

			</dl>
		</div>
		<div class="dotted_line text-center">
			<p class="msg_p1">上記をご確認いただいても問題が解決しない場合は、下記お問合せフォームよりお問合せ下さい<br>
				<a class="text-center" href="{{ url('/contact/contact')}}">お問い合わせフォーム</a>
			</p>
		</div>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
	$(function(){
		$("#QandA-1 dt").on("click",function(){
			$(this).next().slideToggle();
		});
	});

	//パーマカラーの質問からメニューへ
	$(function(){
		$("#q1 a").on("click",function(){
			$("#menue").next().slideToggle();
		});
	});

	</script>
</body>
</html>
