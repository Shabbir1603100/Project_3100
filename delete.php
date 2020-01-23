<?php
$connection = mysqli_connect('localhost','root','','website');
session_start();
if(!isset($_SESSION['id'])){
    header("Location: signin.php");
}
$query = "DELETE FROM project WHERE roll = {$_SESSION['id']}";
$delete_project_query = mysqli_query($connection,$query);
header('Location: project_list.php');
?>