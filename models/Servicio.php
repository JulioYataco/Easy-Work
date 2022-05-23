<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Servicio extends ModelMaster{

    //Metodos CRUD
    public function registrarServicio(array $data){
        try{
            parent::execProcedure($data, "spu_servicios_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarServicios(){
        try{
            return parent::getRows("spu_servicios_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function onDataCategoria(array $idcategoria){
        try{
            return parent::execProcedure($idcategoria, "spu_servicio_categoria_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function modificarServicio(array $idservicio){
        try{
            parent::execProcedure($idservicio, "spu_servicios_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function oneDataServicio(array $idservicio){
        try{
            return parent::execProcedure($idservicio, "spu_servicio_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminarServicio(array $idservicio){
        try{
            parent::execProcedure($idservicio, "spu_servicios_elimimar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //PRUEBAS
    public function oneDataContacto(array $data){
        try{
            return parent::execProcedure($data, "spu_contactos_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarOneDataProveedor(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_contactos_listar_onecontacto_proveedor", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function oneDataServicioProveedor(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_servicios_listar_ondata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    /*public function oneDataContactoProveedor(array $data){
        try{
            return parent::execProcedure($data, "spu_servicio_contacto_proveedor", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }*/

    public function oneDataRedSocialProveedor(array $data){
        try{
            return parent::execProcedure($data, "spu_servicio_redessociales_proveedor", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    
}
?>