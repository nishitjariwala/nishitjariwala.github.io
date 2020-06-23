<title> Admin Login </title>

<?php
    session_start();
    if(isset($_SESSION['uname']))
    {
        header("location: admin.php");
    }
    if(isset($_SESSION['num']))
    {
        header("location: project.php");
    }
?>
<form action="admin_login.php" method="post">

    <input type="text" name="username" placeholder="username">
    <input type="password" name="pass" placeholder="password">
    <br>
    
    <br>
    <input type="submit" name="sub" value="submit">
</form>
<?php

    if(isset($_POST['sub']))
    {
        $uname=$_POST['username'];
        $pass=$_POST['pass'];
        $conn=mysqli_connect("localhost","root","","nishita");
        $sql="select * from admin where username='$uname' && password='$pass' ";
        $result=$conn->query($sql);
        $r=mysqli_num_rows($result);
        
        if($r>0)
        {
            session_start();
            $_SESSION['uname']  =$uname;
            header("location: project.php");
        }
        else{
            echo "<script>alert('login failed');</script>";

        }
    }

?>