<?php 
include('conection.php');

$sql = 'SELECT * FROM preguntas1';
$data = $conn->query($sql);

$response = array();
if ($data) {
	while ($row = $data->fetch_object()){
		$group_arr[] = $row;
	}
	$response['data'] = $group_arr;
	$response['status'] = 'OK';
} else {
	$response['data'] ='';
	$response['status'] = 'ERROR';
}

echo json_encode($response);

?>