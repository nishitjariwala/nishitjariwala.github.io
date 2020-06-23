<a href="dashboard.php"><button> Back </button></a>
<a href="logout.php"><button> log out </button></a>


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
    
    }

?>

<body>

    <form action="bank_details.php" method="post">

        <input type="text" placeholder="bank_Name" name="bank_name">
        <br>
        <br>

        <input type="text" placeholder="Account Number" name="ac_no"> <br>
        <br>

        <input type="text" placeholder="IFSC Code" name="ifsc_code"> 
        <br>
        <br>
        
        <input type="submit" name="sub">


    </form>

</body>
<?php

    if(isset($_POST['sub']))
    {
        $bn=$_POST['bank_name'];
        $ac=$_POST['ac_no'];
        $ifsc=$_POST['ifsc_code'];

        if(!empty($bn))
        {
            if(!empty($ac))
            {
                if(!empty($ifsc))
                {
                    $conn=mysqli_connect("localhost","root","","gst");
                    $sql="insert into bank_detail values('$id','$bn','$ac','$ifsc') ";
                    $result=$conn->query($sql);
            
                }
            }
        }
    }

?>