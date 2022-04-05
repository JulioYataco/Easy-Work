<?php 

//Obtenemos la clase conexion
require_once 'Conexion.php';

class Proveedor{
    // Objeto PDO : Almacenará la conexión activa
    private $pdo;

    //Constructor
    public function __CONSTRUCT(){
        $conexion = new Conexion();
        //Almacenamos la conexion en la variable $pdo
        $this->pdo = $conexion->getConexion();
    }

    public function login($correo){
        try{
            $comando = $this->pdo->prepare("CALL spu_proveedor_login(?)");
            $comando->execute(array($correo));
            return $comando->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    //METODOS CRUD
    //Registrar
    public function registrarProveedor($entidadProveedor){
        try{
            $comando = $this->pdo->prepare("CALL spu_proveedores_registrar(?,?,?,?,?,?,?,?,?)");
            $comando->execute(
                array(
                    $entidadProveedor->__GET('iddistrito'),
                    $entidadProveedor->__GET('nombres'),
                    $entidadProveedor->__GET('apellidos'),
                    $entidadProveedor->__GET('fechanac'),
                    $entidadProveedor->__GET('telefono'),
                    $entidadProveedor->__GET('correo'),
                    password_hash($entidadProveedor->__GET('clave'), PASSWORD_BCRYPT),
                    $entidadProveedor->__GET('fotoperfil'),
                    $entidadProveedor->__GET('nivelacceso')

                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarProveedores(){
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
    public function modificarProveedor($entidadProveedor){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(
                array(
                    $entidadProveedor->__GET('idproveedor'),
                    $entidadProveedor->__GET('iddistrito'),
                    $entidadProveedor->__GET('nombres'),
                    $entidadProveedor->__GET('apellidos'),
                    $entidadProveedor->__GET('fechanac'),
                    $entidadProveedor->__GET('telefono'),
                    $entidadProveedor->__GET('correo'),
                    $entidadProveedor->__GET('clave'),
                    $entidadProveedor->__GET('fotoperfil')
                )
            );
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarProveedor($idproveedor){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(array($idproveedor));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}

?>