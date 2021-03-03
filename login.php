<?php
session_start();

	include("connection.php");
	include("functions.php");
	// $user_data = check_login($con); we don't need it here as we dont want to check it in signup page
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password)) //checking if username and password are empty and username if not numeric 
		{
			//read from database
			$query = "select * from users1 where user_name = '$user_name' limit 1"; // we are checking whether the username entered by user is present in database or not

			$result = mysqli_query($con, $query);
			if($result) 
			{
				if($result && mysqli_num_rows($result) > 0) //if result is +ve and number of rows is > 0
				{
					//As we are retaining user's data in index.php(line7) hence we need to collect the data
					$user_data = mysqli_fetch_assoc($result); //assoc is associative array , as data may consist of many things
					
					if($user_data['password'] === $password) //if the password is correct
					{
						$_SESSION['user_id'] = $user_data['user_id']; //because of the checklogin function if functions.php	
						header("Location: index.php");
						die;
					}
				}
			}	
			echo "<div class='warning' style='color:white;position:absolute;top:1rem;font-size:2rem;background-color:rgba(255,255,255,0.4);padding:0.5rem;border-radius:.5rem;'>"."Wrong username or password"."</div>";
		} else { //username or password is empty
			echo "<div class='warning' style='color:white;position:absolute;top:1rem;font-size:2rem;background-color:rgba(255,255,255,0.4);padding:0.5rem;border-radius:.5rem;'>"."Please enter some valid information!"."</div>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styleforloginPage.css">
</head>
<body>
    <div class="contact_container">
        <div class="contactBox">
            <p class="searchText"><large>Contact us</large><br><b>CDATS</b> Group<br>Phone no:- 1234567891</p>
            <a href="#" class="searchBtn">
            <i class="fas fa-handshake"></i>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <h2>Login/Signup</h2>
            <img src="https://www.srmist.edu.in/sites/icidl/files/images/footer_logo.png" alt="SRM logo" srcset="">
            <form method="post">
                <input type="text" name="user_name" id="text" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <div class="buttons">
                <button type="submit" class="login">Login</button>
                <button class="register"><a href="signup.php">Signup</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>