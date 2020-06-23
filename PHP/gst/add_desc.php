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
<form action="" method="post">
    <table>
        <?php
            if(isset($_SESSION['bill_num']))
            {
                
                echo "<tr>";
                echo "<td>Enter Bill Number:-</td>";
                echo "<td><input type='text' name='bill_number' value=".$_SESSION['bill_num']."> </td>";
                echo "</tr>";
            }else
            {
                echo "<tr>";
                echo "<td>Enter Bill Number:-</td>";
                echo "<td><input type='text' name='bill_number' placeholder='Bill Number'> </td>";
                echo "</tr>";
            }
            
        ?>
        
        <tr>
            <td>Enter Description:-</td>
            <td><input type="text" name="desc_num" placeholder="Description" required> </td>
        </tr>
        <tr>
            <td>Enter Marks:-</td>
            <td><input type="text" name="marks" placeholder="Marks" required> </td>
        </tr>
        <tr>
            <td>Enter Price:-</td>
            <td><input type="text" name="price" placeholder="Price" required> </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="sub" > </td>
        </tr>
    </table>
</form>

<?php

    if(isset($_POST['sub']))
    {
        if(!isset($_SESSION['bill_num']))
        {
        $bill_number=$_POST['bill_number'];
        $_SESSION['bill_num']=$bill_number;
        }
        else{
            $bill_number=$_SESSION['bill_num'];
        }
        if(!isset($_SESSION['index_num']))
        {
        $index_number=0;
        }
        else{
            $index_num=$_SESSION['index_num'];
        }
        $index_num=$index_num+1;
        $_SESSION['index_num']=$index_num;

        $desc_num=$_POST['desc_num'];
        $marks=$_POST['marks'];
        $price=$_POST['price'];

        $conn=mysqli_connect("localhost","root","","gst");
        $sql="insert into description values ('$bill_number','$id','$index_num','$desc_num','$marks','$price')";
        $result=$conn->query($sql);
        header("location: description.php");

    }

?>