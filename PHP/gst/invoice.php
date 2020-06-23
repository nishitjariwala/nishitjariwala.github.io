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
        
    }

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="Style.css">
		<link rel="license" href=">
		<script src="Script.js"></script>
	</head>
	<body>
		<header>
			<h1> Tax Invoice</h1>
			<address contenteditable>
                <p>From,</p>
                <P><?php echo $owner['firm_name']; ?></P>
				<p><?php echo $owner['name']; ?></p>
                <p><?php echo $owner['address']; ?></p>
                
                <p>SURAT-395002</p>
				<p><?php echo $owner['num']; ?></p>
                
            </address>
            
			<table class="meta">
            
                
				<tr>
					<th>Name</th>
					<td><?php echo $buyer['name']; ?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?php echo $buyer['address']; ?></td>
				</tr>
				<tr>
					<th>State</th>
					<td><?php echo $buyer['state']; ?></td>
                </tr>
                <tr>
					<th>State-Code</th>
					<td><?php echo $buyer['state_code']; ?></td>
                </tr>
                <tr>
					<th>GSTIN No.</th>
					<td><?php echo $buyer['gst']; ?></td>
                </tr>
                <tr>
					<th>Number</th>
					<td><?php echo $buyer['num']; ?></td>
				</tr>
				<tr>
					<th>GSTIN</th>
					<td><?php echo $buyer['gst']; ?></td>
				</tr>
			</table>
		</header>
		<article>
			<h1>Recipient</h1>
			<address contenteditable>
				<p>Manufactures & Dealer In all <br> Kinds Imitation Kalabattu Jari</p>
			</address>

			<table class="meta">
				<tr>
					<th>Invoice No.</th>
					<td><?php echo $_SESSION['bill_num'];?> </td>
				</tr>
				
				<tr>
					<th>Date</th>
					<td><?php echo date("d/m/y"); ?></td>
				</tr>
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Index</span></th>
						<th><span contenteditable>Description</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        $full_total=0;
                        while($desc=$result->fetch_assoc())
                        {
                            
                            echo "<tr>";
                            echo "<td>".$desc['index_num']."</td>";
                            echo "<td>".$desc['desc_num']."</td>";
                            echo "<td><span data-prefix>Rs</span><span>".$desc['price']."</span></td>";
                            echo "<td>".$desc['marks']."</td>";
                            $total=$desc['marks']*$desc['price'];
                            $full_total=$full_total+$total;
                            echo "<td><span data-prefix>Rs</span><span>".$total."</span></td>";
                            echo "</tr>";
                        }
                        $gst=$full_total*0.12;
                        $grand_total=$full_total+$gst;

                    ?>
					
					
					
			</tbody>
			</table>
			
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rs</span><span><?php  echo $full_total; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>IGST 12%</span></th>
					<td><span data-prefix>Rs</span><span contenteditable><?php  echo $gst; ?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Grand Total</span></th>
					<td><span data-prefix>Rs</span><span><?php  echo $grand_total; ?></span></td>
				</tr>
				
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Terms and Conditions</span></h1>
			<div contenteditable>
				<p>1.The Purchaser Failing to pay up this billon demand will be charged 30% Interest per annum.<br>
				   2.No Discount will be allowed.<br>
				   3.Goods Personally purchased will not be exchanged or taken back.<br>
				   4.Ordered goods will not be exchanged or taken back.<br> </p>
			</div>
        </aside>

        <br>
        <br>
        <br>
				
					
		<p style="text-align: right;"><?php echo $owner['name'];?></p>
        
	</body>
</html>

<?php
    $name=$buyer['name'];
	$d=date("d/m/y");
	$sql="select * from history where id='$id' && bill_num='$bill_num'";
	$result=$conn->query($sql);
	if(mysqli_num_rows($result)==0)
	{
		$sql="insert into history values('$id','$name','$grand_total','$d','$bill_num')";
		$result=$conn->query($sql);
	}
	
    

?>
<a href="customer.php"><button>Go to Home</button></a>