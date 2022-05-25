<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Comentario extends ModelMaster{

    //Obtenemos datos del proveedor
    public function obtenerOneDataProveedor($datosEnviar){
        try{
            return parent::execProcedure($datosEnviar, "spu_proveedores_obtener_ondata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //METODOS CRUD
    //Registrar
    public function registrarComentario($datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_comentarios_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarComentarios(array $data){
        try{
            return parent::execProcedure($data, "spu_comentarios_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar un comentario
    public function listarOneDataComentarios(array $idcomentario){
        try{
            return parent::execProcedure($idcomentario, "spu_comentario_onedata_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarComentario($datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_comentario_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarComentario(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_comentario_eliminar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>