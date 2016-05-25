<?php 
	$link = mysqli_connect('localhost','root','aniruddha',"public_library");
	$title = $_POST['title'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];
	$rating = $_POST['rating'];
	$genre = $_POST['genre'];
	$copies = $_POST['copies'];
	$country = $_POST['country'];
	$address = $_POST['address'];
	$pages = $_POST['pages'];

	$au = "insert into author (Country, Name) values ('$country','$author')";
	if($link->query($au))
	{
		echo "Author insertion successful<br>";
	}
	else{
		echo "$link->error";
	}
	$pu = "insert into publisher (PName, Address) values ('$publisher','$address')";
	if($link->query($pu))
	{
		echo "Publisher insertion successful<br>";
	}
	else{
		echo "$link->error";
	}
	$getpu = "select * FROM publisher where PName = '$publisher'";
	if ($result=$link->query($getpu)) {
		$i=0;
		$rowno = $result->num_rows;
		while($row = $result->fetch_assoc())
		{
			$pid[$i] = $row['Publisher_id'];
		}
	}
	else{
		echo "$link->error";
	}
	$getau = "select * FROM public_library.author where Name = '$author'";
	if ($result=$link->query($getau)) {
		$i=0;
		$rowno = $result->num_rows;
		while($row = $result->fetch_assoc())
		{
			$aid[$i] = $row['Author_id'];
		}
	}
	else{
		echo "$link->error";
	}
	$book = "insert into books (Title, rating, Copies, Genre, Publisher_id, Author_id, Pages) values ('$title', $rating,$copies,'$genre',$pid[0],$aid[0],$pages)";
	echo "$book";
	if($link->query($book))
	{
		echo "Books insertion successful<br>";
	}
	else{
		echo "$link->error";
	}
 ?>