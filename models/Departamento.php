<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Departamento extends ModelMaster{
    
    //METODOS CRUD

    //Listar
    public function listarDepartamentos(){
        try{
            return parent::getRows("spu_departamentos_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}

?>