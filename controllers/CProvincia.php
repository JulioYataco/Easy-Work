<?php

if (isset($_GET['operacion'])){

    require_once '../models/Provincia.php';

    //Instanciamos la clase de modelo
    $provincia = new Provincia();

    $operacion = $_GET['operacion'];

    if ($operacion == 'ListarProvincias'){

        $tabla = $provincia->ListarProvincias($_GET['iddepartamento']);
        
        if (count($tabla) > 0){
            //Contiene datos que podemos mostrar
            echo "<option value=''>Provincia</option>";
            foreach($tabla as $registro){
                echo "<option value='{$registro['idprovincia']}'>{$registro['nombreprovincia']}</option>";
            }
        }else{
            echo "<option value=''>No se encontraron datos</option>";
        }
    }
}

?>