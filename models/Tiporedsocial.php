<?php

require_once '../core/model.master.php';

class Tiporedsocial extends ModelMaster{

    
    //Listar
    public function listarTiporedsocial(){
        try{
            return parent::getRows("spu_tiporedessociales_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar
    public function listarTiporedsocialModal(){
        try{
            return parent::getRows("spu_tiporedessociales_listar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Registrar
    public function registrarTiporedsocial(array $data){
        try{
            parent::execProcedure($data, "spu_tiporedessociales_registrar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function ModificarTiporedsocial(array $data){
        try{
            parent::execProcedure($data, "spu_tiporedessociales_modificar");
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Listar un tipo de red por ID
    public function oneDataTipoRed(array $idtiporedsocial){
        try{
            return parent::execProcedure($idtiporedsocial, "spu_tiporedessociales_onedata", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

}

?>