<a href="signout.php"><button>Sign Out</button></a>
<style>
table
{
    border: 1px solid black;
    border-collapse: collapse;
}
td
{
    padding: 10px;

    border: 1px solid black;
}
.special
{
    border: 1px solid white;

}
</style>
<?php

    session_start();
    if(!isset($_SESSION['id']))
    {
        header('location: login.php');
    }
    $sort=$_POST['sort'];
    $id=$_SESSION['id'];
    $name=$_SESSION['name'];
    $role=$_SESSION['role'];
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['role']=$role;
    $_SESSION['sort']=$sort;


    if($sort=="cgpa")
    {
        echo "Enter with which CGPA you want to sort:-";
        echo "<form action='sort_info.php?sort='degree'' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Enter with which cgpa you want to sort </td>";
        echo "<td> <input type='text' name='sort_info'> </td>";  
        echo " </tr>";
        echo "<tr>";
        echo "<td> <input type='submit' value='submit' name='submit'> </td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    }
    
    
    else if($sort=="degree")
    {
        echo "Enter with which Degree you want to sort:-";
        echo "<form action='sort_info.php?sort='degree'' method='post'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Enter with which Degree you want to sort </td>";
        echo "<td>";
        echo "<input type='radio' name='sort_info' value='b-tech' checked>  B.Tech <br>";
        echo "<input type='radio' name='sort_info' value='b-com' >  B.Com <br>";
        echo "<input type='radio' name='sort_info' value='b-a'>  B.A <br> ";
        echo "<input type='radio' name='sort_info' value='10th' > 10th  <br>";
        echo "<input type='radio' name='sort_info' value='12th' >  12th  <br> ";
        echo "</td>  ";
        echo " </tr>";
        echo "<tr>";
        echo "<td> <input type='submit' value='submit' name='submit'> </td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    }
    else if($role!=3)
    {
        if($sort=="project_name")
        {
            echo "Enter with which Project name you want to sort:-";
            echo "<form action='sort_info.php?sort=' method='post'>";
            echo "<table>";
            echo "<tr>";
            echo "<td>Enter with which Project ID you want to sort </td>";
            echo "<td> <input type='text' name='sort_info'> </td>";  
            echo " </tr>";
            echo "<tr>";
            echo "<td> <input type='submit' value='submit' name='submit'> </td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
        }
        else if($sort=="role")
        {
            echo "Enter with which degree you want to sort:-";
            echo "<form action='sort_info.php?sort='degree'' method='post'>";
            echo "<table>";
            echo "<tr>";
            echo "<td>Enter with which degree you want to sort </td>";
            echo "<td> ";
            echo "<select name='sort_info'>";
            echo "<option value='1'>Admin</option>";
            echo "<option value='2'>HR</option>";
            echo "<option value='3'>Manager</option>";
            echo "<option value='4'>Employee</option>";
            echo "</select>"; 
            echo "</td> "; 
            echo " </tr>";
            echo "<tr>";
            echo "<td> <input type='submit' value='submit' name='submit'> </td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
        }
    } 







?>