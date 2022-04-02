<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Distrito{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        $this->$pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function RegistrarDistrito($entidadDistrito){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidadDistrito->__GET('distrito')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());      
        }
    }

    //Listar
    public function ListarDistrito(){
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