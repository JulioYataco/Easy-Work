<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Servicio{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        //Almacenamos la conexion en la variable $pdo
        $this->$pdo = $conexion->getConexion();
    }

    //Metodos CRUD
    public function registrarServicio($entidadServicio){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadServicio->__GET('idproveedor'),
                    $entidadServicio->__GET('idcategoria'),
                    $entidadServicio->__GET('servicio'),
                    $entidadServicio->__GET('descripcion'),
                    $entidadServicio->__GET('direccion'),
                    $entidadServicio->__GET('nivel')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage()); 
        }
    }

    //Listar
    public function listarServicio(){
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
    public function modificarServicio($entidadServicio){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadServicio->__GET('idservicio'),
                    $entidadServicio->__GET('idproveedor'),
                    $entidadServicio->__GET('idcategoria'),
                    $entidadServicio->__GET('servicio'),
                    $entidadServicio->__GET('descripcion'),
                    $entidadServicio->__GET('direccion'),
                    $entidadServicio->__GET('nivel')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage()); 
        }
    }

    //Eliminar 
    public function eliminarServicio($idservicio){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(array($idservicio));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>