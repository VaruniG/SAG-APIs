<?php

require 'dbconnect.php';
$id=$_REQUEST['id'];
$query="select * from books where exam_id = $id";
$run=mysqli_query($connection, $query);
if(mysqli_num_rows($run) > 0)
{

	while($row=mysqli_fetch_assoc($run))
	{
		$output[]=$row;
	}

	print(json_encode($output));
	mysqli_close($connection);

}

?>