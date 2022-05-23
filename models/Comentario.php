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
    public function listarComentarios(array $idservicio){
        try{
            return parent::execProcedure($idservicio, "spu_comentarios_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarComentario($entidadComentario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(
                array(
                    $entidadComentario->__GET('idcomentario'),
                    $entidadComentario->__GET('idproveedor'),
                    $entidadComentario->__GET('comentario'),
                    $entidadComentario->__GET('puntuacion')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
            }
    }

    //Eliminar
    public function eliminarComentario($idcomentario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(array($idcomentario));
        }
        catch(Exception $e){
            die($e->getMessage());
        } 
    }
}
?>