<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Provincia{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Atributo
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        //Almacenamos la conexion en la variable $pdo
        $this->$pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function RegistrarProvincia($entidadProvincia){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadProvincia->__GET('provincia')
                )
            );

        }
        catch(Exception $e){
            die($e->getMessage());      
        }
    }

    //Listar
    public function ListarDepartamentos(){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>