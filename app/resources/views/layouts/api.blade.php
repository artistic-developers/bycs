<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script>
	$(document).ready(function()
	{
   		$('ul.tabs').tabs();
	});
	</script>
	<style>
	.tab a
	{
		color: black !important;
	}
	</style>
</head>
<body>

	<div class="container" style="margin-top: 5%;">
		<a href="/" class="btn waves-light waves-effect">Home</a>
		<a href="/neo/hazardous" class="btn waves-light waves-effect">Hazardous</a>
		<a href="/neo/fastest" class="btn waves-light waves-effect">Fastest</a>
		<a href="/neo/best-year" class="btn waves-light waves-effect">Best Year</a>
		<a href="/neo/best-month" class="btn waves-light waves-effect">Best Month</a>
		@yield('content')
	</div>
</html>
</body>