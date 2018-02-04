<?php

//for user login


$response = array();
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


else if(!isset($_REQUEST['password']))
{
	$response["success"] = 0;
	$response["message"] = "Password missing";
}

else
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$query = "select * from userdata where email = '$email' ";
	$fire = mysqli_query($connection,$query);
	if(mysqli_num_rows($fire) > 0)
	{	
	          $result = mysqli_fetch_array($fire);
	          $actpwd = $result['password'];
            	if($actpwd == $password)
             	{
             		$response["success"] = 1;
            		$response["id"] = $result['user_id'];
	            }
	            else
	            {
	            	$response["success"] = 0;
		            $response["message"]="Wrong Password";
	            }	
	            mysqli_close($connection);
    }
    else
    {
	            	$response["success"] = 0;
		            $response["message"]="No user exist";    	
    }
}
print(json_encode($response));

?>