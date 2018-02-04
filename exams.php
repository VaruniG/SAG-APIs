<?php

require 'dbconnect.php';
$id=$_REQUEST['id'];
$query="SELECT `exam_id`, `exam_name`, `about` FROM exams where domain_id = $id";
$run=mysqli_query($connection, $query);

	while($row=mysqli_fetch_assoc($run))
	{
		$output[]=$row;
	}

	print(json_encode($output));
	mysqli_close($connection);

?>