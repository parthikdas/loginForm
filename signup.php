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
        $c_password = $_POST['confirm_password'];

        if(!empty($user_name) && !empty($password)) //checking if username and password are empty and username if not numeric 
        {
            if($c_password == $password) { //if both the password matches
                //save to database
                $user_id = random_num(20); // we can put any number an the random_num() is in functions.php
                $query = "insert into users1 (user_id,user_name,password) values ('$user_id','$user_name','$password')";
                mysqli_query($con, $query); //save , this function accepts 2 parameters
                header("Location: login.php"); // redirect user to login page
                die;
            }  else {
                 echo "<div class='warning' style='color:white;position:absolute;top:1rem;font-size:2rem;background-color:rgba(255,255,255,0.4);padding:0.5rem;border-radius:.5rem;'>"."Passwords are not same!"."</div>";
            }
        } else { //user_name or password is empty
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
    <title>Signup form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="styleforsignupPage.css">
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
            <h2>Signup</h2>
            <img src="https://www.srmist.edu.in/sites/icidl/files/images/footer_logo.png" alt="SRM logo" srcset="">
            <form method="post">
                <input type="text" name="user_name" id="text" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                <div class="buttons">
                <button class="register" type="submit">Signup</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>