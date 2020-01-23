<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
?>

<?php
    if(isset($_SESSION['id'])){
       header("Location: index.php");
   }
?>

<?php   
if(isset($_POST['submit'])){
    $name       = $_POST['name'];
    $id         = $_POST['id'];
    $email        = $_POST['email'];
    $password   = $_POST['password'];
    
    $query = "INSERT INTO user(name, id, email, password) VALUES ('{$name}', {$id}, '{$email}', '{$password}');";
    
    $register_user_query = mysqli_query($connection, $query);
    if(!$register_user_query){
        die("QUERY Failed ".mysqli_error($connection).' '.mysqli_errno($connection));
    }
    header("Location: signin.php");
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
            </ul>
        </nav>
        <div class="box">
            <h2>Sign Up</h2>
            <form class="contact-form" action="signup.php" method="post" enctype="multipart/form-data">
                <div class="inputbox" style="margin-top:15px">
                    <input type="text" name="name" required="" autofocus>
                    <label>Name</label>
                </div>
                <div class="inputbox">
                    <input type="text" name="id" required="">
                    <label>ID</label>
                </div>
                <div class="inputbox">
                    <input type="email" name="email" required="">
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