<!DOCTYPE html>
<html>
<head>
	<title> Web Site</title>
	<link rel="stylesheet" href="css1/admain.css">
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="css1/images/admain.png">
			</div>
			<ul>
				<li class="active"><a href="#">Home</a></li>
				<li><a href="adlogin.php" onclick="exit()">Exit</a></li>
			</ul>
		</div>
		<div class="title">
			<h1><b>DataBase Access<b></h1>
		</div>
		<div class="button">
			<a href="raccess.php" class="btn">Register Table</a>
			<a href="access.php" class="btn">Booking Table</a>
			<a href="paccess.php" class="btn">Payment Table</a>
		</div>
	</header>
<script>
function exit()
{
	return confirm('Are you sure you want to Exit?');
}

</script>
</body>
</html>
