<?php
$uname=$_POST['uname'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$conn=mysqli_connect("localhost","root","","new_account");
if(mysqli_connect_error())
{
    die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());

}
else
{
    
    if($password1==$password2)
    {
        $sql="update create_account
        set password1='$password1'
        where uname='$uname' ";
        $conn->query($sql);
        echo "Password Updated Successfull";
    }
    else{
        echo "Enter Same Password ";
        exit();
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log in</title>
    <style>
        a:active{
            color: blue;

        }
        a:visited
        {
            color: blue;
            
        }
        a{
            text-decoration: none;
            color: blue;
        }
        input
            {
                width: 200px;
            }

    </style>
    
</head>
<body>
    <h1>Log in </h1>
    <form action="login.php" method="POST" >
        <fieldset>
            <legend>
                Enter Details
            </legend>
            <table>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" name="uname">
                    </td>
                </tr>
                <tr>
                    <td>
                        password
                    </td>
                    <td>
                        <input type="password" name="password1">
                    </td>
                </tr>
                <tr>
                    <td><a href="new_account.html">Create Ner Account</a></td>
                    <td><pre> <a href="forgot.html">  Forgot Password</a></pre></td>
                </tr>
            </table>
        </fieldset> 
        <input type="submit" value="submit">

    </form>
</body>
</html>