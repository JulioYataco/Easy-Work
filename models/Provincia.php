<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Provincia extends ModelMaster{

    //Listar
    public function listarProvincias(array $data){
        try{
            return parent::execProcedure($data, "spu_provincias_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>