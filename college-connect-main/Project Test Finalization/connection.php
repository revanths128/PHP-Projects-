<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "college_connect";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
