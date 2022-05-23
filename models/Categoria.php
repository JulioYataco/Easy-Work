<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Categoria extends ModelMaster{

    public function registrarCategoria(array $data){
        try{
            parent::execProcedure($data, "spu_categorias_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarCategorias(){
        try{
            return parent::getRows("spu_categorias_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    
}
?>