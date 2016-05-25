<?php 
	$link = mysqli_connect('localhost','root','aniruddha',"public_library");
	$getBooks = "select * from books as b join author as a on a.Author_id = b.Author_id join publisher as p on b.Publisher_id = p.Publisher_id";
	$result=$link->query($getBooks);
	$rowno = $result->num_rows;
	$i=0;
	while($row = $result->fetch_assoc())
	{
		$Title[$i] = $row['Title'];
		$Author[$i] = $row['Name'];
		$Publisher[$i] = $row['PName'];
		$Genre[$i] = $row['Genre'];
		$Copies[$i] = $row['Copies'];
		$ISBN[$i] = $row['ISBN'];
		$i++;
	}
 ?>