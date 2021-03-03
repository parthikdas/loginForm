<?php

$dbhost = "sql311.epizy.com";// if you are using a web server you need to check what the server is
$dbuser = "epiz_28066038"; //as i am the only one using
$dbpass = "6MFrmUbjAOa"; //it is empty here as it is local host
$dbname = "epiz_28066038_login_sample_db"; //the name of the database 

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	/*The mysqli_connect() function attempts to open a connection to the MySQL Server running on host which can be either a host name or an IP address*/

	die("failed to connect!");
}