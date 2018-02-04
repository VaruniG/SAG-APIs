<?php

$response = array();
require 'dbconnect.php';
if(!$connection)
{
	$response["success"] = 0;
	$response["message"] = "unable to reach database";
}

else if(!isset($_REQUEST['id']))
{
	$response["success"] = 0;
	$response["message"] = "ID missing";
}

else
{
	$id=$_REQUEST['id'];
	$query="select * from coachings where exam_id = $id";
	$fire = mysqli_query($connection,$query);
	if(mysqli_num_rows($fire) > 0)
	{
		while($row=mysqli_fetch_assoc($fire))
		{
			$response["coaching"][]=$row;
		}
		$response["success"] = 1;
	}
	else
	{
		$response["success"] = 0;
	    $response["message"] = "No coachings found";
	}
}
print(json_encode($response));

?>