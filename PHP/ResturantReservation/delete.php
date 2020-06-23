<?php
    session_start();
    if(isset($_SESSION['num']))
    {
        header("location: project.php");
    }
    else if(isset($_SESSION['uname']))
    {
        
    }
?>