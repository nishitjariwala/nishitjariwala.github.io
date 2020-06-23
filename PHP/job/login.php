<?php
session_start();
if(isset($_SESSION['id']))
{
    $id= $_SESSION['id'];
    $role= $_SESSION['role'];
    $_SESSION['id']=$id;
    $_SESSION['role']=$role;
    $name= $_SESSION['name']; 

    $_SESSION['name']=$name;
 
    header("location: index.php");
}

$conn=mysqli_connect("localhost","root","","job");
if(mysqli_connect_error())
{
    die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());

}
else
{
    if(isset($_POST['id']))
    {
        $id=$_POST['id'];
        $pass1=$_POST['pass1'];
        $role=$_POST['role'];
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['role']=$role;
        $_SESSION['msg']=1;
        //$_SESSION['sort']=$sort;
        //$id = $_SESSION['id'];
        $sql="select role from data where id='".$id."' && pass1='".$pass1."' && role='$role' limit 1 ";
        $result=$conn->query($sql);
        $r=mysqli_num_rows($result);
        if($r>0)
        {
            header("location: index.php");
        }
        else {
            echo "<script> alert('Either Your Password is Wrong or You have not Created Your Account');</script>";

        }
        
                
       
        
        
    }
    
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <fieldset>
            <legend>Enter Login Details</legend>
            <table>
                <tr>
                    <td><input type="radio" name="role" value="1"> Admin </td>
                    <td><input type="radio" name="role" value="2"> HR </td>
                </tr>
                <tr>
                    <td><input type="radio" name="role" value="3"> Manager </td>
                    <td><input type="radio" name="role" value="4"> Employee </td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="id" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass1" required></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                    <td><a href="new_account.html">Create New Account </a> </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>