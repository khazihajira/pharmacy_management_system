
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
  session_start();
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

require "includes/head.php";
//require "includes/auth.php";

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
                           WAKA PHARMACY
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
                                <input type="text" class="form-control" id="search" placeholder=" Live Search here...."> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <?php 
                          
                            if (isset($_GET['id'])) {
                                $_SESSION ['invoice'] = $_GET['invoice'];
                                $_SESSION ['sessionId'] = $_GET['id'];
                               $patient_id = $_SESSION ['sessionId'];
                               $invoice = $_SESSION ['invoice'];
                               
                            }
                            ?>
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
                                    <li class="breadcrumb-item active" aria-current="page">Diagnosis </li>
                                    <li class="breadcrumb-item active" aria-current="page">Patient diagonisis Form </li>
									
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
               
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                    <div align="right">
                                        <a href="diagnosis_2.php?invoice=<?php echo $invoice?> && id=<?php echo "$patient_id";?>" class="btn btn-success">Diagonise Patient</a>
                                        <a href="prescription.php?invoice=<?php echo $invoice?> && id=<?php echo "$patient_id";?>" class="btn btn-warning">Prescribe Medicine</a>
                                        <a href="add_services_offered.php?invoice=<?php echo $invoice?> && id=<?php echo "$patient_id";?>" class="btn btn-info">Add Services Offered</a>
                                        <a href="vaccines.php?invoice=<?php echo $invoice?> && id=<?php echo "$patient_id";?>" class="btn btn-danger">Immunization</a>
										</div>
                                        <br>
                        <div class="card ">
						 <div class="card-body">
                         
                                <!-- title -->
                                <div class="d-md-flex align-items-center print_container">
                                    <div>
                                        <h4 class="card-title">Patients Particulars </h4>  
                                    </div> 
									</div>
                                <!-- title -->
                                
                            </div>
                           
					
							<div class="col-md-12">
								<div class="row print_container">
									<div class="form-group col-md-5 print_container">
                                    <label class="control-label">Patient Name</label>
                                        <?php 	
                                      
                                                        require "includes/conn.php";	
                                                        $sql ="SELECT * FROM patients WHERE id = '$patient_id'";
                                                        //create a query that fetch data from the database
                                                        $res = mysqli_query($conn,$sql);
                        
                                                        //check if there are any records in the database
                                                        if ($res == TRUE) {
                                                            $count = mysqli_num_rows($res);
                                                            $sn=1;
                                                            if($count > 0){
                                                                while ($rows=mysqli_fetch_assoc($res)) {
                                                                    $id=$rows['id'];
                                                                    $patient_name=$rows['patient_name'];
                                                                    $patient_no=$rows['patient_no'];
                                                                    $location=$rows['location'];
                                                                    $p_no=$rows['p_no'];
                                                                    
                                                               ?>
                                                                
										<input readonly type="text" name="service_name" value="<?php echo $patient_name;?>" class="form-control text-right" step="any" id="service_name" >
                                      
                                        <?php
										}

									}
								}
							?>	
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Patient Number</label>
										<input readonly type="text" name="invoice" value="<?php echo $invoice;?>" class="form-control text-right" step="any" id="qty" >
									</div>
									<div class="form-group col-md-3">
										<label class="control-label">Patient's Phone No.</label>
										<input readonly type="text" name="invoice" value="<?php echo $p_no;?>" class="form-control text-right" step="any" id="qty" >
									</div>
                                    
								</div>

                              
                               
                        </div>
						test
                    </div>
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
	
			<script type="text/javascript">
	  $(document).ready(function(){
		$("#search").keypress(function(){
		  $.ajax({
			type:'POST',
			url:'diagnosis_search.php',
			data:{
			  name:$("#search").val(),
			},
			success:function(data){
			  $("#output").html(data);
			}
		  });
		});
	  });
	</script>

<script>
$(document).ready(function(){
 var count = 1;
 $('#addd').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
  html_code += "<td contenteditable='true' class='patient_no' ><?php echo $patient_no;?></td>";
   html_code += "<td contenteditable='true' class='test_name'></td>";
   html_code += "<td contenteditable='true' class='description'></td>";
  
   
   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();


 });
 $('#submit').click(function(){
  var patient_no = [];
  var test_name = [];
  var description = [];


  $('.patient_no').each(function(){
    patient_no.push($(this).text());
  });

  $('.test_name').each(function(){
    test_name.push($(this).text());
  });
  
  $('.description').each(function(){
    description.push($(this).text());
  });
 
  
  
  $.ajax({
   url:"lab_inc.php",
   method:"POST",
   data:{patient_no: patient_no, description, test_name},
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
   url:"fetch_lab_results.php",
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




















