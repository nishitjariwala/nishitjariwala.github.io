<?php


$conn=mysqli_connect("localhost","root","","new_account");
if(mysqli_connect_error())
{
    die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());

}
else
{
    if(isset($_POST['uname']))
    {
        $uname=$_POST['uname'];
        $question1=$_POST['question1'];
        $answer1=$_POST['answer1'];
        $question2=$_POST['question2'];
        $answer2=$_POST['answer2'];
        $sql="select * from create_account where uname='$uname' && question1='$question1' && answer1='$answer1' && question2='$question2' && answer2='$answer2'";
        
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)==true)
        {
            header("location:new_password.html");


        }
        else{
            echo"Either Your Username is Wrong or You haven't Created Your Account";
            exit(); 
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
    <title>Forgot Password</title>
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
    
    <h1>Forgot Password</h1>
    <form action="new_password.php" method="POST">
        <table>
            <tr>
                <td>
                    Enter Username
                </td>
                <td>
                    <input type="text" name="uname" required>
                </td>
            </tr>
            <tr>
                <td>
                    choose Question 1
                </td>
                <td>
                    <select name="question1" required>
                        <option value="1">What is your pet name?</option>
                        <option value="2">What is your fav. movie?</option>
                        <option value="3">what is your fav. colour?</option>
                        <option value="4">What is your fav Destination?</option>
                        <option value="5">What is your fav. Place?</option>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Enter your Answer
                </td>
                <td>
                    <input type="text" name="answer1" required>
                </td>
            </tr>
            <tr>
                    <td>
                        choose Question 2
                    </td>
                    <td>
                        <select name="question2" required>
                            <option value="1">What is your pet name?</option>
                            <option value="2">What is your fav. movie?</option>
                            <option value="3">what is your fav. colour?</option>
                            <option value="4">What is your fav Destination?</option>
                            <option value="5">What is your fav. Place?</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter your Answer
                    </td>
                    <td>
                        <input type="text" name="answer2" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="login.html">Log in</a>
                    </td>
                    <td>
                        <a href="new_account.html">create New Account</a>
                    </td>
                </tr>
        </table>
        <input type="submit" value="submit">
    </form>
    

</body>
</html>
