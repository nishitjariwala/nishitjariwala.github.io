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
<style>

tr
{
    border: 1px solid black;
}

</style>
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

if(isset($_POST['submit']))
{
    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from history where id='$id' && name='$name' && bill_num='$bill_num'";
    $result1=$conn->query($sql);
    $a=$result1->fetch_assoc();
    $sql1="select * from description where id='$id' && bill_num='$bill_num'";
    $result=$conn->query($sql1);
    $grand_total=0;
    while($r=$result->fetch_assoc())
    {

           
            $total=$r['marks']*$r['price'];
            $grand_total=$grand_total+$total;
            

    }
    $paid_amount=$a['paid_amount'];
    $paid=$_POST['paid'];
    echo "<br>";
    $paid_amount=$a['paid_amount']+$paid;
    echo "<br>";
    echo $a['total_amount'];
    $pending=$a['total_amount']-$paid_amount;
    $sql2="update history set paid_amount='$paid_amount', pending_amount='$pending' where id='$id' && bill_num='$bill_num'";
    $result2=$conn->query($sql2);

}

?>

<table>
    <tr>
        <td>Index</td>
        <td>description</td>
        <td>Marks</td>
        <td>Price</td>
        <td>Total</td>
    </tr>
<?php
    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from history where id='$id' && name='$name' && bill_num='$bill_num'";
    $result1=$conn->query($sql);
    $a=$result1->fetch_assoc();
    $sql1="select * from description where id='$id' && bill_num='$bill_num'";
    $result=$conn->query($sql1);
    $grand_total=0;
    while($r=$result->fetch_assoc())
    {

            echo "<tr>";
            echo "<td>".  $r['index_num'] ." </td>";
            echo "<td>   ". $r['desc_num']  ."</td>";
            echo "<td>   ". $r['marks'] ." </td>";
            echo "<td>   ". $r['price'] ." </td>";
            echo "<td>";
            $total=$r['marks']*$r['price'];
            $grand_total=$grand_total+$total;
            echo $total;
            echo "</td>";
            echo "</tr>";

    }

?>
</table>
<br>
<br>
<br>
<?php

    echo "Total = ";
    echo $grand_total;
    echo "<br>";
    $gst=$grand_total*0.12;
    echo "GST= ";
    
    echo $gst;
    echo "<br>";
    echo "Grand Total= ";
    $grand_grand_total=$grand_total+$gst;
    echo $grand_grand_total;
    echo "<br>";
    echo "Payment Received=  ";
    echo $a['paid_amount'];
    echo "<br>";
    echo "Payment Pending=  ";
    echo $a['pending_amount'];
?>
<br>
<br>
<br>
Enter Amount of any payment received:- 
<form action="edit_history.php" method="post">

    <input type="text" name="paid" placeholder="Enter The Amount Recevied">

    <input type="submit" value="Add" name="submit">

</form>
