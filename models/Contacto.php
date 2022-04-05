<?php

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Contacto{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        //Almacenamos la conexion en la variable $pdo
        $this->pdo = $conexion->getConexion();
    }

    //METODOS CRUD
    //Registrar
    public function registrarContacto($entidadContacto){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(
                arry(
                    $entidadContacto->__GET('idredsocial'),
                    $entidadContacto->__GET('telefono'),
                    $entidadContacto->__GET('correoelectronico')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarContacto(){
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
    public function modificarContacto($entidadContacto){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(
                array(
                    $entidadProveedor->__GET('idcontacto'),
                    $entidadProveedor->__GET('idredsocial'),
                    $entidadProveedor->__GET('telefono'),
                    $entidadProveedor->__GET('correo electronico')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarContacto($idcontacto){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(array($idcontacto));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>