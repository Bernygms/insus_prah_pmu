<?php
if (isset($_POST['op'])) {
	include_once dirname( __DIR__ ) .'/model/model_register.php';
	# code...
	$op =  (isset($_POST['op']) ? $_POST['op'] : NULL);
	$id = (isset($_POST['id']) ? $_POST['id'] : NULL);
	$nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL);
	$usuario = (isset($_POST['usuario']) ? $_POST['usuario'] : NULL);
	$correo = (isset($_POST['correo']) ? $_POST['correo'] : NULL);
	$password = (isset($_POST['password']) ? $_POST['password'] : NULL);
	$status = (isset($_POST['status']) ? $_POST['status'] : NULL);
	$id_app = (isset($_POST['id_app']) ? $_POST['id_app'] : NULL);
	$id_estado = (isset($_POST['id_estado']) ? $_POST['id_estado'] : NULL);
	$objUsuario = new Model_register();
	switch ($op) {
		case 'consultar':
			# Carga de datos al inicio ... 
			
			echo $objUsuario->Read();
			break;
		case 'busqueda':
			# Consulta por nombre en la tabla profesores
			echo  $objUsuario->searchUsuario($id,$nombre);
			break;
		case 'agregar':
			# Agreamos nuevo dato en la tabla profesores
			echo  $objUsuario->addUsuario($nombre,$usuario,strtolower($correo),$password,$status,$id_app,$id_estado);
			break;
		case 'actualizar':
			# Actualizamos la tabla de profesores
			echo  $objUsuario->updateUsuario($id,$nombre,$usuario,$correo,$password,$status,$id_app,$id_estado);
			break;
		case 'eliminar':
			# Eliminamos por parametro en la tabla profesores
			$r =  $objUsuario->deleteUsuario($id);
			json_encode($r);
			//echo json_encode(['success' => ['success' => 'LLego la petición "'.$id.$op.'"']]);
			break;
		default:
			# code...
			echo json_encode(['errors' => ['error' => 'default.']]);
			break;
	}
}else{
	echo  json_encode(['errors' => ['error' => 'Datos incompletos.']]);
}
?>