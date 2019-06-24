<?php
require __DIR__ .'/connection.php';
class Model_prah{
    protected $db;
    public function __construct(){
        $this->db = DB();
    }
    #Consulta de estados 
    public function searchEstadosPrah($id_estado){
        if ($id_estado > 0 && $id_estado <= 32 ) {
            $query = $this->db->prepare("SELECT id_estado,  nombre_estado FROM estados WHERE id_estado=:id");
            $query->bindParam(":id", $id_estado, PDO::PARAM_INT);
        }else{
            if ($id_estado == 0) {
                $query = $this->db->prepare( "SELECT * FROM estados" );
            }            
        }        
        $valor = $query->execute();
        if ($valor) {   
            $data["success"] = true;
            $data["data"]["estados"] = array();
            while($row = $query->fetchAll(PDO::FETCH_ASSOC)){
                $data["data"]["estados"]  = $row;
            }
            header('Content-type: application/json; charset=utf-8');
            return json_encode($data);   
        }else{
            echo json_encode(['errors' => ['error' => 'model, consulta no exitosa']]);
        }
    } 
    public function readFilesPrah($id_estado, $anno, $id_app_fk){
        $query = $this->db->prepare("SELECT * FROM files WHERE id_estado=:id AND anno=:ano AND id_app_fk=:id_app_fk");
        $query->bindParam(":id", $id_estado, PDO::PARAM_INT);
        $query->bindParam(":ano", $anno, PDO::PARAM_STR);
        $query->bindParam(":id_app_fk", $id_app_fk, PDO::PARAM_INT);
        $query->execute();
        $data["success"] = true;
        $data["data"]["files"] = array();
        while($row = $query-> fetchAll(PDO::FETCH_ASSOC)){
            $data["data"]["files"] = $row;
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($data);
    }
    
    public function readFile($id_file){
        $query = $this->db->prepare("SELECT * FROM files WHERE id_file=:id");
        $query->bindParam(":id", $id_file, PDO::PARAM_INT);
        $query->execute();
        $data["success"] = true;
        $data["data"]["file"] = array();
        while($row = $query-> fetch(PDO::FETCH_ASSOC)){
            $data["data"]["file"] = $row;
        }
        header('Content-type: application/json; charset=utf-8');
        return json_encode($data);
    }

    public function addFilesPrah($num_prop ,$ofic_porp_encript ,$anexo6_encript,$anexo7_encript,$lis_de_bene_encript,$id_estado, $id_app_fk){
        try {
            
            $query =  $this->db->prepare("INSERT INTO files(num_prop, ofic_porp, anexo6, anexo7, lis_de_bene, ofi_de_auto, ofi_de_acue, acue_de_libe, cier_ejer_y_cont, vobo, fech_ini, fech_end, id_estado, anno, id_app_fk) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $result = $query->execute(array($num_prop ,$ofic_porp_encript ,$anexo6_encript,$anexo7_encript,$lis_de_bene_encript,'','','','','',date("Y-m-d"),'',$id_estado,date("Y"),$id_app_fk));
            if ($result == true) {
                $data["success"] = true;
                $datos = [
                    'id_file' =>$this->db->LastInsertId(),
                    'num_prop' =>$num_prop,
                    'id_estado' =>$id_estado,
                    'id_app_fk' => $id_app_fk
                ];
                $data["data"]["file"] = $datos;   
            }else{
                $data["error"] = true;
            }
             header('Content-type: application/json; charset=utf-8');
            return json_encode($data);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function updateFilesOAAL($id_file,$num_prop ,$ofic_porp ,$anexo6,$anexo7,$lis_de_bene){
        try {
        $query = $this->db->prepare("UPDATE files SET  
            num_prop=:num_prop,
            ofic_porp=:ofic_porp, 
            anexo6=:anexo6, 
            anexo7=:anexo7, 
            lis_de_bene=:lis_de_bene
            WHERE id_file = :id");
        $query->bindParam(":num_prop", $num_prop, PDO::PARAM_STR);
        $query->bindParam(":ofic_porp", $ofic_porp, PDO::PARAM_STR);
        $query->bindParam(":anexo6", $anexo6, PDO::PARAM_STR);
        $query->bindParam(":anexo7", $anexo7, PDO::PARAM_STR);
        $query->bindParam(":lis_de_bene", $lis_de_bene, PDO::PARAM_STR);
        $query->bindParam(":id", $id_file, PDO::PARAM_INT);
        $r = $query->execute();
        $data["success"] = true;
        if ($r == true) {
            return $r;
        }else{
            return $r;
        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateFileAutorizacion($id_file, $ofi_de_auto){
        try {
            $query = $this->db->prepare("UPDATE files SET  ofi_de_auto=:ofi_de_auto  WHERE id_file = :id");
            $query->bindParam(":ofi_de_auto", $ofi_de_auto, PDO::PARAM_STR);
            $query->bindParam(":id", $id_file, PDO::PARAM_INT);
            $r = $query->execute();
            if ($r == true) {
                return $r;
            }else{
                return $r;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateFileOAC($id_file,  $ofi_de_acue,$acue_de_libe,$cier_ejer_y_cont){
        try {
            $query = $this->db->prepare("UPDATE files SET  ofi_de_acue=:ofi_de_acue, acue_de_libe=:acue_de_libe , cier_ejer_y_cont=:cier_ejer_y_cont  WHERE id_file = :id");
            $query->bindParam(":ofi_de_acue", $ofi_de_acue, PDO::PARAM_STR);
            $query->bindParam(":acue_de_libe", $acue_de_libe, PDO::PARAM_STR);
            $query->bindParam(":cier_ejer_y_cont", $cier_ejer_y_cont, PDO::PARAM_STR);
            $query->bindParam(":id", $id_file, PDO::PARAM_INT);
            $r = $query->execute();
            if ($r == true) {
                return $r;
            }else{
                return $r;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateVobo($id_file, $vobo, $comment_vobo){
        try {
            $query = $this->db->prepare("UPDATE files SET vobo=:vobo , comment_vobo=:comment_vobo  WHERE id_file = :id");
            $query->bindParam(":vobo", $vobo, PDO::PARAM_INT);
            $query->bindParam(":comment_vobo", $comment_vobo, PDO::PARAM_STR);
            $query->bindParam(":id", $id_file, PDO::PARAM_INT);
            $r = $query->execute();
            if ($r == true) {
                return $r;
            }else{
                return $r;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function updateOpenAndClose($id_file, $vobo, $comment_vobo){
        try {
            $query = $this->db->prepare("UPDATE files SET vobo=:vobo , comment_vobo=:comment_vobo  WHERE id_file = :id");
            $query->bindParam(":vobo", $vobo, PDO::PARAM_INT);
            $query->bindParam(":comment_vobo", $comment_vobo, PDO::PARAM_STR);
            $query->bindParam(":id", $id_file, PDO::PARAM_INT);
            $r = $query->execute();
            if ($r == true) {
                return $r;
            }else{
                return $r;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function deleteFiles($id){
        try {
        $query = $this->db->prepare("DELETE FROM files WHERE id_file=:id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $r = $query->execute();
        $data["success"] = true;
        $data["data"]["file"] = $r;
        echo  json_encode($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>