<?php 
include('conection.php');

$usuario             = $_POST['usuario'];
$pregunta            = $_POST['pregunta'];
$respuesta           = $_POST['respuesta'];

$sql = ("INSERT INTO evento (usuario, pregunta, respuesta)
	VALUES ('$usuario', '$pregunta', '$respuesta')");


// $sql = ("INSERT INTO evento (usuario, pregunta, respuesta)
// 	VALUES ('$usuario',1,1)");


	if (mysqli_query($conn, $sql)) {
		$last_id = mysqli_insert_id($conn);
		$response['status'] = 'OK';
	} else {
		$response['status'] = 'ERROR';
	}

	echo json_encode($response);

?>