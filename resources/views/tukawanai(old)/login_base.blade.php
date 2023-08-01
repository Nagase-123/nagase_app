<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>login</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="{{ asset('css/login_styles.css') }}" rel="stylesheet" />
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
	<!-- Include the above in your HEAD tag ---------->

	<div class="container">
		<p class="return_top"><a href="#" onclick="history.back(-1);return false;">戻る</a></p>

		<div class="login-container">
			<div id="output"></div>
			<div class="avatar"><i class="bi bi-file-person m-auto text-primary icon-primary"></i></div>
			<div class="form-box">
				@yield('form')
				@yield('input1')
				@yield('input2')
				@yield('btn1')

				<br>
				@yield('pass_reset')

			</form>
		</div>
	</div>

</div>
