<?php
require_once('connection.php');
class Model_login {
    protected $db;
    public function __construct(){
        $this->db = DB();
    }
    #Funcion para elacceso alportal 
    public function acceso($correo,$password,$app){
        $query = $this->db->prepare("SELECT id_usuario, nombre, usuario, correo, password, status, id_app_fk,id_estado_fk, nombre_app
            FROM usuarios INNER JOIN apps 
            ON usuarios.id_app_fk = apps.id_app  WHERE correo =:correo AND password=:password AND id_app_fk=:app");
        $query->bindParam(":correo", $correo, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":app", $app, PDO::PARAM_INT);
        $query->execute();
        $result = $query-> fetchAll();
        if ($result) {
            return $result;
        }else{
            return false;
        }
    }

}