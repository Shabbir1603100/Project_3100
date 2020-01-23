<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(!isset($_SESSION['id'])){
    header("Location:signin.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Project Submission</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <nav>
            <img src="logo.png" width="150" height="80">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a>About Us</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <div class="contact-section">
            <h1>Submit Project</h1>
            <div class="border"></div>
            <form class="contact-form" action="projectsubmit.php" method="post" enctype="multipart/form-data">
                <input name="pname" type="text" class="contact-form-text" placeholder="Project Name">
                <input name="git" type="text" class="contact-form-text" placeholder="git link of your project">
                <textarea name="description" class="contact-form-text" placeholder="Your project description here..."></textarea>
                <button name="submit" type="submit" class="contact-form-btn">Submit Project</button>
            </form>
        </div>
    </body>
</html>