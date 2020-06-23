<title>  Login </title>

<?php
session_start();
if(isset($_SESSION['num']))
{
    header("location: project.php");
}
if(isset($_SESSION['uname']))
{
    header("location: admin.php");
}
?>
<a href="admin_login.php"><button>Admin</button></a>
<form action="login.php" method="post">

    <input type="text" name="num" placeholder="number">
    <input type="password" name="pass" placeholder="password">
    <br>
    <a href="new.php">New Account </a>
    <br>
    <input type="submit" name="sub" value="submit">
</form>
<?php

    if(isset($_POST['sub']))
    {
        $num=$_POST['num'];
        $pass=$_POST['pass'];
        $conn=mysqli_connect("localhost","root","","nishita");
        $sql="select * from resturant_login where number='$num' && pass='$pass' ";
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)>0)
        {
            header("location: project.php");
            //session_start();
            $_SESSION['num']=$num;

        }
        else{
            echo"Wrong";
            echo "<script>alert('You Have Entered Wrong Password or You Havent Make Account');</script>";

        }
    
    
    }

?>