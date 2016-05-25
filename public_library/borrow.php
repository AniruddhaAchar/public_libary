<?php 
	session_start();
	$uid = $_SESSION['user_id'];
	$ISBN = $_POST['ISBN'];
	$Title = $_POST['Title'];
	$link = mysqli_connect('localhost','root','aniruddha',"public_library");
	$sdate = date('Y-m-d');
	$e = mktime(0, 0, 0, date("m"),   date("d")+15,   date("Y"));
	$update = "update books set Copies = Copies-1 where ISBN= $ISBN";
	$edate = date("Y-m-d",$e);
	$borrow = "insert into borrow (Member_id,ISBN,Start_date,End_date) value ($uid,$ISBN,'$sdate','$edate')";
	if ($link->query($borrow)) {
		if ($link->query($update)) {
			echo "<H1>You have borrowed $Title and you last date for returning the book is $edate</H1>";
		}
		
	}
 ?>