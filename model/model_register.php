<?php
require __DIR__ .'/connection.php';
class Model_register{
    protected $db;
    public function __construct(){
        $this->db = DB();
    }
    public function Read(){
        $query = $this->db->prepare("SELECT id_usuario, nombre, usuario, correo, password, status, id_app_fk, id_estado_fk FROM usuarios  ORDER BY nombre ASC");
        $query->execute();
        $data["success"] = true;
        $data["data"]["usuarios"] = array();
        while($row = $query-> fetchAll(PDO::FETCH_ASSOC)){
            $data["data"]["usuarios"] = $row;
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($data);
    }

    public function searchUsuario($id,$nombre){

        $query = $this->db->prepare("SELECT * FROM usuarios WHERE id=:id or nombre=:nombre");
        $query->bindParam(":id", $id, PDO::PARAM_STR);
        $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $query->execute();
        $data["success"] = true;
        $data["data"]["usuario"] = array();
        while($row = $query-> fetch(PDO::FETCH_ASSOC)){
            $data["data"]["usuario"] = $row;
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($data);
    }

    #Funcional ...para egragar usuarios 
    public function addUsuario($nombre,$usuario,$correo,$password,$status,$id_app,$id_estado){
        try {
            $query =  $this->db->prepare("INSERT INTO usuarios(nombre, usuario, correo, password, status, id_app_fk, id_estado_fk) VALUES (?,?,?,?,?,?,?)");
            $query->execute(array($nombre,$usuario,$correo,md5($password),$status,$id_app,$id_estado));
            $data["success"] = true;
            $datos = [
                'id_usuario' =>$this->db->LastInsertId(),
                'nombre' =>$nombre,
                'usuario' =>$usuario,
                'correo' =>$correo,
                'status' =>$status,
                'id_app' =>$id_app,
                'id_estado' =>$id_estado
            ];
            $data["data"]["usuario"] = $data;
            return json_encode($data);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function deleteUsuario($id){
        try {
        $query = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=:id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $r = $query->execute();
        $data["success"] = true;
        $data["data"]["usuario"] = $r;
        echo  json_encode($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateUsuario($id,$nombre,$usuario,$correo,$password,$status,$id_app,$id_estado){
        try {
        $query = $this->db->prepare("UPDATE id_usuarios SET 
            nombre = :nombre,
            usuario = :usuario,
            correo = :correo,
            password = :password,
            status = :status,
            id_app = :id_app,
            id_estado = :id_estado,
            telefono = :telefono,
            fecha_de_nacimiento = :fecha_de_nacimiento,
            dni = :dni

            WHERE id_usuario = :id");
        $query->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $query->bindParam(":correo", $correo, PDO::PARAM_STR);
        $query->bindParam(":password", $password, PDO::PARAM_STR);
        $query->bindParam(":id_app", $id_app, PDO::PARAM_STR);
        $query->bindParam(":id_estado", $id_estado, PDO::PARAM_STR);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $r = $query->execute();
        $data["success"] = true;
        if ($r == true) {
            return json_encode($data);
        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>