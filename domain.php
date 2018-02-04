<?php

require 'dbconnect.php';

if(!$connection)
{
	die("error connecting to database");
}

else
{
	$query="select * from domain";
	$run=mysqli_query($connection, $query);

	while($row=mysqli_fetch_assoc($run))
	{
		$output[]=$row;
	}

	print(json_encode($output));
	mysqli_close($connection);
}

?>