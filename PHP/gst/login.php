<?php
session_start();
    if(isset($_SESSION["id"]))
    {
        header("location: customer.php");
    }
    else{
        //$id=$_SESSION['id'];
    }
?>
<head>
    <title> GST BILL </title>
</head>
<style>
    body{
        background: yellow;
    }
    .div{
        background: yellow;
        margin-left: 35%;
        margin-right: 35%;
        border: 5px solid red;
        color: red;
        padding: 20px

    }
    table{
        color:red;
        padding 10px;
    }
</style>
<div style="margin-top: 35vh;"> 
<center>
<h1 style="color: red;">LOG IN</h2>
</center>

</div>
<div  class="div">
<center>

<table>
<form action="login.php" method="post">
    <tr>
        <td> Enter Your ID</td>
        <td><input type="text" name="id" placeholder="Enter Id"></td>
    </tr>
    <tr>
        <td>Enter Your Password</td>
        <td><input type="password" name="pass" placeholder="Enter Password"></td>
    </tr>
    <tr>
        <td rowspan=2><input type="submit" name="sub" value="Log In"> </td>
    </tr>
    
    

</form>
</table>
</center>
</div>
<?php

    if(isset($_POST['sub']))
    {
        $id=$_POST['id'];
        $pass=$_POST['pass'];

        $conn=mysqli_connect("localhost","root","","gst");
        $sql="select * from signup where id='$id' && pass='$pass'";
        $result=$conn->query($sql);
        $x=mysqli_num_rows($result);
        if($x>0)
        {
            session_start();
            $_SESSION["id"]=$id;
            header("location: dashboard.php");
        }
        else
        {
            echo"hello12";
        }

    }

?>



