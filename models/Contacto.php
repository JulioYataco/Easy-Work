<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Contacto extends ModelMaster{
    

    //METODOS CRUD
    //Registrar
    public function registrarContacto(array $data){
        try{
            parent::execProcedure($data, "spu_contactos_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


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

    public function modificarContacto(array $idproveedor){
        try{
            parent::execProcedure($idproveedor, "spu_contactos_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarContacto(array $data){
        try{
            parent::execProcedure($data, "spu_eliminar_contacto", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }










    public function listarOneContacto(array $idcontacto){
        try{
            return parent::execProcedure($idcontacto, "spu_list_one_data_contac", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarContacto(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_listar_contacto", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }





}
?>