<?php
// Llamamos al model master
require_once '../core/model.master.php';

class Administrador extends ModelMaster{
    
    // Listar Proveedores Activos
    public function listarProveedoresActivos(){
        try{
            return parent::getRows("spu_listar_proveedor_activo", true);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    // listar Proveedores Inactivos
    public function listarProveedoresInactivos(){
        try{
            return parent::getRows("spu_listar_proveedor_inactivo", true);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    // Listar administradores
    public function listarAministradores() {
        try {
            return parent::getRows("spu_listar_admin", true);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // ELIMINAR PROVEEDORES
    public function eliminarProveedoresActivos(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_eliminar_proveedores", false);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    // REACTIVAR PROVEEDOR
    public function reactivarProveedores(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_reactivar_proveedor", false);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    // Convertir administrador
    public function convertirAdministrador(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_hacer_administrador", false);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    // Eliminar Administrador
    public function EliminarAdministrador(array $datosEnviar){
        try {
            parent::execProcedure($datosEnviar, "spu_convert_administrador", false);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
?>