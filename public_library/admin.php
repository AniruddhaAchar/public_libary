<?php 
	$link = mysqli_connect('localhost','root','aniruddha',"public_library");
	$memid = $_POST['memid'];
	$borr = "select * from borrow where Member_id=$memid";
	if($result = $link->query($borr))
	{
		$row = $result->fetch_assoc();
		$ISBN = $row['ISBN'];
		$start_date = $row['Start_date'];
		$end_date = $row['End_date'];
	}
 ?>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Return Books</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 </head>
 <body>
 	<div class="container">
 		<div class="row">
 			<table class="table">
 				<thead>
 					<tr>
 						<th>ISBN</th>
 						<th>Start Date</th>
 						<th>Return Date</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<td><?php echo $ISBN ?></td>
 						<td><?php echo $start_date ?></td>
 						<td><?php echo $end_date ?></td>
 						<td>
 							<form action="return" method="POST">
 								<input type="hidden" name="memid" id="inputMemid" class="form-control" value="<?php echo $memid ?>">
 								<input type="hidden" name="ISBN" id="inputMemid" class="form-control" value="<?php echo $ISBN ?>">
 								<button type="submit" class="btn btn-primary">Return</button>
 							</form>
 					</td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </body>
 </html>