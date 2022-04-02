<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Categoria{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        $this->$pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function registrarCategoria($entidadCategoria){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadCategoria->__GET('categoria')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarCategorias(){
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
    public function modificarCategoria($entidadCategoria){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadCategoria->__GET('idcategoria'),
                    $entidadCategoria->__GET('categoria')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //Eliminar
    public function eliminarCategorria($idcategoria){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(array($idcategoria));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>