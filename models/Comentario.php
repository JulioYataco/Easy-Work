<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Comentario{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        //Almacenamos la conexion en la variable $pdo
        $this->$pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function registrarComentario($entidadComentario){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
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

    //Listar
    public function listarComentario(){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarComentario($entidadComentario){
        try{
            $comando = $this->$pdo->prepare("");
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
            $comando = $this->$pdo->prepare("");
            $comando->execute(array($idcomentario));
        }
        catch(Exception $e){
            die($e->getMessage());
        } 
    }
}
?>