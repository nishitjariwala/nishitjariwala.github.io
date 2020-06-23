<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('location: login.php');
}
$id=$_SESSION['id'];
$_SESSION['id']=$id;
$name=$_SESSION['name'];
$_SESSION['name']=$name;
$role=$_SESSION['role'];
$_SESSION['role']=$role;

   
        if(isset($_POST['sub']))
        {
            $pass3=$_POST['pass3'];
            $pass4=$_POST['pass4'];
            if($pass3==$pass4)
            {
                //session_start();
                
            
                $id=$_SESSION['id'];
                //$id=1;
                $conn=mysqli_connect("localhost","root","","job");
                $sql="select * from data where id='$id' ";
                $result= $conn->query($sql);
                $row=$result->fetch_assoc();
                $pass2=$_POST['pass2'];
                $pass1=$row['pass1'];
                //echo $row['pass1'];
                    if($pass1==$pass2)
                    {
                        echo "Same password ";
                        $sql="update data set pass1='$pass3' where id='$id' ";
                        $result=$conn->query($sql);
                        $_SESSION['new_pass']=1;
                        header("location: index.php");
                    }
            }
            else{
                echo "Enter Same Password";
            }
        
        }
    
//session_start()


    
?>
<form action="" method="post">
    
        <h4> Enter old password </h4>
        <input type="password" name="pass2">
        <br>
        <h4> Enter New password </h4>
        <input type="password" name="pass3">
        <br>
        <h4> Enter new password again</h4>
        <input type="password" name="pass4">
        <br>
        <input type="submit" name="sub" >

</form>

