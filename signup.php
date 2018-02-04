<?php

//for user signup


$response = array();
require 'dbconnect.php';
$response["success"] = 0;
if(!$connection)
{
	$response["message"] = "unable to reach database";
}

else if(!isset($_REQUEST['email']))
{
	$response["message"] = "Email missing";
}

else if(!isset($_REQUEST['password']))
{
	$response["message"] = "Password missing";
}

else if(!isset($_REQUEST['name']))
{
	$response["message"] = "Name missing";
}


else
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$name=$_REQUEST['name'];
	$query = "INSERT INTO `userdata`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
	if(mysqli_query($connection,$query))
	{
		$id=mysqli_insert_id($connection);
		$response["success"] = 1;
		$response["message"] = "Signup Success";
		$response["id"] = $id;
	}
	else
	{
		$response["success"] = 0;
		$response["message"]="Already Exist";
	}	
	mysqli_close($connection);
}

print(json_encode($response));

?>