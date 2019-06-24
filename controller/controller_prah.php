<?php
if (isset($_POST['op'])) {
	include_once dirname( __DIR__ ) .'/model/model_prah.php';
	
	$op =  (isset($_POST['op']) ? $_POST['op'] : NULL);
	#parametro id pra la consulta de files 
	$id_file = (isset($_POST['id_file']) ? $_POST['id_file'] : NULL);

	#identificador de los files.... cuando se genera lanueva propuesta
	$num_prop = (isset($_POST['num_prop']) ? $_POST['num_prop'] : NULL);

	#primera face para la subida de propuestas file 
	$ofic_porp = (isset($_FILES['ofic_porp']) ? $_FILES['ofic_porp'] : NULL);
	$anexo6 = (isset($_FILES['anexo6']) ? $_FILES['anexo6'] : NULL);
	$anexo7 = (isset($_FILES['anexo7']) ? $_FILES['anexo7'] : NULL);
	$lis_de_bene = (isset($_FILES['lis_de_bene']) ? $_FILES['lis_de_bene'] : NULL);
	#Datos de entrada para eliminar los primeros 4 pdfs 
	$ofic_porp_nombre = (isset($_POST['ofic_porp_nombre']) ? $_POST['ofic_porp_nombre'] : NULL);
	$anexo6_nombre = (isset($_POST['anexo6_nombre']) ? $_POST['anexo6_nombre'] : NULL);
	$anexo7_nombre = (isset($_POST['anexo7_nombre']) ? $_POST['anexo7_nombre'] : NULL);
	$lis_de_bene_nombre = (isset($_POST['lis_de_bene_nombre']) ? $_POST['lis_de_bene_nombre'] : NULL);

	#pdf que sube insus, oficio de autorizacion 
	$ofi_de_auto = (isset($_FILES['ofi_de_auto']) ? $_FILES['ofi_de_auto'] : NULL);
	#Dato de entrada , para eliminar pdf deoficio de  autorizacion 
	$ofi_de_auto_nombre = (isset($_POST['ofi_de_auto_nombre']) ? $_POST['ofi_de_auto_nombre'] : NULL);

	#3 pdf's para el cierre del ejercicio 
	$ofi_de_acue = (isset($_FILES['ofi_de_acue']) ? $_FILES['ofi_de_acue'] : NULL);
	$acue_de_libe = (isset($_FILES['acue_de_libe']) ? $_FILES['acue_de_libe'] : NULL);
	$cier_ejer_y_cont = (isset($_FILES['cier_ejer_y_cont']) ? $_FILES['cier_ejer_y_cont'] : NULL);

	#3 datos de entrada para eliminar los pdfs
	$ofi_de_acue_nombre = (isset($_POST['ofi_de_acue_nombre']) ? $_POST['ofi_de_acue_nombre'] : NULL);
	$acue_de_libe_nombre = (isset($_POST['acue_de_libe_nombre']) ? $_POST['acue_de_libe_nombre'] : NULL);
	$cier_ejer_y_cont_nombre = (isset($_POST['cier_ejer_y_cont_nombre']) ? $_POST['cier_ejer_y_cont_nombre'] : NULL);

	#vobo que se va dar en insus por el administrador 
	$vobo = (isset($_POST['vobo']) ? $_POST['vobo'] : NULL);

	#Fecha inicio, solo para consultas 
	$fech_ini = (isset($_POST['fech_ini']) ? $_POST['fech_ini'] : NULL);
	$fech_end = (isset($_POST['fech_end']) ? $_POST['fech_end'] : NULL);

	#Proyecto 
	$app = (isset($_POST['app']) ? $_POST['app'] : NULL);
	$id_app_fk = (isset($_POST['id_app_fk']) ? $_POST['id_app_fk'] : NULL);

	#Anno de la practica 
	$anno = (isset($_POST['anno']) ? $_POST['anno'] : NULL);

	$comment_vobo = (isset($_POST['comment_vobo']) ? $_POST['comment_vobo'] : NULL);
	$status_pro = (isset($_POST['status_pro']) ? $_POST['status_pro'] : NULL);
	$comment_pro = (isset($_POST['comment_pro']) ? $_POST['comment_pro'] : NULL);


	#Varibles para la consulta de estados
	$id_estado = (isset($_POST['id_estado']) ? $_POST['id_estado'] : NULL);
	$nombre_estado = (isset($_POST['nombre_estado']) ? $_POST['nombre_estado'] : NULL);

	$max = 125829120;
	$objPrah = new Model_prah();

	switch ($op) {
		case 'consultar_estados':
			#Consulta por nombre en la tabla estados
			echo  $objPrah->searchEstadosPrah($id_estado);
			break;
		case 'busqueda_file':
			#Consulta por nombre en la tabla estados
			echo  $objPrah->readFile($id_file);
			break;
		case 'consultar_files':
			#Consulta por nombre en la tabla files
			echo $objPrah->readFilesPrah($id_estado, $anno, $id_app_fk);
			break;
		case 'update_vobo':
			if ($vobo == "" && $comment_vobo == "") {
				echo "Datos incompletos .....";
			}else{
				$result = $objPrah->updateVobo($id_file, $vobo, $comment_vobo);
				if ($result == true) {
					echo "Se actualizo correctamente";
				}else{
					echo "No se pudo actualizar :(";
				}
			}
			break;
		case 'agregar':
			# Agreamos nuevo dato en la tabla estados
			$carpeta = '../files/'.$app.'/'.date("Y").'/'.$id_estado.'/';
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0777, true);
			}

			if ($ofic_porp["type"] == "application/pdf" && $ofic_porp["size"] <= $max) {
				$ofic_porp_encript = $num_prop."-".md5( $ofic_porp["tmp_name"]).".pdf";
			}else{
				echo "El archivo Oficio de Propuesta ".$ofic_porp['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$ofic_porp_encript = "";
			}

			if ($anexo6["type"] == "application/pdf" && $anexo6["size"] <= $max ) {
				$anexo6_encript =$num_prop."-".md5($anexo6["tmp_name"]).".pdf";
				#echo $anexo6_encript;
			}else{
				echo "El archivo Anexo 6 con nombre  ".$anexo6['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$anexo6_encript = ""; 
			}

			if ($anexo7["type"] == "application/pdf" && $anexo7["size"] <= $max ) {
				$anexo7_encript =$num_prop."-".md5($anexo7["tmp_name"]).".pdf";
				#echo $anexo7_encript;
			}else{
				echo "El archivo Anexo 7 con nombre  ".$anexo7['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$anexo7_encript = "";
			}

			if ($lis_de_bene["type"] == "application/pdf" && $lis_de_bene["size"] <= $max) {
				$lis_de_bene_encript =$num_prop."-".md5($lis_de_bene["tmp_name"]).".pdf";
				#echo $lis_de_bene_encript;
			}else{
				echo "El archivo Listado de Beneficiarios con nombre  ".$lis_de_bene['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$lis_de_bene_encript = "";
			}

			#Validar por ultima vez para que los datos ya se guarden a la bd.
			if (!empty($num_prop) && !empty($ofic_porp_encript) && !empty($anexo6_encript) && !empty($anexo7_encript) && !empty($lis_de_bene_encript && !empty($id_estado) && !empty($id_app_fk))) {
				if (file_exists($carpeta)) {

					move_uploaded_file($ofic_porp["tmp_name"], $carpeta.$ofic_porp_encript);
					move_uploaded_file($anexo6["tmp_name"], $carpeta.$anexo6_encript);
					move_uploaded_file($anexo7["tmp_name"], $carpeta.$anexo7_encript);
					move_uploaded_file($lis_de_bene["tmp_name"], $carpeta.$lis_de_bene_encript);
					echo  $objPrah->addFilesPrah($num_prop ,$ofic_porp_encript ,$anexo6_encript,$anexo7_encript,$lis_de_bene_encript,$id_estado,$id_app_fk);
				}else{
					echo "No existe la carpeta";
				}
			}

			break;
		case 'editar':
			# Actualizamos la tabla de estados
			$carpeta = '../files/'.$app.'/'.$anno.'/'.$id_estado.'/';

			if ($ofic_porp["type"] == "application/pdf" && $ofic_porp["size"] <= $max) {
				#$ofic_porp_encript = $num_prop."-".md5( $ofic_porp["tmp_name"]).".pdf";
				#echo $ofic_porp["name"];
			}else{
				echo "El archivo Oficio de Propuesta ".$ofic_porp['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$ofic_porp = "";
			}

			if ($anexo6["type"] == "application/pdf" && $anexo6["size"] <= $max ) {
				#$anexo6_encript =$num_prop."-".md5($anexo6["tmp_name"]).".pdf";
				#echo $anexo6["name"];
			}else{
				echo "El archivo Anexo 6 con nombre  ".$anexo6['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$anexo6 = ""; 
			}

			if ($anexo7["type"] == "application/pdf" && $anexo7["size"] <= $max ) {
				#$anexo7_encript =$num_prop."-".md5($anexo7["tmp_name"]).".pdf";
				#echo $anexo7["name"];
				#echo $anexo7_encript;
			}else{
				echo "El archivo Anexo 7 con nombre  ".$anexo7['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$anexo7 = "";
			}

			if ($lis_de_bene["type"] == "application/pdf" && $lis_de_bene["size"] <= $max) {
				#$lis_de_bene_encript =$num_prop."-".md5($lis_de_bene["tmp_name"]).".pdf";
				#echo $lis_de_bene["name"];
			}else{
				echo "El archivo Listado de Beneficiarios con nombre  ".$lis_de_bene['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$lis_de_bene = "";
			}
			if (!empty($id_file) && !empty($num_prop) && !empty($ofic_porp) && !empty($anexo6) && !empty($anexo7) && !empty($lis_de_bene) && !empty($app) && !empty($anno) && !empty($id_estado) && !empty($ofic_porp_nombre) && !empty($anexo6_nombre) && !empty($anexo7_nombre) && !empty($lis_de_bene_nombre))  {	
				#echo $carpeta;
				if (file_exists($carpeta)) {
					$encript_edit_ofic_porp = $num_prop."-".md5($ofic_porp["tmp_name"]).".pdf";
					$encript_edit_anexo6 = $num_prop."-".md5($anexo6["tmp_name"]).".pdf";
					$encript_edit_anexo7 = $num_prop."-".md5($anexo7["tmp_name"]).".pdf";
					$encript_edit_lis_de_bene = $num_prop."-".md5($lis_de_bene["tmp_name"]).".pdf";

					$datos = $objPrah->updateFilesOAAL($id_file, $num_prop, $encript_edit_ofic_porp,$encript_edit_anexo6, $encript_edit_anexo7,$encript_edit_lis_de_bene);
					if ($datos == true) {
						move_uploaded_file($ofic_porp["tmp_name"], $carpeta.$encript_edit_ofic_porp);
						move_uploaded_file($anexo6["tmp_name"], $carpeta.$encript_edit_anexo6);
						move_uploaded_file($anexo7["tmp_name"], $carpeta.$encript_edit_anexo7);
						move_uploaded_file($lis_de_bene["tmp_name"], $carpeta.$encript_edit_lis_de_bene);

						if (file_exists($carpeta.$ofic_porp_nombre)) {
							unlink($carpeta.$ofic_porp_nombre);
						}
						if (file_exists($carpeta.$anexo6_nombre)) {
							unlink($carpeta.$anexo6_nombre);
						}
						if (file_exists($carpeta.$anexo7_nombre)) {
							unlink($carpeta.$anexo7_nombre);
						}
						if (file_exists($carpeta.$lis_de_bene_nombre)) {
							unlink($carpeta.$lis_de_bene_nombre);
						}
						echo "La propuesta con identificador: ".$num_prop . " se actualizo correctamente.";
					}else{
						echo "No se pudo actualizar";
					}
				}else{
					echo "No existe la carpeta";
				}

			}else{
				echo "no-Ok";
			}
		
			break;
		case 'oficio_de_autorizacion':
			$carpeta = '../files/'.$app.'/'.$anno.'/'.$id_estado.'/';
			if ($ofi_de_auto["type"] == "application/pdf" && $ofi_de_auto["size"] <= $max) {
				#echo $ofi_de_auto["name"];
			}else{
				echo "El archivo Oficio de Autorización con nombre  ".$ofi_de_auto['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$ofi_de_auto = "";
			}
			if (!empty($id_file) && !empty($app) && !empty($anno) && !empty($id_estado) && !empty($ofi_de_auto) && !empty($num_prop))  {	
				if (file_exists($carpeta)) {
					$encript_edit_ofi_de_auto = $num_prop."-".md5($ofi_de_auto["tmp_name"]).".pdf";
					$result = $objPrah->updateFileAutorizacion($id_file, $encript_edit_ofi_de_auto);
					if ($result == true) {
						move_uploaded_file($ofi_de_auto["tmp_name"], $carpeta.$encript_edit_ofi_de_auto);
						if ($ofi_de_auto_nombre == "") {
						}else{
							unlink($carpeta.$ofi_de_auto_nombre);
						}
						echo "La propuesta con identificador: ".$num_prop . " se actualizo correctamente en Oficio de Autorización.";
					}else{
						echo "No se pudo actualizar";
					}
					
				}else{
					echo "No existe el directorio.";
				}
			}else{
				echo "----no-OK";
		    }
			break;
		case 'editarOAC':
			$carpeta = '../files/'.$app.'/'.$anno.'/'.$id_estado.'/';

			if ($ofi_de_acue["type"] == "application/pdf" && $ofi_de_acue["size"] <= $max) {
				#echo $ofi_de_acue["name"];
			}else{
				echo "El archivo Oficio de Acuerdo con nombre  ".$ofi_de_acue['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$ofi_de_acue = "";
			}
			if ($acue_de_libe["type"] == "application/pdf" && $acue_de_libe["size"] <= $max) {
				#echo $acue_de_libe["name"];
			}else{
				echo "El archivo Acuerdo de Liberación con nombre  ".$acue_de_libe['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$acue_de_libe = "";
			}
			if ($cier_ejer_y_cont["type"] == "application/pdf" && $cier_ejer_y_cont["size"] <= $max) {
				#echo $cier_ejer_y_cont["name"];
			}else{
				echo "El archivo Cierre de ejercicio y control del ejercicio con nombre  ".$cier_ejer_y_cont['name']. " no se puede subir, asegurate que sea un pdf y que no supere los 120 MB de archivo.";
				$cier_ejer_y_cont = "";
			}
			if (!empty($id_file) && !empty($app) && !empty($anno) && !empty($id_estado) && !empty($num_prop) && !empty($ofi_de_acue) && !empty($acue_de_libe) && !empty($cier_ejer_y_cont))  {	
				if (file_exists($carpeta)) {
					$encript_ofi_de_acue = $num_prop."-".md5($ofi_de_acue["tmp_name"]).".pdf";
					$encript_acue_de_libe = $num_prop."-".md5($acue_de_libe["tmp_name"]).".pdf";
					$encript_cier_ejer_y_cont = $num_prop."-".md5($cier_ejer_y_cont["tmp_name"]).".pdf";

					$result = $objPrah->updateFileOAC($id_file, $encript_ofi_de_acue,$encript_acue_de_libe,$encript_cier_ejer_y_cont);
					if ($result == true) {
						move_uploaded_file($ofi_de_acue["tmp_name"], $carpeta.$encript_ofi_de_acue);
						move_uploaded_file($acue_de_libe["tmp_name"], $carpeta.$encript_acue_de_libe);
						move_uploaded_file($cier_ejer_y_cont["tmp_name"], $carpeta.$encript_cier_ejer_y_cont);

						if ($ofi_de_acue_nombre == "" || $acue_de_libe_nombre == "" || $cier_ejer_y_cont_nombre ) {
						}else{
							unlink($carpeta.$ofi_de_acue_nombre);
							unlink($carpeta.$acue_de_libe_nombre);
							unlink($carpeta.$cier_ejer_y_cont_nombre);
						}
						echo "La propuesta con identificador: ".$num_prop . " se actualizo correctamente en Oficio de Autorización.";
					}else{
						echo "No se pudo actualizar";
					}
					
				}else{
					echo "No existe el directorio.";
				}
			}else{
				echo "----no-OK";
		    }
			
			break;

		case 'eliminar':
			# Eliminamos por parametro en la tabla estados
			$r =  $objPrah->deleteFilesPrah($id_file);
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