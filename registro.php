<?php 
include('conection.php');

$nombres           = $_POST['nombres'];
$email             = $_POST['email'];
$empresa           = $_POST['empresa'];
$telefono          = $_POST['telefono'];
$checkbox          = $_POST['checkboxvalor'];
$fecha             = date('Y-m-d H:i:s');

$sql = ("INSERT INTO usuarios (nombres, email, empresa, telefono, checkbox, fecha)
	VALUES ('$nombres', '$email',' $empresa', '$telefono', '$checkbox', '$fecha')");

if (mysqli_query($conn, $sql)) {
	$last_id = mysqli_insert_id($conn);
	$response['status'] = 'OK';
	$response['id_usuario'] = $last_id;
} else {
	$response['status'] = 'ERROR';
}

echo json_encode($response);

?>