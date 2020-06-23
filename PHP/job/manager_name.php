<?php

    $id=$_GET['id'];
    echo $id;
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
           
                
                header("location: login.php");
                echo "<script>alert('Now You can successfully log in');</script>";
           
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
