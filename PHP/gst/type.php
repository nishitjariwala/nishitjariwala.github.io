


<a href="customer.php"><button> Back </button></a>
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
        
    }
    echo $name;

?>


<form action="type.php" method="post">

    <h2><input type="radio" name="type" value="Parcel"> Out State</h2>
    <h2><input type="radio" name="type" value="Polyester"> In state</h2>
    <br>
    <input type="submit" name="sub" value="submit">
</form>
<?php

    if(isset($_POST['sub']))
    {
        $type=$_POST['type'];
        if(empty($type)){
            header("Location: type.php");
        }
        else
        {
            $_SESSION['type']=$type;
            header("Location: description.php");

        }
    }

?>