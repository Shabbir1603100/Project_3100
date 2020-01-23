<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(!isset($_SESSION['id'])){
    header("Location:signin.php");
}

if(isset($_POST['submit'])){
    $db_roll        = $_SESSION['id'];
    $db_name        = $_SESSION['name'];
    $db_email       = $_SESSION['email'];
    $db_pname       = $_POST['pname'];
    $db_git         = $_POST['git'];
    $db_description = $_POST['description'];
    
    $query = "Update project SET name = '{$db_name}', email = '{$db_email}', p_name = '{$db_pname}', git_link = '{$db_git}', p_description = '{$db_description}' WHERE roll = {$db_roll}";
    
    $update_project_query = mysqli_query($connection,$query);
    if(!$update_project_query)
        echo "Holo na";
    
    header('Location: project_list.php');
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Edit Project</title>
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
            <h1>Edit Project</h1>
            <div class="border"></div>
<?php
    $query = "SELECT * FROM project WHERE roll = {$_SESSION['id']}";

    $select_record_query = mysqli_query($connection,$query);
    if(!$select_record_query)
    die(mysqli_error($connection)." ".mysqli_errno($connection));

    while($row = mysqli_fetch_array($select_record_query)){
        $project_name        = $row['p_name'];
        $project_link        = $row['git_link'];
        $project_description = $row['p_description'];
    }
?>
            <form class="contact-form" action="edit.php" method="post" enctype="multipart/form-data">
                <input name="pname" type="text" class="contact-form-text" value="<?php echo $project_name ?>">
                <input name="git" type="text" class="contact-form-text" value="<?php echo $project_link ?>">
                <textarea name="description" class="contact-form-text"><?php echo $project_description ?></textarea>
                <button name="submit" type="submit" class="contact-form-btn right">Update Project</button>
                <button onclick= "myFunction()" class="contact-form-btn left">Delete Project</button>
            </form>
        </div>
        
        <script>
            function myFunction() {
            var r = confirm("Are you sure you wanna delete your record?");
                if (r == true) {
                    window.location.href = "delete.php";
                    alert("BOOM! It's gone! Wala!");
                } else {
                    alert("Cancelled!");
                }
            }
        </script>
    </body>
</html>