<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "waka_pharmacy_waka");
if(isset($_POST["customer"]))
{
 $customer = $_POST["customer"];
 $patient_type = $_POST["patient_type"];
 $invoice = $_POST["invoice"];
 $medicine_name = $_POST["medicine_name"];
 $price = $_POST["price"];
 $qty = $_POST["qty"];
 $query = '';
 for($count = 0; $count<count($customer); $count++)
 {
  $customer_clean = mysqli_real_escape_string($connect, $customer[$count]);
  $patient_type_clean = mysqli_real_escape_string($connect, $patient_type[$count]);
  $invoice_clean = mysqli_real_escape_string($connect, $invoice[$count]);
  $medicine_name_clean = mysqli_real_escape_string($connect, $medicine_name[$count]);
  $price_clean = mysqli_real_escape_string($connect, $price[$count]);
  $qty_clean = mysqli_real_escape_string($connect, $qty[$count]);
  if($customer_clean != '' && $invoice_clean != '' && $medicine_name_clean != '' && $price_clean != '' && $qty_clean != '')
  {
   $query .= '
   INSERT INTO sales(customer,patient_type, invoice, medicine_name, price,qty) 
   VALUES("'.$customer_clean.'", "'.$patient_type_clean.'", "'.$invoice_clean.'", "'.$medicine_name_clean.'", "'.$price_clean.'", "'.$qty_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Medicine Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>