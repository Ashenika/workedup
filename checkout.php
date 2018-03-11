<?php
session_start(); 
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="AshCakes";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
//display window title
echo "<title>".$pagename."</title>";
//include head layout
include ("headfile.html");
include ("detectlogin.php"); 

//$uId =$_SESSION['c_userid'];
$subtotal=0;
$total=0;
date_default_timezone_set("Asia/Colombo");
$date = date('d F Y H:i:s');
//echo $date;
//$uId = mysqli_real_escape_string($con, $_SESSION['c_userid']);
//$uId=mysqli_real_escape_string($conn,$_SESSION('c_userid'));

//$my_date = strtotime($date);
/*$sql = "insert into Orders(userId, orderDateTime) values('".$_SESSION['c_userid']."','".$date."')" ;
$res = mysqli_query($conn,$sql)or die(mysqli_error($conn));*/
$orderSQL = "INSERT INTO orders (userId, orderDateTime)
			VALUES ('".$_SESSION['c_userid']."','".$date."')";
$runSQL = mysqli_query($conn, $orderSQL) or die(mysqli_error($conn));



	if(mysqli_query( $conn,$orderSQL)){
if (mysqli_errno($conn) == 0) {

	$recentSQL="SELECT MAX(orderNo) AS maxOrder FROM orders WHERE userId=".$_SESSION['c_userid'] ;
	//$recentSQL="SELECT orderNo as maxOrder FROM orders WHERE userId=".$_SESSION['c_userid']." ORDERBY='orderNo' DESC LIMIT=1";
	$rOrder = mysqli_query($conn,$recentSQL) or die(mysqli_error($conn));
	$rowOrder = mysqli_fetch_array($rOrder);
		
	$recentOrderNo = $rowOrder['maxOrder'];
	echo "Your order has been placed successfully <br>";
	echo "Order No: ".$recentOrderNo;
	
	if(isset($_SESSION['basket'])){
	
	
	echo "<br><br>";
	echo "<table>
			<tr>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>subtotal</th>
			</tr>";
			
			
	foreach($_SESSION['basket'] as $key => $val){ 
		 			
		$sql= "SELECT prodName, prodPrice FROM products WHERE prodId='".$key."'";
		$res = mysqli_query($conn, $sql) or die (mysqli_error($conn));
		
		$prodArray = mysqli_fetch_array($res);
		
		echo "<tr>
				<td>".$prodArray['prodName']."</td>
				<td>".$prodArray['prodPrice']."</td>
				<td>".$val."</td>
				<td>".$subtotal=$val*$prodArray['prodPrice']."</td>";
					$total = $total+$subtotal;		
		
		echo "</tr>";					
	
	}

				echo "<td>TOTAL</td>
					<td></td>
					<td></td>";			
					
					echo "<td>".$total."</td></tr></table><br><br>";
						
	}
}	
	foreach($_SESSION['basket'] as $key => $val){ 
		 
		 $subtotal=$val*$prodArray['prodPrice'];
					$total = $total+$subtotal;		
					
		$sqlOrderLine = "INSERT INTO order_line(orderNo,prodId,quantityOrdered,subTotal) values(".$recentOrderNo.",".$key.",".$val.",".$subtotal.")";
		$resOLine = mysqli_query($conn,$sqlOrderLine) or die(mysqli_error($conn));
				

				
	
}		//same as for basket.php, display the product name, price, ordered quantity and subtotal
		//increment total	
			$sqlUpdateOrderTotal = "UPDATE orders SET orderTotal=".$subtotal." WHERE orderNo=".$recentOrderNo."";
			$resUpdate = mysqli_query($conn,$sqlUpdateOrderTotal) or die(mysqli_error($conn));
	}
	
	echo "To log out and leave the system <a href='logout.php'>Logout</a></br>";
	//echo "Go Back to <a href=login.php> Login </a>";
	
	
	
//include head layout
include("footlayout.html");
?>