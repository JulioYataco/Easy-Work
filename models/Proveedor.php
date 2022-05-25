<?php 

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Proveedor extends ModelMaster{
    
    //Login
    public function login(array $data){
        try{
            return parent::execProcedure($data, "spu_proveedor_login", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Registrar
    public function registrarProveedor(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_proveedores_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarProveedores(array $data){
        try{
            return parent::execProcedure($data, "spu_proveedores_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function modificarProveedor(array $data){
        try{
            parent::execProcedure($data, "spu_proveedores_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function modificarClaveProveedor(array $idproveedor){
        try{
            parent::execProcedure($idproveedor, "spu_proveedor_clave_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //grafico
    public function getProveedorDashboard(){
        try{
          return parent::getRows("spu_graficos_proveedores_listar");
        }
        catch(Exception $error){
          die($error->getMessage());
        }
    }

    //grafico lineal (Numero de Publicaciones por categorias)
    public function getProveedorDashboardLineal(){
        try{
          return parent::getRows("spu_graficos_categorias_servicios_listar");
        }
        catch(Exception $error){
          die($error->getMessage());
        }
    }

    public function getProveedorDashboardcircular(){
        try{
          return parent::getRows("spu_graficos_servicios_nivel_listar");
        }
        catch(Exception $error){
          die($error->getMessage());
        }
    }
    
}

?>