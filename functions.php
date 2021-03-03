<?php

function check_login($con) //this function is going to check if the user is logged in
{
	if(isset($_SESSION['user_id'])) //if the user id exists
	{
		$id = $_SESSION['user_id'];
		$query = "select * from users1 where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query); // we are storing the result of con and query
		if($result && mysqli_num_rows($result) > 0) //if result is +ve and number of rows is > 0
		{
			//As we are retaining user's data in index.php(line7) hence we need to collect the data
			$user_data = mysqli_fetch_assoc($result); //assoc is associative array , as data may consist of many things
			return $user_data;
		}
	}

	//if all the above things work properly it will come down here and here we will redirect user to login
	header("Location: login.php"); //header() is used to redirect
	die;
}

/*
***LOGIC TILL NOW***
 What we are doing here is we are checking if the session value exists(line 5) , if not we redirect (line 20) , if it exists then check if it is real , if it is return user data , if not come to line 20 and redirect
*/

function random_num($length)
{
	$text = "";
	if($length < 5) 
	{
		$length = 5; //to make sure it is never < 5
	}
	$len = rand(4,$length); //length should be > 4 here so we do line 34 now len is the new length 

	for ($i=0; $i < $len; $i++) { //so that length of userid is not same 
		$text .= rand(0,9); //another random number
	}
	return $text;
}