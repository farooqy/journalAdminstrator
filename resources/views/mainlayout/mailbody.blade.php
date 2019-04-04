<!DOCTYPE html>
<html>
<head>
	<title>@yield('mailTitle')</title>
</head>
<body>
	<div class="" style="margin-bottom: 40px">
		<img src="{{env('APP_URL')}}uploads/static/1xLogosmall.png" >
	</div>
	@yield("mailContent")

	<div class="">
		<br>
		For More information, contact:
		<br>
		Email: <a href="mailto:support@jtmb.scimazon.org">support@jtmb.scimazon.org</a>
		<br>
		Phone: <a href="telephone:+919903050456">+91 99030 50456</a>
		<br><br>
		Regards,<br>
		Journal of Toxicology and Molecular Biology,
		Scimazon.
	</div>
</body>
</html>