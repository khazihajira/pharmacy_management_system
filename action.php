<?php
include 'includes/conn.php';

$output='';

if(isset($_POST['query'])){
	$search = $_POST['query'];
	$stmt= $conn->prepare("SELECT * FROM store WHERE medicine_name 
	LIKE CONCAT('%', ?,'%');
	$stmt->bind_param('s',$search)
	");
}else{
	$stmt=$conn->prepare("SELECT * FROM store");
}
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows>0){
	$output = "
	<thead>
        <tr class='bg-dark text-white'>
            <th >S.N</th>
            <th >Medicine Info</th>
			<th > Type </th>
			<th > Price </th>
											
			</tr>
            </thead>
			</tbody>
	
	";
	while ($row=$result->fetch_assoc()){
		$output . ="
		<tr>
		<td>
		<p> Name:<b>.$row['medicine_name'].</b>
		<small class='text-transform:superscript;'><i>.$row['capacity'].</i> </small>
		</p>
		<p> Expiry Date: <b>.$row['type'].</b></p>
		</td>															
		<td>.$row['price'].</td>
		<td>.$row['medicine_name'].</td>																
		</tr>
		";
	}
	$output .="</tbody>";
	echo $output;
}else{
	echo "<h3> No records Found!";
}

?>