<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Horario{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        $this->pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function registrarHorario($entidadHorario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(
                array(
                    $entidadHorario->__GET('idproveedor'),
                    $entidadHorario->__GET('dialaborable'),
                    $entidadHorario->__GET('horainicio'),
                    $entidadHorario->__GET('horafinal')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarHorario($entidadHorario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute();
            return $comando->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarHorario($entidadHorario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(
                array(
                    $entidadHorario->__GET('idhorario'),
                    $entidadHorario->__GET('idproveedor'),
                    $entidadHorario->__GET('dialaborable'),
                    $entidadHorario->__GET('horainicio'),
                    $entidadHorario->__GET('horafinal')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarHorario($idhorario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(array($idhorario));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>