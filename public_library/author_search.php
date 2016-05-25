<?php 
	$link = mysqli_connect('localhost','root','aniruddha',"public_library");
	$author = $_POST['author'];
	$getBooks = "select * from books as b, author as a ,publisher as p where b.author_id = a.author_id and b.publisher_id = p.publisher_id and  a.Name = '$author'";
	if ($result=$link->query($getBooks)) {
		$i=0;
		$rowno = $result->num_rows;
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
	}
	else{
		echo "$link->error";
	}
 ?>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title><?php echo $author ?></title>
 	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 	<div class="container">
 		<table class="table">
 			<thead>
 				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Publisher</th>
					<th>Genre</th>
					<th>Copies</th>
				</tr>
 			</thead>
 			<tbody>
 				<?php for ($i=0; $i <$rowno ; $i++) { 
							 ?>
							<tr>

								<td><?php echo $Title[$i] ?></td>
								<td> <?php echo $Author[$i] ?></td>
								<td> <?php echo $Publisher[$i] ?></td>
								<td><?php echo $Genre[$i] ?></td>
								<td><?php echo $Copies[$i] ?></td>
								<td>
									<form action="borrow" method="POST">
										<input type="hidden" name="ISBN" id="inputEcho" class="form-control" value="<?php echo "$ISBN[$i]" ?>">
										<input type="hidden" name="Title" id="inputEcho" class="form-control" value="<?php echo "$Title[$i]" ?>">
										<button type="submit" class="btn btn-primary">Borrow</button>
									</form>
								</td>
							</tr>
							<?php } ?>
 			</tbody>
 		</table>
 	</div>
 </body>
 </html>