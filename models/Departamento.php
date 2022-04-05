<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Departamento{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion(); 
    }

    //METODOS CRUD

    //Listar
    public function ListarDepartamentos(){
        try{
            $comando = $this->pdo->prepare("CALL spu_departamentos_listar()");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}

?>