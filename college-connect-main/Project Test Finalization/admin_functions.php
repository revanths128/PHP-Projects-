<?php

//$pass = null;

function checking_login($con)
{

	if(isset($_SESSION['admin_name']))
	{

		$id = $_SESSION['admin_name'];
		$query = "select * from admin where admin_name = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$admin_data = mysqli_fetch_assoc($result);

			$_GLOBALS['pass'] = $admin_data['admin_name'];

			return $admin_data;


		}
	}

	//redirect to login
	header("Location: admin_login.php");
	die;

}


function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}


function call_me(){
	// $_GLOBALS['pass'];
	return $GLOBALS['pass'];

	 //return "sajjan";

}

//$GLOBALS['$pass'] = $admin_data['user_name'];
// $pass = $user_data['user_name'];


?>