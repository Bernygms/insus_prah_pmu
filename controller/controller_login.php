<?php 
require_once('../model/model_login.php');
$modo = isset($_GET['modo']) ? $_GET['modo'] : 'default';
switch ($modo) {
    case 'login':
        if (isset($_POST['login'])) {
            if (!empty($_POST['correo']) && ! empty($_POST['password']) && ! empty($_POST['app'])&& ! empty($_POST['anno'])){
                $result = "";
                $objLogin = new Model_login();
                session_start();
                $result = $objLogin->acceso(strtolower($_POST['correo']), md5($_POST['password']), $_POST['app']);
                if ($result==false) {
                    header('location: ../view/login.php?respuesta=correo_o_contrasena_incorrectos1');
                }else{ 
                    foreach ($result as  $users) {                       
                        if (strtolower($_POST['correo']) == $users['correo'] && md5($_POST['password']) == $users['password']) {
                            $_SESSION['id_usuario'] = $users['id_usuario'];
                            $_SESSION['nombre'] = $users['nombre'];
                            $_SESSION['usuario'] = $users['usuario'];
                            $_SESSION['correo'] = $users['correo'];
                            $_SESSION['status'] = $users['status'];
                            $_SESSION['id_app_fk'] = $users['id_app_fk'];
                            $_SESSION['id_estado_fk'] = $users['id_estado_fk'];
                            $_SESSION['nombre_app'] = $users['nombre_app']; 
                            # code...
                            $_SESSION['anno'] = $_POST['anno'];
                        
                            header('location: ../view/prah.php');
                        } else {
                            header('location: ../view/login.php?respuesta=correo_o_contrasena_incorrectos1`ncorrectos2');
                        }
                    }
               }
               
            } else {
                header('location: ../view/login.php?respuesta=campos_vacios');
            }
        } else {
            header('location: ../view/login.php?respuesta=Error_sistema');
        }
        break; 
    default:
        header('location: ../view/login.php?respuesta=default');
        break;
}
?>