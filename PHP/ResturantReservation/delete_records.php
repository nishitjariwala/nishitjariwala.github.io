<title> Admin </title>
<?php
 session_start();
 if(!isset($_SESSION['uname']))
 {
     header("location: admin_login.php");
 }
 if(isset($_SESSION['num']))
 {
    header("location: project.php"); 
}
?>
<?php

    $conn=mysqli_connect("localhost","root","","nishita");
    $sql="delete from booking";


?>
<script>
            var retVal = confirm("Do you Want to Delete ? It will Delete All Todays Record of Booking");
               if( retVal == true ) {

                    document.write("hello");
                
                  return true;
               } else {
                  document.write ("User does not want to continue!");
                  return false;
               }
</script>