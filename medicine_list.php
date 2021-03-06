
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
                                    <li class="breadcrumb-item active" aria-current="page">Medicine List</li>
									
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
             
				
			 <?php 
                        if (isset($_SESSION['updated_price'])) {
                            echo $_SESSION['updated_price'];
                            unset ($_SESSION['updated_price']);
                        }
               ?>
			   <?php 
                        if (isset($_SESSION['failed_price'])) {
                            echo $_SESSION['failed_price'];
                            unset ($_SESSION['failed_price']);
                        }
               ?>
                   <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">

                    <!-- column -->
                    <div class="col-12">
					<form action="" method="post" class="mb-5">
					<input class="form-control" name="search" type="text"  id="search_text"
					placeholder="Search for Medicine here.......">
				</form>
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Medicine List </h4>  
                                    </div> 
									</div>
									<div class="float-right"> <a href="add_medicine.php" class="btn btn-success float-right"> Add Medicine</a>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle " id="table-data">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th class="border-top-0">S.N</th>
                                            <th class="border-top-0">Medicine Info</th>
											<th class="border-top-0"> Type </th>
											<th class="border-top-0"> Price </th>
											<th class="border-top-0"> Action </th>
											
                                        </tr>
                                    </thead>
																<?php 
														
														require "includes/conn.php";
														
														if(isset($_GET['page']))
																		{
																			$page = $_GET['page'];
																		}
																		else
																		{
																			$page = 1;
																		}

																		$num_per_page = 05;
																		$start_from = ($page-1)*05;
														
																	  $sql ="SELECT * FROM store limit $start_from,$num_per_page";
								//create a query that fetch data from the database
								$res = mysqli_query($conn,$sql);

								//check if there are any records in the database
								if ($res == TRUE) {
									$count = mysqli_num_rows($res);
									$sn=1;
									if($count > 0){
										while ($rows=mysqli_fetch_assoc($res)) {
											$id=$rows['id'];
											$medicine_name=$rows['medicine_name'];
											$type=$rows['type'];
											$capacity=$rows['capacity'];
											$Qty=$rows['Qty'];
											$price=$rows['price'];
											$amount=$rows['amount'];
											$expiry_date= $rows['expiry_date'];
									   ?>
																<tbody>
																	<tr>
																		<th scope="row"><?php echo $sn++;?></th>
																		<td>
																		<p> MID: <b><?php echo "$id";?></b></p>
																		<p> Name:<b><?php echo "$medicine_name";?></b>
																			<small class="text-transform:superscript;"><i><?php echo "$capacity";?></i> </small>
																		</p>
																		<p> Expiry Date: <b><?php echo "$expiry_date";?></b></p>
																		</td>
																		
																		<td><?php echo "$type";?></td>
																		<td><?php echo "$price";?></td>
																		<td>
                                                                            <a  href="update_price.php?id=<?php echo "$id"?>" class="btn btn-success" type="button">Update Price</a>
                                                                        </td>
																	</tr>
																</tbody>
																
																 <?php
										}

									}
								}
							?>
                                </table>
								
								
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-6 md-3">
										<?php 
									$pr_query = "select * from store";
									$pr_result = mysqli_query($conn, $pr_query);
									$total_record = mysqli_num_rows($pr_result);
									
									$total_page = ceil($total_record/$num_per_page);
									
									if($page>1)
                {
                    echo "<a href='medicine_list.php?page=".($page-1)."' class='btn btn-warning'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='medicine_list.php?page=".$i."' class='btn btn-success'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='medicine_list.php?page=".($page+1)."' class='btn btn-warning'>Next</a>";
                }
								?>
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
	
	
			<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



			<script type="text/javascript">
			$(document).ready(function(){
				$("#search_text").keyup(function(){
					var search = $(this).val();
					$.ajax({
						url: 'action.php',
						method:'post',
						data:{query:search},
						success: function(responce){
							$(#table-data).html(responce);
						}
					});
				});
			});
			</script>
</body>

</html>