<?php
    
    session_start();
    $id=$_SESSION['id'];
    
    $_SESSION['id']=$id;
    //$role=$_SESSION['role1'];
    //$_SESSION['role1']=$role;
    $name=$_SESSION['name'];
     $_SESSION['name']=$name;
     $role=$_SESSION['role'];
     $_SESSION['role']=$role;


if(isset($_POST['sub']))
{
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    && (($_FILES["file"]["size"]/1024) < 30000))
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
                move_uploaded_file($_FILES["file"]["tmp_name"], "image1/".$id.".jpg");
                //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                echo "<script> alert('Successfully Uploaded'); </script>";
                header("location: index.php");
                
            }

            
        }
        
        
    }
        else
        {
        echo "Invalid file";
        
        }
    }
 
?>
<form action="" method="POST"  enctype="multipart/form-data">
        
		<input type="file" name="file"  >
        <input type="submit" name="sub" value="Upload">
    </form>
