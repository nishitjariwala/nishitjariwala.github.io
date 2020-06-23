<?php

session_start();
if(!isset($_SESSION['id']))
    {
        header('location: login.php');
    }
    else if($_SESSION['role']!=1)
    {
        header('location: login.php');

    }

        echo "<a href='index.php'><button>Back</button></a>";

    $id=$_SESSION['id'];
    //$sort=$_SESSION['sort'];
    $name=$_SESSION['name'];
    $role=$_SESSION['role'];
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['role']=$role;

    $conn=mysqli_connect("localhost","root","","job");
    if($conn->connect_error)
    {
        die("connection failed: ". $conn->connect_error);
    }
    else
    {
        $sql="select * from data where status=0 && edited=0 ";
        
    }


?>
<style>
table
{
    border: 1px solid black;
    border-collapse: collapse;
}
td
{
    padding: 10px;

    border: 1px solid black;
}
.special
{
    border: 1px solid white;

}
</style>
<table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            
            <td>Number</td>            
            <td>Email</td>
            <td>Degree</td>
            <td>CGPA</td>
            <td>PROJECT ID</td>
            <td>ROLE</TD>
            <td>MANAGER</td>
            <td>APPROVE REQUESTS </TD>
            <td>DISMISS REQUESTS </TD>

            
        </tr>
            <?php
            $result=$conn->query($sql);
            $r=mysqli_num_rows($result);
            if($r>0)
                {
                    $role1="";
                    while($row = $result->fetch_assoc()){
                        if($row['role']==2)
                        {
                            $role1="HR";
                        }
                        else if($row['role']==3)
                        {
                            $role1="Manager";
                        }
                        else if($row['role']==4)
                        {
                            $role1="Employee";
                        }
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["num"]."</td><td>".$row["email"]."</td><td>".$row["degree"]."</td><td>".$row["cgpa"]."</td><td>".$row["project_name"]."</td><td>".$role1."</td><td>".$row['manager_name']."</td><td> <a href='approve.php ? cid=".$row['id']."'> Approve </a></td> <td> <a href='dismiss.php ? cid=".$row['id']."'> Dismiss </a></td> </tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 Result";
                }
               
            ?>
        
    </table>