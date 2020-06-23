<?php

    $conn=mysqli_connect("localhost","root","","nishita");
    $sql="select * from booking where assigned_table=8 ";
    $result=$conn->query($sql);
    $r=$result->fetch_assoc();
    $d=$r['date'];
    echo $d;
    $x=explode("-",$d);
    
    $z=date("y-m-d");
    echo "<br>".$z;
    echo $x[0]-2000;
    $y1=$x[0]-2000;
    $m1=$x[1];
    $d1=$x[2];
    //Current
    $x=explode("-",$z);
    $y2=$x[0];
    $m2=$x[1];
    $d2=$x[2];
    echo "<br>".$y1;
    echo "<br>".$m1;
    echo "<br>".$d1;
    echo "<br>".$y2;
    echo "<br>".$m2;
    echo "<br>".$d2;
    if($y2==$y1 && $m2==$m1 && $d1==$d2)
    {
        echo "<br>"."hii:";
    }
    else
    {
        echo "<br>"."bye;";
    }
    




?>