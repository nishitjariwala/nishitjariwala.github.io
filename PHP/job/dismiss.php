<?php

    $cid=$_GET['cid'];
    echo $cid;
//     mail("najariwala199@gmail.com","hello","hii");
//     ini_set('SMTP','smtpout.secureserver.net');
// ini_set('smtp_port',25);
// $name = "Nishit";
// $to = "najariwala1999@gmail.com";
// $from = "najariwala1999@gmail.com";
// $subject = "Hello";
// $message = "bye";
// echo $subject, " from ", $name, " at ", $from, "<br/>";
// echo $message;
// $retval = mail( $to, $subject, $message );
// if($retval)
// {
//     echo "sent";
// }
// else{
//     echo "not sent";
// }

    session_start();
    if(!isset($_SESSION['id']))
     {
         header('location: login.php');
     }
     $id=$_SESSION['id'];
     $_SESSION['id']=$id;
     $name=$_SESSION['name'];
     $_SESSION['name']=$name;
     $role=$_SESSION['role'];
     $_SESSION['role']=$role;
     $conn=mysqli_connect("localhost","root","","job");
     
     if($conn->connect_error)
     {
         die("connection failed: ". $conn->connect_error);
     }
     else 
     {
         $sql="select * from data where id='$cid' ";
         $result=$conn->query($sql);
         $row=$result->fetch_assoc();
         $n=$row['rejected'];
         $n=$n+1;
         $sql="update data set rejected='$n' where id='$cid' ";
         $result=$conn->query($sql);
         $sql="update data set edited=1 where id='$cid' ";
         $result=$conn->query($sql);
         if($n>=3)
         {
             
         }   
         header("location: approval.php");
     }


?>