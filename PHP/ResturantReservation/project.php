<?php
session_start();
function book()
{
    
        
        echo "<script>if (confirm('First Login')) {";
            header("location: login.php");
        echo "} else {";
           
        echo"}<script>";
        
}
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>RESTAURANT</title>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link href="project.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
<style>
    html
    {
        scroll-behavior: smooth;
    }
.fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}
.fa-snapchat-ghost {
  background: #fffc00;
  color: white;
    text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;}
#icons
{
        float: right;
}
    .menu
        {
            width:28%;
            height:300px;
            margin:30px;
            float:left;
            border: 5px solid white;
        }
    .i1
    {
        width:100%;
        height:300px;
    }
.menu {
  position: relative;
  width: 28%;
}

.i1 {
  display: block;
  width: 100%;
  height: 300px;
}
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: orange;
    font-family: 'Tangerine', cursive;
}

.menu:hover .overlay {
  opacity: 1;
}
.text {
  color: white;
  font-size: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
    }
    body
    {
        background-color: burlywood;
    }
    #div1
    {
        width:70%;
        height:70%;
        margin-top:8%;
        margin-bottom: 15%;
        
    }
    #pp1
    {
        font-size: 50px;
         font-family: 'Tangerine', cursive;
        text-transform: capitalize;
        padding-top: 35px;
    }
    hr.four {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}
    .pp
    {
        padding: 12px;
        font-family: 'Marck Script', cursive;
        font-size: 80px;
        text-transform: capitalize;
        text-decoration: underline;
    }
    .pp1
    {
        padding: 12px;
        font-family: 'Marck Script', cursive;
        font-size: 22px;
    }
    button
    {
        background: black;
        color:white;
        padding: 12px;
    }
    input,select
    {
        padding: 15px;
        background-color:antiquewhite;
        margin-left:30px;
        font-size: 20px;
    }
    input
    {
        padding: 3px;
    }
    .divc
    {
        background-color:rgba(255, 242, 204,0.7);
    }
    table,tr,th
        {
            border: 1px solid black;
            margin:25px;
            font-family: 'Marck Script', cursive;
            font-size: 18px;
        }
        th
        {
            background-color:orange;
        }
        #fid
        {
            background-color:bisque;
        }
        .inid
        {
            background-color: orange;
            color:white;
            padding: 7px;
            margin: 12px;
        }
        marquee
        {
            font-size: 35px;
            color:springgreen;
        }
        #para
        {
            text-decoration-line:  overline underline;
            text-decoration-style:dotted;
            font-size: 60px;
            font-family: 'Marck Script', cursive;
            text-align: center;
        }
        .cid
        {
            height:60%;
            width: 50%;
            background-color: antiquewhite;
            margin-left: 25%;
            margin-top: 5%;
        }
        #cid2
        {
            height: 300px;
            width: 300px;
            padding-top: 20px;
            padding-right: 60px;
            float: right;
            position: relative;
            bottom: 360px;
        }
        .par,.par2
        {
            text-transform: uppercase;
            padding-left: 40px;
            font-size: 20px;
        }
        .par2
        {
            color:red;
            padding-top: 25px;
        }
        .social{
            margin-top: -150px;
            position: fixed;
            z-index: 1;
        }
        .nav
        {
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;


            z-index: 2;
            position: fixed;
            margin-top: -180px;
            background-color: burlywood;
        }
        .nav_menu
        {
            margin-top: -100px;
            width: 1670px;

        }
        .logo{
            border-radius:50%;
            margin-left: 200px;
        }
        .special
        {
            margin-left: -600px;
        }
        .special1
        {
            margin-left: -350px;

        }
    hr.style-two {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>

<body>
<header>
         <div class="nav">
             <img id="image" class="logo" src="Screen%20Shot%202019-02-13%20at%207.36.13%20PM.png" height="80px" width="100px">
            <div class="nav_menu"> 
                <ul>
                    <?php
                        if(isset($_SESSION['num']))
                        {
                            $num=$_SESSION['num'];
                            $conn=mysqli_connect("localhost","root","","nishita");

                            $sql="select * from resturant_login where number='$num' ";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();

                            echo "<li class='special'><a href='history.php'>Hello ".$row['name']."</a></li>";
                            
                        }
                        else if(isset($_SESSION['uname']))
                        {
                            echo "<li class='special'><a href=''>Hello ADMIN</a></li>";
                            echo "<li class='special1'><a  href='admin.php'>Booking</a></li>";

                        }
                    
                    ?>  
                    hello 
                    <li><a href="#se">home</a></li> 
                    <li><a href="#m1">menu</a></li>
                    <li><a href="#hrid">reserve table</a></li>

                    <li><a href="#feed">feedbacks</a></li>
                    <li ><a href="#hrid2">contact</a></li>
                    <?php
                        if(isset($_SESSION['num']))
                        {
                            $num=$_SESSION['num'];

                            echo "<li><a href='signout.php'>Sign-Out</a></li>";
                            
                        }
                        else if(isset($_SESSION['uname']))
                        {

                            echo "<li><a href='signout.php'>Sign-Out</a></li>";

                        }
                        else
                        {
                                echo "<li><a href='login.php'>Log-In</a></li>";
                        
                        }
                    
                    ?>    
                </ul>
            </div>
        </div>
</header>    
<center><p class="l1">lettuce eat!!!!</p></center> 
<div id="icons" class="social">
    <a href="https://www.facebook.com/" class="fa fa-facebook" id="facebook"></a><br> 
    <a href="https://twitter.com/login" class="fa fa-twitter"></a> <br>
    <a href="https://www.instagram.com/" class="fa fa-instagram"></a><br> 
    <a href="https://www.snapchat.com/l/en-gb/" class="fa fa-snapchat-ghost"></a> <br>
</div>
<a href="#m1"><div class="scroll-downs">
  <div class="mousey">
    <div class="scroller"></div>
  </div>
</div></a>
<br><br><br><br><br><br><br><br><br><br><br><br>>
    
    <center>
        <p class="l1" id="m1">Menu</p></center>
        <a href="sp.html"><div class="menu"><img class="i1" src="special.png"><div class="overlay">
    <div class="text">Our special</div></a>
  </div></div>
  <a href="combos.html"><div class="menu"><img class="i1" src="combos.png"><div class="overlay">
    <div class="text">Combos</div></a>
  </div></div>
  <a href="lunch.html"><div class="menu"><img class="i1"src="lunch.png"><div class="overlay">
    <div class="text">Lunch</div></a>
  </div></div>
  <a href="soup.html"><div class="menu"><img class="i1" src="soup.png"><div class="overlay">
    <div class="text">Soup</div></a>
  </div></div>
  <a href="starters.html"><div class="menu"><img class="i1" src="starters3.png"><div class="overlay">
    <div class="text">Starters</div></a>
  </div></div>
  <a href="maincourse.html"><div class="menu"><img class="i1" src="maincourse.png"><div class="overlay">
    <div class="text">Maincourse</div></a>
  </div></div>
  <a href="breads.html"><div class="menu"><img class="i1" src="roti.png"><div class="overlay">
    <div class="text">breads</div></a>
  </div></div>
  <a href="rice.html"><div class="menu"><img class="i1" src="rice3.png"><div class="overlay">
    <div class="text">Rice and Biryani</div></a>
  </div></div>
  <a href="desert.html"><div class="menu"><img class="i1" src="sweet.png"><div class="overlay">
    <div class="text">Desert</div></a>
  </div></div>
   
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br>
    <center>
        <hr id="hrid" class="style-four">
<div class="divc" id="div1">
            <center><p class="pp" id="res">reservations</p></center>
            <hr class="four">
            <p class="pp1">We’re happy to have you join us at lettuce eat. Our seating requests are powered through Open Table. While we cannot guarantee seats in our main dining room, we do our best to accommodate your requests. While you wait, please take a seat and relax in our bar and lounge area to enjoy one of our seasonal or signature cocktails or a glass of Lebanese wine from our full drink menu. Please keep in mind we can only seat complete parties and can only hold tables for up to 15 minutes past your reservation time.</p>
        <form action="" method="post">
            <input type="text" placeholder="enter name:" name="name" required>
            <input type="text" placeholder="mobile-no:" name="number" required>
            <INPUT TYpe="number" placeholder="Number of people" name="num_people" required>
            <input type="date"   name="date" required>
            <br>
            <br>
            <input type="submit" value="RESERVE NOW" name="sub">
            <?php
                
                if(isset($_POST['sub']))
                {
                    if(!(isset($_SESSION['num'])))
                    {
                        header("location: project.php");
                        echo "<script>alert('Log in First');</script>";

                    }
                    else
                    {
                        $name=$_POST['name'];
                        $number=$_POST['number'];
                        $num_people=$_POST['num_people'];
                        $date=$_POST['date'];
                        $num=$_SESSION['num'];
                        $conn=mysqli_connect("localhost","root","","nishita");
                        $t=$num_people;
                        if($t<=2)
                        {
                            $t=2;
                        }
                        else if($t<=4)
                        {
                            $t=4;
                        }
                        else if($t<=6)
                        {
                            $t=6;
                        }
                        else 
                        {
                            $t=8;
                        }
                        $sql="select * from num_table where size='$t' ";
                        $result=$conn->query($sql);
                        $r=$result->fetch_assoc();
                        $total=$r['total'];
                        if($total==0)
                        {
                            echo "<script>alert('Tables are Full. You can Try after Some time');</script>";
                        }
                        else
                        {
                            $d=$date;
                           // echo "<script>alert('".$d."');</script>";
                            
                            //echo $d;
                            $x=explode("-",$d);
                            
                            $z=date("y-m-d");
                            //echo "<br>".$z;
                            //echo $x[0]-2000;
                            $y1=$x[0]-2000;
                            $m1=$x[1];
                            $d1=$x[2];
                            //Current
                            $x=explode("-",$z);
                            $y2=$x[0];
                            $m2=$x[1];
                            $d2=$x[2];
                    
                            if($y2==$y1 && $m2==$m1 && $d1==$d2)
                            {
                                $total=$total-1;
                                $sql="update num_table set total='$total' where size='$t'";
                                $result=$conn->query($sql);
                                $sql="select * from booking";
                                $result=$conn->query($sql);
                                while($row=$result->fetch_assoc())
                                {
                                    if($row['number']==$number)
                                    {
                                        $x=1;
                                    }
                                }
                                if($x!=1)
                                {
                                    $sql="insert into booking (num,name,number,num_people,date,assigned_table) values('$num','$name','$number','$num_people','$date','$t')  ";
                                    $result=$conn->query($sql);
                                    $sql="insert into history (num,name,number,number_person,date) values('$num','$name','$number','$num_people','$date')  ";
                                    $result=$conn->query($sql);
                                    echo "<script>alert('Table is Booked');</script>";
                                
                                }
                                else{
                                    echo "<script>alert('You can Book One table with one number only and you alerady booked table with this number..');</script>";

                                }
                               }
                            else
                            {
                                echo "<script>alert('you can not book table ');</script>";

                            }    
                        }
                        
                    }
                }
            ?>
        </form>
    </div>
        </center>
    <br><hr id="hrid" class="style-four">
    <center>
        <marquee scrollamount="18" id="feed">Feedback</marquee>
    <table id="fid">
    <tr>
        <th>FOOD :</th>
    </tr>
    <tr>
        <td>Quality of food/taste</td>
    </tr>
    <tr>
        <td> 
            <input type="radio" name="quality">Excellent
            <input type="radio" name="quality">Good
            <input type="radio" name="quality">Average
        </td>
    </tr>
    <tr>
        <td>Cleanliness</td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="c">Excellent
            <input type="radio" name="c">Good
            <input type="radio" name="c">Average
        </td>
    </tr>  
    <tr>
        <td>menu offering</td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="o">Excellent
            <input type="radio" name="o">Good
            <input type="radio" name="o">Average
        </td>
    </tr>  
    <tr>
        <th>SERVICE :</th>
    </tr>
    <tr>
        <td>speed of service</td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="quality">Excellent
            <input type="radio" name="quality">Good
            <input type="radio" name="quality">Average
        </td>
    </tr>
    <tr>
        <td>Staff Friendliness</td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="c">Excellent
            <input type="radio" name="c">Good
            <input type="radio" name="c">Average
        </td>
    </tr>  
    <tr>
        <td>what did you hear about us?</td>
    </tr>
    <tr>
        <td>
            <input type="radio" name="o">Excellent
            <input type="radio" name="o">Good
            <input type="radio" name="o">Average
        </td>
    </tr>  
    <tr>
        <th>PERSONAL DETAILS :</th>
    </tr>  
    <tr>
        <td>full name :<input type="text" required>* </td>
    </tr>
    <tr>
        <td>Email  id :<input type="email"></td>
    </tr>
    <tr>
        <td>Contact :<input type="text" pattern="[0-9]{10}"></td>
    </tr>
    <tr>
        <td>Birthdate :<input type="date"></td>
    </tr>
    <tr>
        <td>gender    :<input type="radio" name="gender">Male<input type="radio" name="gender">Female</td>
    </tr>
    <tr>
        <td>visitdate :<input type="date"></td>
    </tr>
    <tr>
        <td>suggestion :<input type="text"></td>
    </tr>
        <tr>
        <td><input class="inid" type="submit"><input class="inid" type="reset"></td> 
    </tr>
    </table>
    </center>
    <br><br><br><br><hr id="hrid2" class="style-four">
        <p id="para">Contact Us</p>
    <div class="cid">
        <p class="par par2">find us </p>
        <p class="par">309 E 5th Street</p>
        <p class="par">manhattan</p>
        <p class="par">kudasan</p>
        <p class="par par2">CALL US</p>
        <p class="par">+016467558939</p>
        <p class="par par2">write us</p>
        <p class="par">lettuce@us.com</p>
        <img id="cid2" src="hotel.png">
    </div>
    <div class="cid">
        <p class="par par2">name and surname </p>
        <p class="par"><input type="text"></p>
        <p class="par par2">your Email</p>
        <p class="par"><input type="text"></p>
        <p class="par par2">write your request here</p>
        <p class="par"><textarea></textarea></p>
        <p class="par"><input type="button" value="send request"></p>
        <img id="cid2" src="enquiry.png">
    </div>
</body>
