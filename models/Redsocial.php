<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Redsocial{
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
    public function registrarRedsocial($entidadRedsocial){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadRedsocial->__GET('redsocial')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());      
        }
    }

    //Listar
    public function listarRedsocial(){
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
    public function modificarRedsocial($entidadRedsocial){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadRedsocial->__GET('idresocial'),
                    $entidadRedsocial->__GET('redsocial')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarRedsocial($idredsocial){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(array($idredsocial));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>