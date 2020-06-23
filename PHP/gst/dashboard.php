<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location: login.php");
    }
    else{
        $id=$_SESSION['id'];
    }

    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from signup where id='$id'";
    $result=$conn->query($sql);
    $a=$result->fetch_assoc();
?>
<style>
    body{
        background: yellow;
        color: red; 
    }
</style>
<a href="logout.php"><button> Logout </button></a>
<br>
<br><br>
<?php

    echo "Welcome ".$a['name'];
    echo "<br><br>";

    echo "From Here You can Access All of your data:- ";
?>
<br>
<br>
<br>
<br>
<?php

    echo "Click to Create Invoice: ";


?>
<br>
<a href="customer.php"><button> New Invoice </button></a>
<br>
<br>
<?php

    echo "Click to View History: ";

?>
<br>
<a href="history.php"><button> History </button></a>

<br>
<br>
<?php

    echo "Bank Details: ";

?>
<br>
<a href="bank_details.php"><button> Bank Details </button></a>
