<a href="signout.php"><button>Sign Out</button></a>
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
     
    //$id=21;
    //$_SESSION['id']=$id;
    $conn=mysqli_connect("localhost","root","","job");
    if($conn->connect_error)
    {
        die("connection failed: ". $conn->connect_error);
    }
    else 
    {
        $sql="select * from data where id='$id' ";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $role=$row['role'];
        $rejected=$row['rejected'];
        if($row['rejected']>0)
        {
            echo "<script>alert('Your Request is Rejected By Admin So kindly Check once again and again enter ');</script>";

        }
    }

?>
<html>
    <head>
        <title>Job</title>

    </head>
    <body>
        <form action="" method="POST">
            

                <fieldset>
                    <legend>Personal Details</legend>
                    <table>    
                        <tr>
                            <td>
                                Enter Employee Id
                            </td>
                            <td><input type="text" name="id" value= <?php echo $row['id']; ?> required> </td>
                        </tr>
                        <tr>
                            <td>
                                Enter Employee name
                            </td>
                            <td><input type="text" name="name"  value= <?php echo $row['name'];?> required> </td>
                        </tr>
                        <tr>
                            <td> Enter Employee contact Number </td>
                            <td><input type="text" name="num" pattern="[0-9]{10}" value= <?php echo $row['num'];?> required> </td>
                        </tr>
                        <tr>
                            <td> Enter Employee email Id </td>
                            <td><input type="email" name="email" value= <?php echo $row['email'];?> required> </td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Qualifications</legend>
                    <table>
                        <tr>
                            <td>Select Your Last persued Degree</td>
                            <td><input type="radio" name="degree" value="b-tech" checked>  B.Tech <br>
                                <input type="radio" name="degree" value="b-com" >  B.Com <br>
                                <input type="radio" name="degree" value="b-a" >  B.A <br> 
                                <input type="radio" name="degree" value="10th" > 10th  <br>
                                <input type="radio" name="degree" value="12th" >  12th  <br> 
                            </td>
                        </tr>
                        <tr>
                            <td>Enter Your CGPA or Percentage</td>
                            <td> <input type="text" name="cgpa" value= <?php echo $row['cgpa'];?> required> </td>
                        </tr>
                       
                        
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Status</legend>
                    <table>
                        <tr>
                           

                        </tr>
                        <tr>
                            <td>Your Current Project </td>
                            <td> <input type="text" name="project_name" value= <?php echo $row['project_name'];?> required> </td>
                        
                        </tr>
                        
                    </table>
                </fieldset>
                
            <table>
                <tr>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
            </table> 

        </form>
    </body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $id=$_POST['id'];
        $name=$_POST['name'] ;   
        $num= $_POST['num'];
        $email=$_POST['email'];
        $degree=$_POST['degree'];
        $cgpa=$_POST['cgpa'];
        //$role=$_POST['role'];   
        $project_name=$_POST['project_name'];  
        if($role!=1)
        {
            $sql="update data set name='$name', id='$id', num='$num', email='$email', degree='$degree', cgpa='$cgpa',  project_name='$project_name' , status=0 , edited=0 where id='$id'   ";

        }
        else
        {
            $sql="update data set name='$name', id='$id', num='$num', email='$email', degree='$degree', cgpa='$cgpa',  project_name='$project_name' where id='$id'   ";

        }
        $result=$conn->query($sql);
        $a=mysqli_num_rows($result);
       
            if($role==4)
            {
                header("location: edit_managername.php");
            
            }
            else{
                $_SESSION['edit']=1;
                header("location: index.php");
            }
            
       
        
        
        

    }

?>