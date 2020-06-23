<a href="signout.php"><button>Sign Out</button></a>
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
<?php

    session_start();
    if(!isset($_SESSION['id']))
    {
        header('location: login.php');
    }
    $sort_info=$_POST['sort_info'];
    $id=$_SESSION['id'];
    $sort=$_SESSION['sort'];
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
        if($role!=3)
        {
            if($sort=="cgpa")
            {
                $sql="select * from data where role> '$role' && cgpa>='$sort_info' && status=1";
            }
            if($sort=="degree")
            {
                $sql="select * from data where role> '$role' && degree='$sort_info' && status=1";
            }
            if($sort=="project_name")
            {
                $sql="select * from data where role> '$role' && project_name='$sort_info' && status=1";
            }
            if($sort=="role")
            {
                $sql="select * from data where role> '$role' && role='$sort_info' && status=1 ";
            }
        }
        else
        {
            if($sort=="cgpa")
            {
                $sql="select * from data where role> '$role' && cgpa>='$sort_info' && status=1 && manager_name='$name'";
            }
            if($sort=="degree")
            {
                $sql="select * from data where role> '$role' && degree='$sort_info' && manager_name='$name' && status=1";
            }
        }
        
    }

?>

<table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Role</td>
            <td>Num</td>
            <td>Email</td>
            <td>Degree</td>
            <td>CGPA</td>
            <td>PROJECT ID</td>
            
        </tr>
            <?php
            $result=$conn->query($sql);
            $r=mysqli_num_rows($result);
            if($r>0)
                {
                    while($row = $result->fetch_assoc()){
                        if($row['role']==1)
                        {
                            $role1="ADMIN";
                        }
                        else if($row['role']==2)
                        {
                            $role1="HR";
                        }
                        else if($row['role']==3)
                        {
                            $role1="MANAGER";
                        }
                        else if($row['role']==4)
                        {
                            $role1="EMPLOYEE";
                        }
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$role1."</td><td>".$row["num"]."</td><td>".$row["email"]."</td><td>".$row["degree"]."</td><td>".$row["cgpa"]."</td><td>".$row["project_name"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 Result";
                }
               
            ?>
        
    </table>