<?php 
	$link = mysqli_connect('localhost','root','aniruddha',"public_library");
	$memid = $_POST['memid'];
	$ISBN =$_POST['ISBN'];
	$del = "delete from borrow where Member_id =$memid and ISBN =$ISBN";
	$update = "update books set Copies = Copies+1 where ISBN= $ISBN";
	if ($link->query($del)) {
		if ($link->query($update)) {
			echo "<H1>Book successfully returned</H1>";
		}
	}
	else{
		echo "$link->error";
	}
 ?>