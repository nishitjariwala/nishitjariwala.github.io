<!-- <a href="type.php"><button> Back </button></a> -->
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
        $total=0;
        $grand_total=0;
        $id=$_SESSION['id'];
        if(isset($_SESSION['name']))
        {
            $name=$_SESSION['name'];
        }
        else
        {
            $name=$_GET['name'];
            $_SESSION['name']=$name;
        }
        
            // $name=$_GET['name'];
            // $_SESSION['name']=$name;
        
        
    }

    echo $name;

?>
You have selected the <?php echo $name; ?>:- 
<br>
<?php

    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from customer where id='$id' && name='$name' ";
    $result=$conn->query($sql);
    $r=$result->fetch_assoc();
    echo "<br>name:- ".$r['name']."<br>";
    echo "Address:- ".$r['address']."<br>";
    echo "State:- ".$r['state']."<br>";
    echo "state Code:- ".$r['state_code']."<br>";
    echo "Number:- ".$r['num']."<br>";
    echo "GSTIN:- ".$r['gst']."<br>";
    
    $sql="select * from bill_num where id='$id'";
    $res=$conn->query($sql);
    $r1=$res->fetch_assoc();
    $bill_num=$r1['bill_num'];
    $_SESSION['bill_num']=$bill_num;
    
    echo "Bill Num:- ".$r1['bill_num']."<br>";


?>
<br><br>



<br><br>

<a href="add_desc.php"><button> Add Item </button></a>
<br>
<br>
<br>

<table>
    <tr>
        <td>Index</td>
        <td>description</td>
        <td>Marks</td>
        <td>Price</td>
        <td>Total</td>
    </tr>
<?php

    if(isset($_SESSION['bill_num']))
    {
        $bill_num=$_SESSION['bill_num'];
        $sql="select * from description where id='$id' && bill_num='$bill_num' ORDER BY index_num";
        $result=$conn->query($sql);
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
        
        
    }

?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php

    echo "Total = ";
    echo $grand_total;
    echo "<br>";
    $gst=$grand_total*0.12;
    echo "GST 12%= ";
    
    echo $gst;
    echo "<br>";
    echo "Grand Total= ";
    $grand_grand_total=$grand_total+$gst;
                $grand_total=round($grand_total,2);
    
    echo $grand_grand_total;
?>

<!-- 
<input type="submit" name="sub" value="submit">
</form>   -->
<?php

    if(isset($_POST['sub']))
    {
        $type=$_POST['type'];
        if(empty($type)){
            header("Location: description.php");
        }
        else
        {
            if($type=="Polyester")
            {
                //polyster
                header("location: invice2.php");
            }
            else
            {
                //parcel
                header("location: invice1.php");
            }

        }
    }

?>


<?php


    $type=$_SESSION['type'];
    if($type=="Polyester")
    {
        //polyster
        echo "<a href='invoice2.php'><button> Generate Bill </button></a>";
    }
    else
    {
        //parcel
        echo "<a href='invoice1.php'><button> Generate Bill </button></a>";

    }

?>


