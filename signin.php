<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(isset($_SESSION['id'])){
    header("Location: index.php");
}
    if(isset($_POST['submit'])){
    $email         = $_POST['email'];
    $password   = $_POST['password'];    
            
    $query = "SELECT * FROM user WHERE email = '{$email}';";

    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("QUERY Failed "."<br>".mysqli_error($connection)."<br>".mysqli_errno($connection));
    }

    while($row = mysqli_fetch_array($select_user_query)){
        $db_email       = $row['email'];
        $db_id          = $row['id'];
        $db_name        = $row['name'];
        $db_password    = $row['password'];
    }
    if($db_email == $email && $db_password == $password){
        $_SESSION['id']         = $db_id;
        $_SESSION['name']       = $db_name;
        $_SESSION['email']      = $db_email;
        header("Location: index.php");

    } else {
        $message = "Invalid User Id or Password";
        header("Location: signin.php");
    }

    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Log In</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <nav>
            <img src="logo.png" width="150" height="80">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="project.php">Submit Project</a></li>
                <li><a href="signin.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <div class="box">
            <h2>Login</h2>
            <form class="contact-form" action="signin.php" method="post" enctype="multipart/form-data">
                <div class="inputbox" style="margin-top:15px">
                    <input type="email" name="email" required="" autofocus>
                    <label>Email</label>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" required="">
                    <label>password</label>
                </div>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>