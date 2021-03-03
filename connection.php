<?php

$dbhost = "localhost";// if you are using a web server you need to check what the server is
$dbuser = "root"; //as i am the only one using
$dbpass = ""; //it is empty here as it is local host
$dbname = "login_sample_db"; //the name of the database 

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	/*The mysqli_connect() function attempts to open a connection to the MySQL Server running on host which can be either a host name or an IP address*/

	die("failed to connect!");
}