<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con); //check_login() is created in functions.php and con is in connections.php

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<style>
		@import url("https://fonts.google.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap");
		*{
    		margin: 0;
    		padding: 0;
    		box-sizing: border-box;
    		font-family: 'Poppins',sans-serif;
		}
		html{
			font-size:62.5%;
		}
		body{
			min-height: 100vh;
			display: flex;
			justify-content: flex-start;
			align-items: center;
			background: linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%);
			flex-direction: column;
		}
		nav{
			width: 100%;
			height: 5rem;
			position: sticky;
			display: flex;
			top: 0;
			background-color: rgba(255,255,255,0.5);
			color: #eee;
			z-index: 1;
		}
		#button{
			height: 100%;
			margin-left: 0px;
			display: flex;
			justify-content: center;
			align-items: center;
			border: none;
			outline: none;
			padding: 10px;
			position: absolute;
			right: 1rem;
			background-color: transparent;
		}
		#button:hover{
			background-color: #f00;
			opacity: 0.9;
		}
		a{
			float: right;
			font-size: 2rem;
			text-decoration: none;
			color: #eee;
		}
		h1{
			margin-left: 1rem;
			letter-spacing: 0.1rem;
			font-size: 3rem;
		}
		section{ /* I haven't gave the height as after many records height will increase automatically */
			width: 90%;
			background-color: rgba(255,255,255,0.3);
			margin-top: 2rem;
			border-radius: 1rem;
			z-index: 1;
			position: relative;
		}
		img{ /* logo */
		    width: 30rem;
		    background-repeat: no-repeat;
		    position: absolute;
		    right: 1rem;
		}
		.record{
			color: #eee;
			font-size: 3rem;
			padding: 3rem;
			text-align: justify;
		}
	</style>
</head>
<body>
	<nav>
		<h1>Hello, <?php echo $user_data['user_name']; ?></h1>
		<div id="button"><a href="logout.php">Logout</a></div>
	</nav>

	<section>
		<img src="https://www.srmist.edu.in/sites/icidl/files/images/footer_logo.png" alt="SRM logo" srcset=""> <!--logo-->
		<?php
			$query = "select id,user_name,date from users1";
	$result_of_all = mysqli_query($con, $query); //$result = $conn->query($sql); does the same
	if($result_of_all && mysqli_num_rows($result_of_all) > 0) //if ($result->num_rows > 0) does the same
	{//if result is +ve and number of rows is > 0
		echo "<div class='record'>"."&nbsp&nbsp<u>id</u>&nbsp&nbsp"."&nbsp&nbsp<u>Name</u>&nbsp&nbsp"."&nbsp&nbsp<u>Date of signup</u>"."<br>"."</div>";
		while($row = $result_of_all->fetch_assoc()) {
			echo '<div class="record">';
       		echo "&nbsp " . $row["id"]. "&nbsp&nbsp&nbsp&nbsp" . $row["user_name"]. "&nbsp&nbsp&nbsp&nbsp&nbsp" . $row["date"]. "<br>"."</div>";
    	}
	}
		?>
	</section>
</body>
</html>