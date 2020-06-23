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
    $sql="select * from customer where id='$id' && name='$name'";
    $result1=$conn->query($sql);
    $x=$result1->fetch_assoc();
    $sql1="select * from description where id='$id' && bill_num='$bill_num'";
    $result=$conn->query($sql1);
    $grand_total=0;
    while($r=$result->fetch_assoc())
    {

            
            $total=$r['marks']*$r['price'];
            $grand_total=$grand_total+$total;
            

    }
?>
<h2> To: <?php echo $a['name']; ?> 
<h3> Date: <?php echo $a['date'];?> </h3>
<h3> Bill Number: <?php echo $a['bill_num'];?> </h3>
<h3> Total: <?php echo $grand_total;?> </h3>
<h3> GST: <?php $gst=0.12*$grand_total; echo $gst;?> </h3>
<h3> Grand Total: <?php $gt=$gst+$grand_total; echo $gt;?> </h3>
<h3> Payment Received: <?php echo $a['paid_amount'];?> </h3>
<h3> Pending Amount: <?php echo $a['pending_amount'];?> </h3>



<h2>List Of Items</h2>
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


