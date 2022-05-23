<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Distrito extends ModelMaster{
    
    //Listar
    public function listarDistritos(array $data){
        try{
            return parent::execProcedure($data, "spu_distritos_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>