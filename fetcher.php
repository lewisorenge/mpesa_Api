<?php
include("con.php");

$sql="select * from `patients_details` ";


$r = mysqli_query($con,$sql);
	$result = array();
	while($row = mysqli_fetch_array($r)){
		array_push($result,array(
			"name"=>$row['name'],
			"category"=>$row['category'],
                        "ID"=>$row['IDassigned']
      
		));
	}
	
	echo json_encode(array('result'=>$result));
?>
