<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Departamento{
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
    public function RegistrarDepartamento($entidaddepartamento){
        try{
            $comando = $this->$pdo->prepare("");
            $comando->execute(
                array(
                    $entidaddepartamento->__GET('departamento')
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