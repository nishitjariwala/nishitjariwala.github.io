<a href="signout.php"><button>Sign Out</button></a>

<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('location: login.html');
    }
    $id=$_SESSION['id'];
    $conn=mysqli_connect("localhost","root","","job");
    if($conn->connect_error)
    {
        die("connection failed: ". $conn->connect_error);
    }
    else {
        $sql="select * from data where id='$id' ";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $name=$row["name"];
        echo "<h1>Welcome ".$name. "</h1>";
        echo" Here's Your Details is :- ";
    }

?>

<?php
    $role=$row['role'];
    $role1=$role;
    if($role==1)
    {
        $role="ADMIN";
    }
    else if($role==2)
    {
        $role="HR";
    }
    else if($role==3)
    {
        $role="Manager";
    }
    else if($role==4)
    {
        $role="Employee";
    }
?>
<table>
<tr>
    <td>ID NUMBER:- </td>
    <td> <?php echo $row['id']; ?> </td>
</tr>
<tr>
    <td>Name:- </td>
    <td> <?php echo $row['name']; ?> </td>
</tr>
<tr>
    <td>Number:- </td>
    <td> <?php echo $row['num']; ?> </td>
</tr>
<tr>
    <td>Degree:- </td>
    <td> <?php echo $row['degree']; ?> </td>
</tr>
<tr>
    <td>CGPA:- </td>
    <td> <?php echo $row['cgpa']; ?> </td>
</tr>
<tr>
    <td>Role In Company:- </td>
    <td> <?php echo $role; ?> </td>
</tr>
<tr>
    <td>Current Project :- </td>
    <td> <?php echo $row['project_name']; ?> </td>
</tr>
<?php 

    if($row['role']==4)
    {
        echo "<tr>";
        echo "<td>Manager name:- </td>";
        echo "<td>". $row['manager_name'].  "</td>";
        echo "</tr>";
    }

?>

</table>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
</head>
<body>
<a href="edit.php"><button>EDIT</button></a>
<a href="New_password.php"><button>update Password</button></a>
    
        <?php 
            echo "<br><br>";
            echo "<h2>";
            echo "Now You can access all Data ";
            echo "</h2>";
        ?> :- 
    
    <h3> Admin </h3>
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>num</td>

        </tr>
            <?php
                $conn=mysqli_connect("localhost","root","","job");
                if($conn->connect_error){
                    die("connection failed: ". $conn->connect_error);
                }
                $sql="SELECT id , name , num from data where role=1";
                $result=$conn->query($sql);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["num"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 Result";
                }
               
            ?>
        
    </table>
    <br>
    <h3>HR</h3>

    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>num</td>

        </tr>
            <?php
                $conn=mysqli_connect("localhost","root","","job");
                if($conn->connect_error){
                    die("connection failed: ". $conn->connect_error);
                }
                $sql="SELECT id , name , num from data where role=2";
                $result=$conn->query($sql);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["num"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 Result";
                }
               
            ?>
        
    </table>
    <br>
    <h3>Manager</h3>

    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>num</td>

        </tr>
            <?php
                $conn=mysqli_connect("localhost","root","","job");
                if($conn->connect_error){
                    die("connection failed: ". $conn->connect_error);
                }
                $sql="SELECT id , name , num from data where role=3";
                $result=$conn->query($sql);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["num"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 Result";
                }
               
            ?>
        
    </table>
    <br>
    <h3>Employee</h3>
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>num</td>

        </tr>
            <?php
                $conn=mysqli_connect("localhost","root","","job");
                if($conn->connect_error){
                    die("connection failed: ". $conn->connect_error);
                }
                $sql="SELECT id , name , num from data where role=4";
                $result=$conn->query($sql);
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["num"]."</td></tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "0 Result";
                }
               
            ?>
        
    </table>
                
    <h1>Want to sort the employees </h1>
    <h2> please choose on which base you want to sort the employee?? </h2>
    <table>
        <form action="sort.php" method="post">
            
            <h3>please select any option</h3> 
        
            <tr>
                <td> <input type="radio" value="degree" name="sort"> </td>
                <td> by degree </td>
            </tr>
            <tr>
                <td> <input type="radio" value="cgpa" name="sort"> </td>
                <td> by cgpa </td>
                
            </tr>
            <tr>
                <td> <input type="radio" value="role" name="sort"> </td>
                <td> by Role in the company </td>

            </tr>
            <tr>
                <td> <input type="radio" value="project_name" name="sort"> </td>
                <td> by Project ID </td>
            
            </tr>
            <tr>
                <td> <input type="submit" name="submit" value="Submit"> </td>
            </tr>
        </form>
    </table>
</body>
</html>
<?php

    //session_start();
    //$_SESSION['sort']=$sort;
    $id = $_SESSION['id'];
    $_SESSION['id']=$id;
    $_SESSION['role']=$role;
    $_SESSION['role1']=$role1;
?>

<head>
<style>
    .photoSection
    {
    
    margin-top: -1200px;
     margin-left: 1000px;   
    }            
</style>
</head>
<div class="photoSection">

<img src=<?php echo "image/".$id.".jpg"; ?> height="200px" width="200px;" alt=<?php echo "image/".$id.".jpg"; ?>> 
<br><a href="uploadPhoto.php"><button >Upload Photo</button></a>
</div>