<?php

    $id=$_POST['id'];
    $name=$_POST['name'] ;   
    $num= $_POST['num'];
    $email=$_POST['email'];
    $degree=$_POST['degree'];
    $cgpa=$_POST['cgpa'];
    $role=$_POST['role'];   
    $project_name=$_POST['project_name'];           
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];  

    if($pass1==$pass2)
    {
        if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/x-png")
            || ($_FILES["file"]["type"] == "image/png"))
            && (($_FILES["file"]["size"]/1024) < 3000))
        {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
            
            if (file_exists("upload/" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . " already exists. ";
            }
            else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"],"image12/" . $id.".jpg");
                //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            }
        }
        }
        else
        {
        echo "Invalid file";
        }
        $conn=new mysqli("localhost","root","","job");
        if(mysqli_connect_error())
        {
            die('connect_error('.mysqli_connect_errno().')'.mysqli_connect_error());
        }
        else
        {
            $select="select id from data where id = ?  limit 1";
            $insert="insert into data (id,name,num,email,degree,cgpa,role,project_name,pass1) values(?,?,?,?,?,?,?,?,?)";


            $stmt=$conn->prepare($select);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->store_result();
            $rnum=$stmt->num_rows;
        
            if( $rnum==0)
            {
                $stmt->close();
                $stmt=$conn->prepare($insert);
                $stmt->bind_param("issssdsss",$id, $name,$num,$email,$degree,$cgpa,$role,$project_name,$pass1);
                $stmt->execute();
                echo "<script>alert('New record added Successfully');</script>";
                session_start();
                $_SESSION['id']=$id;
                $_SESSION['name']=$name;
                $_SESSION['role']=$role;
                if($role==4)
                {
                    header("location: managername.php?id=$id");
                }
                if($role==1)
                {
                    $sql="update data set status=1 , edited=0 where id='$id'";
                    $result=$conn->query($sql);
                }
                header("location: index.php");
                
   
                
            }
            else
            {
                echo "<script>alert('Someone Already Registered With this ID');</script>";
            }
            $stmt->close();
            $conn->close();

            if($role==4)
            {
                header("location: manager_name.php?id=$id");
            }
        }
    }
    
    else{
        
        echo "<script>alert('please enter same password');</script>";
    }



?>

<a href="login.php"><button> Login </button></a>

