<?php
$protocol = (('HTTP/1.1' == $_SERVER['SERVER_PROTOCOL']) ? 'HTTP/1.1' : 'HTTP/1.0');

header("{$protocol} 503 Service Unavailable", true, 503);
header('Content-Type: text/html; charset=utf-8');
header('Retry-After: 3600');

?><!DOCTYPE html>
<html>
<head>
	<title>Site under maintenance</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			font-family: Arial, Helvetica, sans-serif;
			background: #ccc;
		}
		.wrapper {
			width: 400px;
			margin: 30px auto;
			padding: 30px;
			background: #fff;
		}
		h1 { color: orange; text-align: center;}
		.wrapper p {color: #888;}

	</style>
</head>
<body>
	<div class="wrapper">
		<h1>Site under maintenance</h1>
		<p>Our site is unavailable at the moment,<br>
		Please try again later<br />Thank you.</p>

		<p>Notre site est indisponible pour le moment,<br />
		Veuillez réessayer plus tard<br />Merci.</p>
	</div>

</body>
</html>
<?php die(); ?>