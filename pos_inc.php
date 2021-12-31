<?php

session_start ();
require "includes/conn.php";

if(isset($_POST['submit'])){
	
	
	
	$customer = $_POST['customer'];
	$id = $_POST['id'];
	$pharmacy_Qty = $_POST['pharmacy_Qty'];
	$invoice = $_POST['invoice'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	
	//new pharmacy balance
	$new_balance = $pharmacy_Qty - $qty;
	$amount = $qty * $price;


	//check whether the pharmacy is stocked

	if ($pharmacy_Qty <= 0) {
		$_SESSION['out-stock'] = "<div class='alert alert-danger'> The medicine is out of stock</div>";
						header ("Location:sales.php");
						exit();

		//if the pharmacy is stocked insert the data collected to sales order
	}
	elseif ($pharmacy_Qty < $qty) {
		$_SESSION['stock-exceeds'] = "<div class='alert alert-danger'> The Quantity Requested Exceeds the pharmacy Stock Available</div>";
						header ("Location:sales.php");
						exit();
	}
	elseif ($pharmacy_Qty > 0) {
		$sql = "INSERT INTO sales_order SET
	
	invoice = '$invoice',
	qty = '$qty',
	price = '$price',
	customer = '$customer',
	medicine_name = '$id',
	amount = '$amount'
	
	";
	$res = mysqli_query($conn, $sql);
	}


	if($pharmacy_Qty > 0 ){
		
		$sql2 = " UPDATE pharmacy_stock SET
		
		pharmacy_Qty = '$new_balance'
		WHERE id = '$id';
		";
		$res2 = mysqli_query($conn, $sql2);
		if($res2 = true){
			$_SESSION['update'] = "<div class='alert alert-success'> Updated Succesifuly</div>
			";
			header("Location:sales.php");
		}else{
			$_SESSION['failed'] = "<div class='alert alert-danger'> Failed to Update</div>
			";
			header("Location:sales.php");
		}
	}
	
	
	
}


?>