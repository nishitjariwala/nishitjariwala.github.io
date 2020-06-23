<?php
session_start();
if(isset($_SESSION['num']))
{
    header("location: project.php");
}
?>


<form action="new.php" method="post">
    <input type="text" name="name" placeholder="Enter Name" >
    <br>
    <input type="text" name="num" placeholder="Enter Mobile Number" >
    <br>
    <input type="email" name="email" placeholder="Enter Email" >
    <br>
    <input type="password" name="pass1" placeholder="Enter Password" >
    <br>
    <input type="password" name="pass2" placeholder="Enter Password Again" >
    <br>
    <input type="submit" name="sub" value="Create Account">
</form>


<?php
        
    if(isset($_POST['sub']))
    {
        echo "hello";
        $name=$_POST['name'];
        $num=$_POST['num'];
        $email=$_POST['email'];
        $pass=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        if($pass==$pass2)
        {
            $conn=mysqli_connect("localhost","root","","nishita");
            $sql="select number from resturant_login where number='$num'";
            $result=$conn->query($sql);
            $r=mysqli_num_rows($result);
            if($r>0)
            {
                echo "<script>alert('You all ready signed in');</script>";

            }
            else{
                $sql="insert into resturant_login (name,number,email,pass)  values('$name','$num','$email','$pass') ";
                $result=$conn->query($sql);
                
                $_SESSION['num']=$num;

                    header("location: project.php");
               
               
            }
        }
        else{
            echo "<script>alert('Enter Same Password');</script>";

        }
    }
?>