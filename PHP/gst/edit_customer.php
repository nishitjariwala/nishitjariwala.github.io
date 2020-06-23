<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location: login.php");
    }
    else{
        $id=$_SESSION['id'];
        $name=$_GET['name'];
        $_SESSION['name']=$name;
        $_name=$_SESSION['name'];

        echo $name;
        echo "<br>";    
        echo $id;
    }
?>
<?php
    $conn=mysqli_connect("localhost","root","","gst");
    $sql="select * from customer where id='$id' && name='$name'";
    $result=$conn->query($sql);
    $r=$result->fetch_assoc();
?>

<html>
<head>
    <title>Add New Customer</title>

</head>
<body>

    <form action="edit_customer.php" method="post">

        <input type="text" value=<?php echo $r['name'];?> name="name">
        <br>
        <br>
        <input type="text" value=<?php echo $r['address'];?> name="address"> 
        <br>
        <br>
        <input type="text" value=<?php echo $r['state'];?> name="state">
        <br><br> 

        <input type="text" value=<?php echo $r['state_code'];?> name="state_code">
        <br><br>
        <input type="text" value=<?php echo $r['gst'];?> name="gst">
        <br>
        <br>
        <input type="text" value=<?php echo $r['num'];?> name="num"> 
        <br>
        <br>
        <br><br>

        <input type="submit" name="sub">


    </form>

</body>
</html>


<?php
    if(isset($_POST['sub']))
    {
        $name=$_POST['name'];
        $address=$_POST['address'];
        $gst=$_POST['gst'];
        $num=$_POST['num'];
        $state=$_POST['state'];
        $state_code=$_POST['state_code'];

       
            $conn=mysqli_connect("localhost","root","","gst");
            $sql="update customer set name='$name',address='$address',state='$state',state_code='$state_code',gst='$gst',num='$num' where name='$name' && id='$id' ";
            $result=$conn->query($sql);
            header("location: customer.php");
            
    
        
    }

?>