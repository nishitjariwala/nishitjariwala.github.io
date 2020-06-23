<a href="project.php"><button>Back</button></a>
<h1>History</h1>
<table>
    <tr>
        <td>Name</td>
        <td>Number</td>
        <td>Number of People</td>
        <td>Date</td>
    </tr>
<?php
    session_start();
    if(!isset($_SESSION['num']))
    {
        header("location: project.php");
    }

    $conn=mysqli_connect("localhost","root","","nishita");
    $num=$_SESSION['num'];
    $sql="select * from history where num='$num' ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["number"]."</td>";
        echo "<td>".$row["number_person"]."</td>";
        echo "<td>".$row["date"]."</td>";
        echo "</tr>";
    }

?>
</table>