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
<a href="new_customer.php"><button>Add New Customer</button></a>
<table>
        <tr>
            <td>Name</td>
            <td>Address</td>
            <td>State</td>
            <td>State Code</td>
            <td>Mobile Number</td>
        <td>Click to Edit </td>
        <td>Select to whom you want to send</td>

        </tr>
    
<?php

    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from customer where id='$id' ";
    $result=$conn->query($sql);
    while($r=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$r['name']."</td>";
        echo "<td>".$r['address']."</td>";
        echo "<td>".$r['state']."</td>";
        echo "<td>".$r['state_code']."</td>";
        echo "<td>".$r['num']."</td>";
        echo "<td> <a href='edit_customer.php ? name=".$r['name']."'> Edit </a></td>";
        echo "<td> <a href='type.php ? name=".$r['name']."'> SELECT </a></td>";

        echo "</tr>";
    }

?>

</table>