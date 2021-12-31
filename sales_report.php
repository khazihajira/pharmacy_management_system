
<!DOCTYPE html>
<html dir="ltr" lang="en">

<?php 
session_start();
require "includes/head.php";
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
                        <h4 class="page-title">Sales</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
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
               
                   <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Sales Report </h4>
                                    </div>
                                    
                                </div>
                                <!-- title -->
                            </div>
                           
                            <div class="table-responsive">
                            <center>
                       <form action="" method="post" id="manage-receiving">
					
					<div class="col-md-12 align-center">
                    <p>Get the sales between Dates</p>
						<hr>
						<div class="row mb-3">
								<div class="col-md-4">
									<label class="control-label">As from Date</label>
									<input type="date" name="start_date"  class="form-control text-right" step="any"  >	
								</div>
								<div class="col-md-4">
									<label class="control-label">To  Date</label>
									<input type="date" name="end_date"  class="form-control text-right" step="any"  >	
								</div>
                                <div class="col-md-4 ">
                                <label class="control-label">&nbsp</label>
                                <button type="submit" class="btn btn-success btn-block" name="search">Query</button>
								</div>
                               
						</div>
                        
						</form>

</center>
                            
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-warning">
                                            <th class="border-top-0">S.N</th>
                                            <th class="border-top-0">Patient Name</th>
                                            <th class="border-top-0">Medicine Name</th> 
                                            
                                            <th class="border-top-0">Total</th>   
                                        </tr>
                                    </thead>
                                    <?php 
                                  require "includes/conn.php";
                                  
                                  
                                  if(isset($_POST['search'])){
                                      //echo "Was clicked";
                                     // session_start();
                                      $_SESSION['start_date'] =  $_POST['start_date'];
                                      $_SESSION['end_date'] =  $_POST['end_date'];
                                      $start_date = $_SESSION['start_date'];
                                      $end_date = $_SESSION['end_date'];
                                      
                                        ?>
                                        
                                        <!---  This is the form to download CSV File --->
                                                <center>
                                                <form action="sales_csv.php" method="post" >
                                                <input type="hidden" name="start_date" value="<?php echo $start_date?>">
                                                <input type="hidden" name="end_date" value="<?php echo $end_date?>" >
                                                <button type="submit" name="download" class="btn btn-success">Export CSV</button>
                                            </form>
                                            <br>
                                            <br>
                                            
                                                </center>
                                           

                                        <!---  This is the form to download CSV File --->
                                        <h6 class="text-center">Sales report from <?php echo $start_date;?>   to   <?php echo $end_date?></h6>
                                        <?php
                                     
                                    
                                      $query = "SELECT * FROM sales WHERE sales_date BETWEEN '$start_date' AND '$end_date' AND patient_type !='student' " ;
                                      $result = $conn->query ($query);
                                     
                                      if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            
                                            ?>
                                            <tr>
                                           
                                            <td><?php echo $row['invoice'];?></td>
                                            <td><?php echo $row['customer'];?></td>
                                            <td><?php echo $row['medicine_name'];?></td>
                                           
                                            <td><?php echo $row['total'];?></td>
                                            </tr>
                                          
                                            <?php
                                           
                                        }
                                      }else {
                                          ?>

                                          <h6 class="text-center text-danger">There no records matching the dates selected</h6>
                                          <?php
                                      }
                                      
                                  }
                                   
                                ?>

                                <tr>
                                  
                                  <td></td>
                                  <td></td>
                                  <td><b>Total</b></td>
                                  <td>
                                    <?php 
                                    
                                        if (isset($_POST['search'])) {
                                          ?>

                                            <?php 
                                            $sql ="SELECT SUM(total) as 'total' FROM sales WHERE sales_date BETWEEN '$start_date' AND '$end_date' AND patient_type != 'student' ";
                                    //create a query that fetch data from the database
                                    $res = mysqli_query($conn,$sql);
                                    $data = mysqli_fetch_array($res);	
                                           ?>
                                            <h2 class="card-title"><?php echo $data['total'];?></h2>

                                            <?php

                                        }else {
                                            echo "0/-";
                                        }
                                    ?>
                                  
                                  </td>
                                </tr>

                                </table>
                                <hr width="5px">
                                <hr>
                               
                            </div>
                        </div>
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
            <footer class="footer text-center">
                All Rights Reserved 
            </footer>
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
        url:'pharmacy_search.php',
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
</body>

</html>