<a href="history.php"><button> Back </button></a>
<a href="logout.php"><button> log out </button></a>

<br>

<br>
<br>
<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location: login.php");
    }
    else{
        $id=$_SESSION['id'];
        

    }

?>
<?php

if(isset($_SESSION['bill_num']))
{
    $bill_num=$_SESSION['bill_num'];
    $name=$_SESSION['name'];    
}
else{
    $bill_num=$_GET['bill_num'];
    $name=$_GET['name'];
    $_SESSION['bill_num']=$bill_num;
$_SESSION['name']=$name;
    
}

?>
<?php

    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from history where id='$id' && name='$name' && bill_num='$bill_num'";
    $result1=$conn->query($sql);
    $a=$result1->fetch_assoc();
    $pending=$a['pending_amount'];
    $paid=$a['paid_amount'];
    $total=$a['total_amount'];


    $sql="update history set paid_amount='$total' pending_amount=0 ";
    $result=$conn->query($sql);
    header("location: history.php");

?>