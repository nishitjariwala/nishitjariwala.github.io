
<?php
    $id=$_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $lastname = $_POST['lastname'];
    
    $gender = $_POST['gender'];
    $city = $_POST['city'];


    if(!empty($id)||!empty($name)|| !empty($surname)|| 
        !empty($lastname)|| !empty($gender)|| !empty($city))
    {
        $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="form1";
        $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
        if(mysqli_connect_error()){
            die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

        }
        else
        {
            $select="select id from person where id = ?  limit 1";
            $insert="insert into person (id,name,surname,lastname,gender,city) values(?,?,?,?,?,?)";


            $stmt=$conn->prepare($select);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->store_result();
            $rnum=$stmt->num_rows;
        }
        if( $rnum==0)
        {
            $stmt->close();
            $stmt=$conn->prepare($insert);
            $stmt->bind_param("isssss",$id, $name, $surname, $lastname, $gender, $city);
            $stmt->execute();
            echo"New record added Successfully";
        }
        else
        {
            echo "Someone Already Registered With this Name";
        }
        $stmt->close();
        $conn->close();

    }
    else
    {
        echo "All Fields are required";
        die();
    }
?>