<?php

require 'dbconnect.php';
if(!$connection)
{
	$response["success"] = 0;
	$response["message"] = "unable to reach database";
}

else if(!isset($_REQUEST['email']))
{
	$response["success"] = 0;
	$response["message"] = "Email missing";
}
else
{
	$email=$_REQUEST['email'];
	$query = "select * from userdata where email = '$email' ";
	$fire = mysqli_query($connection,$query);
	if(mysqli_num_rows($fire) > 0)
	{
		$result = mysqli_fetch_array($fire);
		$password = $result['password'];
		$to=$email;
		$text="Your password is: ".$password;
		$sub = "Your Password";
		mail($to,$sub,$text);
		$response["success"] = 1;
    	$response["message"] = "Password Sent";
	}
	else
	{
		$response["success"] = 0;
	    $response["message"] = "User not found";		
	}
}

print(json_encode($response));

?>