<?php
    session_start();
    $_SESSION['id']     = null;
    $_SESSION['email']  = null;
    $_SESSION['name']   = null;
    
    session_destroy();
    header("Location: index.php");
?>