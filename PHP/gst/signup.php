<html>
<head>
    <title>sign up</title>

</head>
<body>

    <form action="signup.php" method="post">

        <input type="text" placeholder="Name" name="name">
        <br>
        <br>

        <input type="text" placeholder="Firm Name" name="firm_name"> <br>
        <br>

        <input type="text" placeholder="Id" name="id"> 
        <br>
        <br>
        <input type="text" placeholder="Address" name="address"> 
        <br>
        <br>
        <input type="text" placeholder="GSTIN" name="gst">
        <br>
        <br>
        <input type="text" placeholder="Mobile Number" name="num"> 
        <br>
        <br>
        <input type="password" placeholder="password" name="pass1">
        <br><br>
        <input type="password" placeholder="confirm password" name="pass2">
        <br><br>

        <input type="submit" name="sub">


    </form>

</body>
</html>


<?php

    if(isset($_POST['sub']))
    {
        $name=$_POST['name'];
        $id=$_POST['id'];
        $address=$_POST['address'];
        $gst=$_POST['gst'];
        $num=$_POST['num'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $firm_name=$_POST['firm_name'];
        if($pass1==$pass2)
        {
            $conn=mysqli_connect("localhost","root","","gst");
            $sql="insert into signup values('$name','$id','$firm_name','$pass1','$address','$gst','$num') ";
            $result=$conn->query($sql);
            header("location: login.php");
            // if(mysqli_num_rows($result)>0)
            // {
            //     header("location: login.php");
            // }
            // else
            // {
            //     echo "<script>alert('Somethig went wrong');</script>";

            // }
    
        }
        else{
            echo "<script>alert('Enter Same password');</script>";
        }
    }

?>