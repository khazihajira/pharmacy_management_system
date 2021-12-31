
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='WAKA-'.createRandomPassword();
?>
<?php 
session_start();
require "includes/head.php";
require "includes/auth.php";

?>


<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                        WAKA MEDICAL CENTER

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php require "includes/aside.php";?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Diagonise Section </li>
									
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php 
                            
                            if (isset($_GET['id'])) {
                              $id = $_GET['id'];
                              
                            }
                            ?>
                              <!-- Container fluid  -->

            <!-- ============================================================== -->
            <!-- This Php script is to help us get the patient Id to help us produce the receipt for this patient--!>

            <?php 
														
                                                        require "includes/conn.php";	
                                                        $sql ="SELECT * FROM patients WHERE id = '$id'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $patient_name=$rows['patient_name'];
                                                                    $patient_no=$rows['patient_no'];
                                                                    $location=$rows['location'];
                                                                    $dob=$rows['dob'];
                                                               ?>
									
                                        <?php
										}

									}
								}
							?>	
              
            <!-- ============================================================== -->

            <div class="container-fluid">
               
                <!-- ============================================================== -->
                <!-- Patient Details -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                
                        <div class="card">
						 <div class="card-body">  
						  <div align="right">
								 
                          <a href="mode_payment.php?id=<?php echo $patient_no;?> && patient_id=<?php echo $id;?>" class="btn btn-warning">Continue to sales</a>
								</div>
                            </div>
							
                 <!-- ============================================================== -->
                <!-- Patient Details -->
                <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                 <!--Services Offered -->
                                     <h4 class="print_container">Medicine Prescribed</h4>
                                    <hr>
                                    <div class="print_container" id="inserted_diagnosis_data">
                                    <!-- Services Offered ---> 
                                    <table class="table table-bordered" id="crud_table">
                                        <tr>
                                        <th width="30%">Patient Name</th>
                                        <th width="30%">Patient Type</th>
                                        <th width="20%">Invoice No.</th>
                                        <th width="45%">Medicine Name</th>
                                        <th width="45%">Medicine Quanitity</th>
                                        <th width="10%">Price</th>
                                        <th width="5%"></th>
                                        </tr>
                                                      <?php 
														
                                                        require "includes/conn.php";				
                                                        $sql ="SELECT * FROM sales_order WHERE invoice ='$patient_no'  && status = '0'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $transaction_id=$rows['transaction_id'];
                                                                    $medicine_name =$rows['medicine_name']; 
                                                                    $price=$rows['price'];
                                                                    $invoice=$rows['invoice'];
                                                                    $qty=$rows['qty'];
                                                                    $customer=$rows['customer'];
                                                                    $patient_type=$rows['patient_type'];
                                                                    
																   
                                                               ?>
                                                        <tr>
                                                        <td contenteditable='false' class='customer' ><?php echo $customer?></td>
                                                        <td contenteditable='false' class='patient_type' ><?php echo $patient_type?></td>
                                                        <td contenteditable='true' class='invoice'><?php echo $invoice?></td>
                                                        <td contenteditable='true' class='medicine_name'><?php echo $medicine_name?></td>
                                                        <td contenteditable='true' class='qty'><?php echo $qty?></td>
                                                        <td contenteditable='true' class='price' ><?php echo $price?></td>
                                                       
                                                        
                                                        </tr>
                                                        <?php
                                                                    }

                                                                }

                                                            }else {
                                                                ?>
                                                            <h4 class="text-danger " align="center">No Service Offered</h4>
                                                                <?php
                                                            }
                                                        ?>		
                                                    
                                    </table>
                                    <!-- Services Offered ---> 

                                    <div align="right">
                                    
                                         <?php 
										$sql ="SELECT SUM(amount) as 'amount' FROM sales_order  WHERE invoice ='$patient_no' && status = '0'  && status = '0' ";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);
								$data = mysqli_fetch_array($res);	
									   ?>
                                      <?php 
                                        if ($data['amount'] >1) {
                                            ?>
                                            <h4>Total:
                                            <h2 class="card-title"><?php echo $data['amount'];?></h2>
                                            <?php
                                        }else {
                                            ?>
                                            <!-- <h2 class="card-title">Paid</h2>-->
                                            <?php
                                        }
                                      
                                      ?>
                                       </div>
                                    
                                       <button type="button" name="save" id="save" class=" btn btn-success btn-block">Submit</button>
                                    </div>
                                    
                                           
                    <!-- Services Offered -->

                <!-- ============================================================== -->
                <!-- Prescription -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
               
                        <div class="card">
						 <div class="card-body">  
                            </div>
							<div class="col-md-12">
								<div class="row">    
                                       
									
                                   
                 <!-- ============================================================== -->
                <!-- Prescription -->
                <!-- ============================================================== -->
                                
                </div>
				
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
		
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
	
    <script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
  html_code += "<td contenteditable='false' class='customer' ><?php echo $customer?></td>";
  html_code += "<td contenteditable='false' class='patient_type' ><?php echo $patient_type?></td>";
   html_code += "<td contenteditable='true' class='invoice'><?php echo $invoice?></td>";
   html_code += "<td contenteditable='true' class='medicine_name'><?php echo $medicine_name?></td>";
   html_code += "<td contenteditable='true' class='qty'><?php echo $qty?></td>";
   html_code += "<td contenteditable='true' class='price' ><?php echo $price?></td>";
   
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();


 });
 $('#save').click(function(){
  var customer = [];
  var patient_type = [];
  var invoice = [];
  var medicine_name = [];
  var price = [];
  var qty = [];

  $('.customer').each(function(){
    customer.push($(this).text());
  });
  
  $('.invoice').each(function(){
    invoice.push($(this).text());
  });

  $('.patient_type').each(function(){
    patient_type.push($(this).text());
  });

  $('.medicine_name').each(function(){
    medicine_name.push($(this).text());
  });
  $('.price').each(function(){
    price.push($(this).text());
  });
  $('.qty').each(function(){
    qty.push($(this).text());
  });
  
  
  $.ajax({
   url:"sales_inc.php",
   method:"POST",
   data:{customer:customer,patient_type,invoice, medicine_name, price,qty},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 

});

</script>

	
</body>

</html>




















