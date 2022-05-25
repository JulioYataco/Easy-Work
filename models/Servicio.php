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

    //Listar todos los servicios
    public function listarServicios(){
        try{
            return parent::getRows("spu_servicios_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista los servicios por categorias
    public function onDataCategoria(array $idcategoria){
        try{
            return parent::execProcedure($idcategoria, "spu_servicio_categoria_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista los servicios por departamentos
    public function listarServiciosDepartamento(array $iddepartamento){
        try{
            return parent::execProcedure($iddepartamento, "spu_servicio_departamentos_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista los servicios por provincias
    public function listarServiciosProvincia(array $idprovincia){
        try{
            return parent::execProcedure($idprovincia, "spu_servicio_provincia_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista los servicios por distritos
    public function listarServiciosDistrito(array $iddistrito){
        try{
            return parent::execProcedure($iddistrito, "spu_servicio_distrito_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modifica un servicio
    public function modificarServicio(array $idservicio){
        try{
            parent::execProcedure($idservicio, "spu_servicios_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Obtiene un servicio
    public function oneDataServicio(array $idservicio){
        try{
            return parent::execProcedure($idservicio, "spu_servicio_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Elimina un servicio (update a estado 0)
    public function eliminarServicio(array $idservicio){
        try{
            parent::execProcedure($idservicio, "spu_servicios_elimimar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista el contacto por proveedor
    public function oneDataContacto(array $data){
        try{
            return parent::execProcedure($data, "spu_contactos_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Lista las redes sociales por proveedor
    public function oneDataRedsocial(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_redessociales_listar_onedata", true);
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

    //Listar los servicios por cada proveedor
    public function oneDataServicioProveedor(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_servicios_listar_ondata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar redes sociales por cada proveedor
    public function oneDataRedSocialProveedor(array $data){
        try{
            return parent::execProcedure($data, "spu_servicio_redessociales_proveedor", true);
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
    
}
?>