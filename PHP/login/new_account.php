<?php

$name=$_POST['name'];
$date_of_birth=$_POST['date_of_birth'];
$m_no=$_POST['m_no'];
$uname=$_POST['uname'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$question1=$_POST['question1'];
$answer1=$_POST['answer1'];
$question2=$_POST['question2'];
$answer2=$_POST['answer2'];
$email=$_POST['email'];





if($password1==$password2)
{
$conn=new mysqli("localhost","root","","new_account");
if(mysqli_connect_error())
{
    die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
    //$insert="insert into create_account (name,date_of_birth,m_no,uname,password1,question1,answer1,question2,answer2,email) values('$name','$date_of_birth','$m_no','$uname','$password1','$question1','$answer1','$question2',$'answer2','$email')";

    $insert="insert into create_account (name,date_of_birth,m_no,uname,password1,question1,answer1,question2,answer2,email) values(?,?,?,?,?,?,?,?,?,?)";
   // $select="select uname from create_table";
    $stmt=$conn->prepare($insert);
    $stmt->bind_param("ssissisiss",$name,$date_of_birth,$m_no,$uname,$password1,$question1,$answer1,$question2,$answer2,$email);
    $stmt->execute();
    //$conn->query($insert);
    //$result=$conn->query($insert);
    echo"New record Added Successfully";
    $stmt->close();
   

}
$conn->close();
}
else{
    echo "Enter The Same Password";
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
                    <td><a href="new_account.html">Create New Account</a></td>
                    <td><pre> <a href="forgot.html">  Forgot Password</a></pre></td>
                </tr>
            </table>
        </fieldset> 
        <input type="submit" value="submit">

    </form>
</body>
</html>