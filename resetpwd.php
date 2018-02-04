<?php

$response = array();

require 'dbconnect.php';

if(!$connection)
{
    $response["success"] = 0;  
	$response["message"] = "unable to reach database";
}

else if(!isset($_REQUEST['oldpwd']))
{
	$response["success"] = 0;
	$response["message"] = "Old password missing";
}

else if(!isset($_REQUEST['newpwd']))
{
	$response["success"] = 0;
	$response["message"] = " New password missing";
}

else if(!isset($_REQUEST['userid']))
{
	$response["success"] = 0;
	$response["message"] = " Userid missing";
}

else
{
	$oldpwd = $_REQUEST['oldpwd'];
	$newpwd = $_REQUEST['newpwd'];
	$userid = $_REQUEST['userid'];
	$query = "select * from userdata where user_id = $userid";
	$fire = mysqli_query($connection,$query);
	if(mysqli_num_rows($fire) > 0)
	{
		$result = mysqli_fetch_array($fire);
		$actpwd = $result['password'];
		if($oldpwd == $actpwd)
		{
			$query1 = "UPDATE userdata set password = '$newpwd' where user_id = $userid";
			$fire1 = mysqli_query($connection,$query1);
			$response["success"] = 1;
	        $response["message"] = "Password Updated";
		}
	}
	else
	{
	           $response["success"] = 0;
	           $response["message"] = "Invalid User ID";		
	}
}


print(json_encode($response));

?>