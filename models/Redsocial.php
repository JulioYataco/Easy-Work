<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Redsocial extends ModelMaster{
    

    //METODOS CRUD
    //Registrar
    public function registrarRedSocial(array $data){
        try{
            parent::execProcedure($data, "spu_redessociales_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarRedSocialProveedor(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_redessociales_listar_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarRedSocial(array $data){
        try{
            parent::execProcedure($data, "spu_rededssociales_eliminar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar redes sociales por cada proveedor
    public function listarRedessociales(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_listar_redessociales", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar una red social
    public function listarOneRedessociales(array $idredsocial){
        try{
            return parent::execProcedure($idredsocial, "spu_list_one_data_redsoci", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarRedessociales(array $idproveedor){
        try{
            parent::execProcedure($idproveedor, "spu_redessociales_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>