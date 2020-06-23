<?php
   
    $fname=$_POST["fname"];
    $sname=$_POST["sname"];
    $lanme=$_POST["lname"];
    $dob=$_POST["dob"];
    $city=$_POST["city"];
    $gender=$_POST["gender"];
    $uname=$_POST["uname"];
    $password=$_POST["password"];
    $con_password=$_POST["con_password"];



    if(!empty($fname)||!empty($sname)||!empty($lname)||!empty($dob)||
    !empty($city)||!empty($gender)||!empty($uname)||!empty($con_password))
    {
        $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="login";
        $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
        //$conn = new mysqli("localhost","root","","login" );
        
    if($password == $con_password)
    {
        if(mysqli_connect_error()){
            die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

        }
        elses
        {
            $select ="select `uname` from new_account where `uname` = ? limit 1";
            $insert = "insert into new_account (fanme,sname,lname,dob,city,gender,uname,password) values(?,?,?,?,?,?,?,?)";
            
            $stmt=$conn->prepare($select);
            $stmt->bind_param('s',$uname);
            $stmt->execute();
            $stmt->bind_result($uanme);
            $stmt->store_result();
            $rnum=$stmt->num_rows;
        }
        if( $rnum==0)
        {
            $stmt=close();
            $stmt=$conn->prepare($insert);
            $stmt->bind_param('ssssssss',$fanme,$sname,$lname,$dob,$city,$gender,$uname,$password);
            $stmt->execute();
            echo"Your Account Created";
        }
        else
        {
            echo"Please choose Another Username because someone already took this one";
        }
        $stmt->close();
        $conn->close();
    }
    else 
    {
        echo"Please Enter Same Password";    
    }
    }
    else{
        echo"All Fields are Required";
    }

?>