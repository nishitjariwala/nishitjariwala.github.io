<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location: login.php");
    }
    else{
        $id=$_SESSION['id'];
    }

?>
<html>
<head>
    <title>Add New Customer</title>

</head>
<body>

    <form action="new_customer.php" method="post">

        <input type="text" placeholder="Name" name="name">
        <br>
        <br>
        <input type="text" placeholder="Address" name="address"> 
        <br>
        <br>
        <input type="text" placeholder="State" name="state">
        <br><br> 

        <input type="text" placeholder="State Code" name="state_code">
        <br><br>
        <input type="text" placeholder="GSTIN" name="gst">
        <br>
        <br>
        <input type="text" placeholder="Mobile Number" name="num"> 
        <br>
        <br>
        <br><br>

        <input type="submit" name="sub">


    </form>

</body>
</html>


<?php

    if(isset($_POST['sub']))
    {
        $name=$_POST['name'];
        //$id=$_POST['id'];
        $address=$_POST['address'];
        $gst=$_POST['gst'];
        $num=$_POST['num'];
        //$pass1=$_POST['pass'];
        $state=$_POST['state'];
        $state_code=$_POST['state_code'];

        //$pass2=$_POST['pass2'];
        
            $conn=mysqli_connect("localhost","root","","gst");
            $sql="insert into customer values('$id','$name','$address','$state','$state_code','$gst','$num') ";
            $result=$conn->query($sql);
            header("location: customer.php");
            // if(mysqli_num_rows($result)>0)
            // {
            //     header("location: login.php");
            // }
            // else
            // {
            //     echo "<script>alert('Somethig went wrong');</script>";

            // }
    
        
    }

?>