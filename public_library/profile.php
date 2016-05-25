<?php include("login.php"); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['user'] ?></title>
</head>
<body>
	<p>Welcome: <?php echo $_SESSION['user'] ?></p>
</body>
</html>