<!DOCTYPE html>
<html>
<head>
	<title> @yield("title")</title>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}css/main.css">
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
				@include("mainlayout.menubar")
			</div>
			<div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
				@yield("content")
			</div>
		</div>
	</div>
</body>
</html>