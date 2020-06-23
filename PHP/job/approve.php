<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('location: login.php');
    }
    else if($_SESSION['role']!=1)
    {
        header('location: login.php');

    }

    $id=$_SESSION['id'];
    //$sort=$_SESSION['sort'];
    $name=$_SESSION['name'];
    $role=$_SESSION['role'];
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['role']=$role;
?>
<?php

    $cid=$_GET['cid'];
    echo $cid;
    $conn=mysqli_connect("localhost","root","","job");
    if($conn->connect_error)
    {
        die("connection failed: ". $conn->connect_error);
    }
    else
    {
        $sql="update data set status=1 , rejected=0 where id='$cid' ";
        $result=$conn->query($sql);
        header("location: approval.php");
        
    }
?>