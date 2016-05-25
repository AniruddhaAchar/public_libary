<?php
	$error ;
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (isset($_POST['submit'])) {
	 	if (empty($_POST['email'])||empty($_POST['password'])) {
	 		$error = "Email id and password required to login";
	 	}
	 	else
	 	{
	 		$email = $_POST["email"];
	 		$password = $_POST['password'];
			$link = mysqli_connect('localhost','root','aniruddha',"public_library");
			if (!$link) {
				die('Could not connect to database '.mysql_errno());
			}
			$user = "select * from user where email = '$email'";
			if($result=$link->query($user)){
				$row = $result->fetch_assoc();
				$hash = $row['password'];
			}
	
	if ($password==$hash&&$email=="admin@library.com") {
		session_start(oid);
		$member = "select * from member where email = '$email'";
		if ($result1 = $link->query($member)) {
			$row1=$result1->fetch_assoc();
			$name = $row1['Name'];
			$user_id = $row1['Member_id'];
		}
		else{
			echo "Error $link->error";
			echo "Fucking fail";
		}
		$_SESSION['user']=$name;
		$_SESSION['user_id'] = $user_id;
		header("Location:admin");
	}
	elseif($password==$hash) {
		session_start(oid);
		$member = "select * from member where email = '$email'";
		if ($result1 = $link->query($member)) {
			$row1=$result1->fetch_assoc();
			$name = $row1['Name'];
			$user_id = $row1['Member_id'];
		}
		$_SESSION['user']=$name;
		$_SESSION['user_id'] = $user_id;
		header("Location:profile");
	}
	else
	{
	 	echo "Incorrect email id or password";
	}
	 	}
	 } 
	}
 ?>