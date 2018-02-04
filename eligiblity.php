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
       $query="select * from exams where exam_id = $id";
       $run=mysqli_query($connection, $query);
       if(mysqli_num_rows($run) > 0)
       {
       	    $response["success"] = 1;
                $response["url"]="internmania.com/SAG/Eligiblity/".$id.".pdf";
       }
       else
       {
       	$response["success"] = 0;
	    $response["message"] = "Invalid ID";
       }
}

print(json_encode($response));

?>