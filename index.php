<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(!isset($_SESSION['id'])){
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Project Hub</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="style.css" type="text/css" rel="stylesheet" >
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class="main-text-box">
            <h1 class="main-heading">
                <span class="main-heading-main">Project Hub</span><br/>
                <span class="main-heading-sub">Learn and Build your Dream Project</span>
            </h1>
        </div>
        <nav>
            <img src="logo.png" width="150" height="80">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="signin.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <div class="wrapper">
            <a href="project_list.php" class="btn btn-primary">Projects</a>
        </div>
    </body>
</html>

<?php
} else{
    
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Project Hub</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="style.css" type="text/css" rel="stylesheet" >
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class="main-text-box">
            <h1 class="main-heading">
                <span class="main-heading-main">Project Hub</span><br/>
                <span class="main-heading-sub">Learn and Build your Dream Project</span>
            </h1>
        </div>
        <nav>
            <img src="logo.png" width="150" height="80">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="project.php">Submit Project</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <div class="wrapper">
            <a href="project_list.php" class="btn btn-primary">Projects</a>
        </div>
    </body>
</html>


<?php
}   
?>