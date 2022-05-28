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

    //Listar
    public function listarProveedores(array $data){
        try{
            return parent::execProcedure($data, "spu_proveedores_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Mofidicar proveedor
    public function modificarProveedor(array $data){
        try{
            parent::execProcedure($data, "spu_proveedores_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar clave
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

    //Grafico ciruclar (Numero de servicios por nivel)
    public function getProveedorDashboardcircular(){
        try{
          return parent::getRows("spu_graficos_servicios_nivel_listar");
        }
        catch(Exception $error){
          die($error->getMessage());
        }
    }

    //Registrar foto perfil
    public function actualizarFotoperfil(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_proveedor_agregarfoto", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista los proveedores por provedor
    public function onDataproveedores(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_proveedores_onedata_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
}

?>