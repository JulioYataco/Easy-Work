<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Categoria extends ModelMaster{

    //Registrar
    public function registrarCategoria(array $data){
        try{
            parent::execProcedure($data, "spu_categorias_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarCategorias(){
        try{
            return parent::getRows("spu_categorias_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Onedata
    public function onDataCategoria(array $data){
        try{
           return parent::execProcedure($data, "spu_categorias_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarCategoria(array $data){
        try{
            parent::execProcedure($data, "spu_categorias_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarCategoria(array $data){
        try{
            parent::execProcedure($data, "spu_categorias_eliminar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
}
?>