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
    

    $id= $_SESSION['id'];
    $role= $_SESSION['role'];
    $_SESSION['id']=$id;
    $_SESSION['role']=$role;
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
        $name=$row["name"];
        echo "<h1>Welcome ".$name. "</h1>";
        echo" Here's Your Details is :- ";
    }

    //MOST IMPORTANT THING FOR DISMISS BY ADMIN
    //IF STATUS IS 0 AND REJECTED IS GREATER THAN 0(MEANS IT IS REJECTED BY ADMIN)
    // AND EDITED =1 (MEANS IT IS REJECTED BY ADMIN THAT'S WHY IT BECAME 1)
    //IF USER IS EDIT HIS PROFILE THEN EDITED WILL BE 0
    //ONCE ADMIN APPROVE REQUEST STATUS BECOMES 1 AND REJECTED BECOMES 0
    //ONCE ADMIN REJECTS THE REQUEST THEN STATUS BECOMES 0 AND REJECTED INCREMENTED BY ONE AND EDITED BECOMES 1
    //SO BELOW CONDITION SAYS THAT THE REQUEST IS REJECTED BY ADMIN

    if($row['status']==0 && $row['rejected']>0 && $row['edited']==1)
    {
        header("location: edit.php");
    }
    else if($row['status']==0 && isset($_SESSION['id']))
    {
        header("location: warning.php");
    }
    if(isset($_SESSION['new_pass']))
    {
        echo "<script>alert('Password Updated SuccessFully');</script>";
        unset($_SESSION['new_pass']);
    }
    else if(isset($_SESSION['edit']))
    {
        echo "<script>alert('Updated SuccessFully');</script>";
        unset($_SESSION['edit']);
    }
    else if(isset($_SESSION['msg']))
    {
        if($role==1)
        {
        echo "<script>alert('Now you can Access All the data');</script>";
        }
        else if($role==2)
        {
            echo "<script>alert('Now you can Access All employee data');</script>";
        }
        else if($role==3)
        {   
            echo "<script>alert('Now you can Access All data of employee that are work under you');</script>";
        }
        else if($role==4)
        {
            echo "<script>alert('Now you can Only Access your data');</script>";
        }
        unset($_SESSION['msg']);

    } 

    
    //echo $id;

   
    

?>

<?php
    $role=$row['role'];
    $role1=$role;
    if($role==1)
    {
        $role1="ADMIN";
    }
    else if($role==2)
    {
        $role1="HR";
    }
    else if($role==3)
    {
        $role1="Manager";
    }
    else if($role==4)
    {
        $role1="Employee";
    }
?>
<table>
<tr>
    <td>ID NUMBER:- </td>
    <td> <?php echo $row['id']; ?> </td>
    <td rowspan=7  style="width: 1300px; text-align: right;" class="special"> 
        <!--For Profile Photo Image -->
        
            <img src=<?php echo "image1/".$id.".jpg";?> height="200px" width="200px;" alt=<?php echo "image/".$id.".jpg"; ?>> 
            <br>
            <a href="uploadPhoto.php">
                <button >Upload Photo</button>
            </a>
        
    </td>
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
    <td> <?php echo $role1; ?> </td>
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
<a href="edit.php"><button>EDIT</button></a>
<a href="New_password.php"><button>update Password</button></a>
<?php

    if($role==1)
    {
        echo "<a href='approval.php'><button>Approve Requests</button></a>";

    }
    $name=$row['name']; 
    $_SESSION['name']=$name;
    if($role!=4)
    {
        
        echo "<br><br>";
        echo "<h2>";
        echo "Now You can access all Data ";
        echo "</h2>";
    }
            
?> :- 

<?php
if($role==1)
{
?>
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
                $sql="SELECT id , name , num from data where role=1 ";
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
                $sql="SELECT id , name , num from data where role=2 && status=1 ";
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
                $sql="SELECT id , name , num from data where role=3 && status=1";
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
                $sql="SELECT id , name , num from data where role=4 && status=1";
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
<?php
}
else if($role==2)
{
?>
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
                    $sql="SELECT id , name , num from data where role=2 && status=1";
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
                    $sql="SELECT id , name , num from data where role=3 && status=1";
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
                    $sql="SELECT id , name , num from data where role=4 && status=1";
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

<?php
}
else if($role==3)
{
?>
    
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
                    $sql="SELECT id , name , num from data where role=4  && manager_name='$name' && status=1";
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

<?php
}

if($role!=4)
{
?>

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
            <?php
            if($role!=3)
            {
            ?>
            <tr>
                <td> <input type="radio" value="role" name="sort"> </td>
                <td> by Role in the company </td>

            </tr>
            
            
            <tr>
                <td> <input type="radio" value="project_name" name="sort"> </td>
                <td> by Project ID </td>
            
            </tr>
            <?php } ?>
    </table>
    <input type="submit" name="submit" value="Submit">
           
        </form>
<?php
}
?>



    

