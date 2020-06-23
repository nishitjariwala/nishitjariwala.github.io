<?php

session_start();
   if(!isset($_SESSION['id']))
   {
       header("location: login.php");
   }
   else
   {
       $id=$_SESSION['id'];
   }
   

    if(isset($_POST['submit']))
    {
        $conn=new mysqli("localhost","root","","job");
        if(mysqli_connect_error())
        {
            die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        else
        {
            $manager_name=$_POST['manager_name'];
            $sql="update data set manager_name='$manager_name' where id='$id' ";
            $result=$conn->query($sql);
            $r=mysqli_num_rows($result);
            $_SESSION['edit']=1;
            header("location: index.php");
                
              
        }
    }

?>
<form action="" method="post">
    <table>
        <tr>
            <td>Enter manager name:-</td>
            <td> <input type="text" name="manager_name"> </td>
        </tr>
        <tr>
            <td> <input type="submit" name="submit" value="submit">
        </tr>

    </table>

</form>
