<?php
    session_start();
    if(!isset($_SESSION['uname']))
    {
        header("location: admin_login.php");
    }
    $number=$_GET['number'];
    echo $number."<br>";
    $conn=mysqli_connect("localhost","root","","nishita");
    $sql="update booking set status=1 where number='$number' ";
    $result=$conn->query($sql);
    $sql="select * from booking where number='$number'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $table=$row['assigned_table'];
    echo "assigned table".$table."<br>";
    $sql="select * from num_table where size='$table'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $t=$row['total'];
    $total = $t+1;
    echo "total table ".$total;
    $sql="update num_table set total='$total' where size='$table' ";
    $result=$conn->query($sql);

    $sql="delete from booking where status=1";
    $result=$conn->query($sql);

    header("location: admin.php");

?>