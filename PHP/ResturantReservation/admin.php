<title> Admin </title>
<?php
 session_start();
 if(!isset($_SESSION['uname']))
 {
     header("location: admin_login.php");
 }
 if(isset($_SESSION['num']))
 {
    header("location: project.php"); 
}
?>
<a href="project.php"><button>Back</button></a>
<h1>Today's Bookings</h1>
<table>
    <tr>
        <td>Name</td>
        <td>Number</td>
        <td>Number of People</td>
        <td>Date</td>
        <td>Assigned </td>
    </tr>
<?php
   
    //echo time(date("y-m-d"));
    $conn=mysqli_connect("localhost","root","","nishita");
    $sql="select * from booking where status=0";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        $d=$row['date'];
        //echo $d;
        $x=explode("-",$d);
        
        $z=date("y-m-d");
        //echo "<br>".$z;
        //echo $x[0]-2000;
        $y1=$x[0]-2000;
        $m1=$x[1];
        $d1=$x[2];
        //Current
        $x=explode("-",$z);
        $y2=$x[0];
        $m2=$x[1];
        $d2=$x[2];

        if($y2==$y1 && $m2==$m1 && $d1==$d2)
        {
            echo "<tr>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["number"]."</td>";
            echo "<td>".$row["num_people"]."</td>";
            echo "<td>".$row["date"]."</td>";
            echo "<td> <a href='assigned_table.php ? number=".$row['number']."'> <button>Yes</button></a></td> ";
            echo "</tr>";
        }
        
    }

?>
</table>
<h3>
Press button below only at the end of the Day it will delete all the bookings</h3>

   
    <form action="" method="post">
        <input type = "submit" value = "DELETE" name="delete" >
    </form>    
    <?php
    
        if(isset($_POST['delete']))
        {
            $sql="delete from booking";
            $result=$conn->query($sql);
            $sql="UPDATE num_table SET total= 7 WHERE size = 2 ";
            $result=$conn->query($sql);
            $sql="UPDATE num_table SET total= 5 WHERE size = 4 ";
            $result=$conn->query($sql);
            $sql="UPDATE num_table SET total= 3 WHERE size = 6 ";
            $result=$conn->query($sql);
            $sql="UPDATE num_table SET total= 2 WHERE size = 8 ";
            $result=$conn->query($sql);
            
            
            header("location: admin.php");
            $_SESSION['delete_alert']=1;
            echo "hello";
        }
        if(isset($_SESSION['delete_alert']))
        {
            echo "<script> alert('All Records are Deleted Sccessfully: '); </script>";
            unset($_SESSION['delete_alert']);

        }
    
    ?>