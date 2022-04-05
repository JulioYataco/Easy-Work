<?php

if (isset($_GET['operacion'])){

    //Integramos el modelo
    require_once '../models/Distrito.php';

    //Instanciamos el modelo
    $distrito = new Distrito();

    //Almacenamos la 'operacion' en una variable
    $operacion = $_GET['operacion'];

    if ($operacion == 'ListarDistritos'){

        $tabla = $distrito->ListarDistritos($_GET['idprovincia']);

        if (count($tabla) > 0){

            echo "<option value=''>Distrito</option>";
            foreach ($tabla as $registro){

                echo "<option value='{$registro['iddistrito']}'>{$registro['nombredistrito']}</option>";
            }
        }else{
            echo "<option value=''>No hay registro</option>";
        }

    }
}

?>