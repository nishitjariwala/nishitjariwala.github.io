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

<a href="logout.php"><button> Logout </button></a>

<a href="dashboard.php"><button> Back </button></a>

<br>
<br><br>
<h2>History </h2>
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

<table>
        <tr>
            <td>Bill Number</td>
            <td>Name</td>
            <td>date</td>
            <td>total amount</td>
            <td>Paid amount</td>
            <td>Pending amount</td>
            <td> Status </td>

        <td>Click to Edit </td>
        <td>Click to Show Details</td>
        <td> Clear </td>

        </tr>
    
<?php

    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from history where id='$id' ";
    $result=$conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$r['bill_num']."</td>";
        echo "<td>".$r['name']."</td>";
        echo "<td>".$r['date']."</td>";
        echo "<td>".$r['total_amount']."</td>";
        echo "<td>".$r['paid_amount']."</td>";
        echo "<td>".$r['pending_amount']."</td>";
        if($r['pending_amount']==0)
        {
            echo " <td style='color: green;'> Clear </td> ";
        }
        else
        {
            echo " <td style='color: red;'> Pending </td> ";

        }
        echo "<td> <a href='edit_history.php ? name=".$r['name']."& bill_num=".$r['bill_num']."'> Edit </a></td>";
        echo "<td> <a href='show_detail.php ? name=".$r['name']."& bill_num=".$r['bill_num']."'> Display </a></td>";
        echo "<td> <a href='clear.php ? name=".$r['name']."& bill_num=".$r['bill_num']."'> Clear </a></td>";
        
        echo "</tr>";

    }

?>