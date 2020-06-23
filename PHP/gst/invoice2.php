
<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("location: login.php");
    }
    else{
        $id=$_SESSION['id'];
        //$name=$_GET['name'];
        //$_SESSION['name']=$name;
        $name=$_SESSION['name'];
        $bill_num=$_SESSION['bill_num'];

        $conn=mysqli_connect("localhost","root","","gst");
        $sql="select * from signup where id='$id' ";
        $result=$conn->query($sql);
        $owner=$result->fetch_assoc();
        $sql="select * from customer where id='$id' && name='$name' ";
        $result=$conn->query($sql);
        $buyer=$result->fetch_assoc();
        $sql="select * from description where id='$id' && bill_num='$bill_num' ";
        $result=$conn->query($sql);
        $desc=$result->fetch_assoc();
        $sql="select * from bank_detail where id='$id' ";
        $result=$conn->query($sql);
        $bank=$result->fetch_assoc();
        
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="style1.css" />
    <style>
        body{
          width: 100%;
            color: black;
        }
			.bd{
				border-right: 2px solid black;
				border-left: 2px solid black;
				//font-weight: bold;
				text-align: center;
				font-size: 17px;;

                color: black;


			}
            .bd1{
				font-weight: bold;
				text-align: center;
				font-size: 20px;
                color: black;


			
            }
            th
            {
				border-Bottom: 1px solid black;
                color: black;
            }
            .tt
            {
                border: 2px solid black;
            }
            .details1
            {
                text-align: right;
                color: black;
                border: 1px solid black;
                font-size: 20px;
            }
            .details
            {
              font-size: 20px;

                text-align: left;
                border: 1px solid black;
                color: black;
            }
           .name{
  font-size: 25px;

           }
           .mn{
             margin-top:-15px;
           }
           #heading_table{
             border: 5px solid black;
           }
	</style>
  </head>
  <body>
    <center>
    <h2> TAX INVOICE </h2>
          </center>
          <hr>
    <header class="clearfix">
      <div id="logo" style="position: absolute;">
        <img src="logo12.png" style="height:120px;">
      </div>
      
      <center>
      <div style="width:100%">

      <p class="name"><?php echo $owner['name']; ?></p>
      
      <div class="mn"><?php echo $owner['address'].", Gurarat "; ?></div>
    
      

        <div><?php echo $owner['num']; ?></div>
        <div>GST NO. <b><?php echo $owner['gst']; ?></b></div>
        <div><a href="mailto:company@example.com">adjariwala@gmail.com</a></div>
            
            
      </div>
          </center>
    
    </header>
        <main>
        <div id="details" class="clearfix">
        <div id="client">
          <div class="to">BILL TO:</div>
          <h2 class="name"><?php echo $buyer['name']; ?></h2>
          <div class="address"><?php echo $buyer['address']; ?></div>
          <div class="address">State:- <?php echo $buyer['state']; ?></div>
          <div class="address">State Code:- <?php echo $buyer['state_code']; ?></div>

          <div class="address"><?php echo $buyer['num']; ?></div>
          <div class="address">GST No. <b><?php echo $buyer['gst']; ?></b></div>


        </div>
        <div id="invoice" style="padding: 10px;">
          <h3 class="inv"><h3>INVOICE NO. <?php echo $_SESSION['bill_num'];?> </h3> </h3>
          <div >Date: <?php echo date("d/m/yy"); ?></div>
          <!-- <div ><h3>Date: 02/06/2020 </h3></div> -->

        </div>
      </div>
      <table border="1px solid black" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class='bd1' id="heading_table">Sr. No</th>
            <th class='bd1' id="heading_table">Description</th>
            <th class="bd1" id="heading_table">HSN Code</th>
            <th class='bd1' id="heading_table">KG.</th>
            <th class='bd1' id="heading_table">Rate</th>
            <th class='bd1' id="heading_table">Amount <br> Rs. </th>

          </tr>
        </thead>
        <tbody>
        
            <?php
                        $full_total=0;
                        $sql="select * from description where id='$id' && bill_num='$bill_num' ";
        $result=$conn->query($sql);

                while($desc=$result->fetch_assoc())
                {  
                    echo "<tr>";
                    echo "<td class='bd'>".$desc['index_num']."</td>";
                    echo "<td  class='bd'><h3 style='color: black;'>".$desc['desc_num']."</h3><p> </p></td>";
                echo"<td class='bd'>5605</td>";
                    
                    echo "<td  class='bd'>".$desc['marks']."</td>";
                    echo "<td  class='bd'>".$desc['price']."</td>";
                    $total=$desc['marks']*$desc['price'];
                    $total=round($total,2);
                    $full_total=$full_total+$total;
                    $full_total=round($full_total,2);
                    echo "<td  class='bd'>".$total."</td>";
                    echo "</tr>";
                }
                $gst=$full_total*0.06;
                $gst=round($gst,2);
                $grand_total=$full_total+$gst+$gst;
                $grand_total=round($grand_total,2);
                
            ?>
            <tr>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>

            </tr>
            
            <tr>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
                <td class='bd'></td>
            </tr>
            <tr style="background: white;">
                <td class='bd1' style="border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;"></td>
                <td class='bd1' style="border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;"></td>
                
                <td class='bd1'style="border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;"></td>
                <td class='bd1'style="border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;"></td>
                <td class='bd1'style="border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;"></td>
                <td class='bd1'style="border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;"></td>
            </tr>
           
         
        </tbody>
        <?php

            $sql="select * from bank_detail where id='$id'";
            $result=$conn->query($sql);
            $bank=$result->fetch_assoc();
            


        ?>
        <tfoot>
        <tr >
          <td class="details1" style='color: black; border-top: 1px solid white; border-right: 1px solid white; border-bottom: 1px solid white;' >Bank Details:- </td>
                <td style="border: 1px solid white;" ></td>
                <td style="border: 1px solid white;"></td>
          
            <td  style="border: 1px solid white;"></td>

            <td  class="tt" >SUBTOTAL</td>
            <td class="tt" ><?php echo $full_total;?></td>
          </tr>
          <tr>
            <td class="details1" style='color: black;border-top: 1px solid white; border-right: 1px solid white; border-bottom: 1px solid white;'>Bank</td>
            <td class="details" style='color: black;border: 1px solid white;'><?php echo $bank['bank_name'];?> </td>
            <td style="border: 1px solid white;"></td>
            <td style="border: 1px solid white;"></td>

            <td class="tt">CGST 6%</td>
            <td class="tt"><?php echo $gst;?></td>
          </tr>
          
          <tr>
            <td class="details1" style='color: black; border-top: 1px solid white; border-right: 1px solid white; border-bottom: 1px solid white;'>Account No.</td>
            <td class="details" style='color: black;border: 1px solid white;'><?php echo $bank['ac_no'];?> </td>
            <td style="border: 1px solid white;"></td>
            <td style="border: 1px solid white;"></td>

            <td class="tt">SGST 6%</td>
            <td class="tt"><?php echo $gst;?></td>
          </tr>
          <tr>
         
          <tr>
          <td class="details1" style='color: black; border-top: 1px solid white; border-right: 1px solid white; border-bottom: 1px solid white;'>IFS Code.</td>
            <td class="details" style='color: black;border: 1px solid white;'><?php echo $bank['ifsc_code'];?></td>
            <td style="border: 1px solid white;"></td>
            <td style="border: 1px solid white;"></td>

            <td class="tt">IGST_____</td>
            <td class="tt"></td>
          </tr> 
          <tr>
         <td style='color: black; border-top: 1px solid white; border-right: 1px solid white; '></td>
         <td></td>

         <td style='color: black; border-top: 1px solid white; border-right: 1px solid white; border-left: 1px solid white;'></td>
         <td style='color: black; border-top: 1px solid white; border-right: 1px solid white; border-left: 1px solid white;'></td>
            <td class="tt" style="color: black;">GRAND TOTAL</td>
            <td class="tt" style="color: black;"><b><?php echo $grand_total;?></b></td>
          </tr>
        </tfoot>
      </table>
      
    </main>
    <div style="border: 2px solid black; margin-top: -20px;">
    <h3> Note </h3>
    <ul style="">
      <li>Subject to Surat Jurisdiction</li>
      <li>Payment Terms Payment by A/c. Payees</li>
      <li>Drafts and Cheques Only</li>
      <li>Late Payment charged 24% P.A.</li>
    </ul>
    <p style="text-align: right;"><?php echo $owner['name'];?></p>

    </div>
    <div id="thanks">Thank you!</div>
    <br>
    <br>
    
  </body>
</html>
<?php
    $name=$buyer['name'];
	$d=date("d/m/y");
	$sql="select * from history where id='$id' && bill_num='$bill_num'";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)==0)
	{
		$sql="insert into history values('$id','$bill_num','$name','$grand_total',0,'$grand_total','$d')";
		$result=$conn->query($sql);
  }
  $sql="select * from bill_num where id='$id'";
  $result=$conn->query($sql);
  $bill=$result->fetch_assoc();
  $bill_num=$bill['bill_num'];
  $bill_num=$bill_num+1;
  
  $sql="update bill_num SET bill_num='$bill_num' where id='$id' ";
  $result=$conn->query($sql);

?>