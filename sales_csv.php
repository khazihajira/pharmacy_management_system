<?php 
if (isset($_POST['download'])) {
    require "includes/conn.php";

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    header ('Content-Type: text/csv; charset=utf-8');
    header ('Content-Disposition: attachment; filename=Sales.csv');
    $output = fopen("php://output","w");
    fputcsv($output, array('sales Date','Patient','Medicine Name','Price', 'Quanitity', 'total','time'));
    $query = "SELECT sales_date, customer, medicine_name, price, qty, total, time FROM sales WHERE sales_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($result)){
        fputcsv ($output, $row);
    }
    fclose($output);
}

?>