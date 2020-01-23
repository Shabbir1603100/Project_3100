<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(!$connection)
    echo "I died";

if(isset($_POST['submit'])){
    $db_roll        = $_SESSION['id'];
    $db_name        = $_SESSION['name'];
    $db_email       = $_SESSION['email'];
    $db_pname       = $_POST['pname'];
    $db_git         = $_POST['git'];
    $db_description = $_POST['description'];
    
    $query = "INSERT INTO project VALUES($db_roll, '{$db_name}', '{$db_email}', '{$db_pname}', '{$db_git}', '{$db_description}')";
    
    $insert_project_query = mysqli_query($connection,$query);
    if(!$insert_project_query)
        echo "Holo na";
    
    header('Location: project_list.php');
    
} else
    echo "Laav nai";

?>