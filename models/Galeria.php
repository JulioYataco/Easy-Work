<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Galeria{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        $this->$pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function registrarGaleria($entidadGaleria){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadGaleria->__GET('foto'),
                    $entidadGaleria->__GET('video')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());      
        }
    }

    //Listar
    public function listarGaleria($entidadGaleria){
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
    public function modificarGaleria($entidadGaleria){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadGaleria->__GET('idgaleria'),
                    $entidadGaleria->__GET('foto'),
                    $entidadGaleria->__GET('video')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());      
        }
    }

    //Eliminar
    public function eliminarGaleria($idgaleria){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(array($idgaleria));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>