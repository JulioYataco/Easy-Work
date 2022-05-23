<?php

//Obtenemos la clase conexion
require_once '../core/model.master.php';

class Horario extends ModelMaster{

    //METODOS CRUD
    //Registrar
    public function registrarHorario(array $datosEnviar){
        try{
            parent::execProcedure($datosEnviar, "spu_horario_registrar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    //Listar
    public function listarHorario(array $idproveedor){
        try{
            return parent::execProcedure($idproveedor, "spu_horario_listar", true);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Modificar
    public function modificarHorario(array $idproveedor){
        try{
            parent::execProcedure($idproveedor, "spu_horario_modificar", false);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    //Eliminar
    public function eliminarHorario($idhorario){
        try{
            $comando = $this->pdo->prepare("");
            $comando->execute(array($idhorario));
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}
?>