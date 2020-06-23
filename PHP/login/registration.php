<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $dbconnect=mysqli_connect("localhost","root","","tutor1");
        if(mysqli_connect_errno($dbconnect)){
            echo"Failed to Connect";

        }
        else
        {
            echo"Connect Successful";
        }
    ?>
</body>
</html>