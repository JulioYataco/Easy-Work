<?php

// Integrando al modelo y la entidad BD
require_once '../models/Departamento.php';

//Instanciamos el modelo
$departamento = new Departamento();

if (isset($_GET['operacion'])){

    //Almacenamos la variable operación en una variable
    $operacion = $_GET['operacion'];

    //Lista departamentos
    if ($operacion == 'ListarDepartamentos'){

        // Alamcenar en un objeto
        $tabla = $departamento->ListarDepartamentos();

        if (count($tabla) > 0){
            //Contiene datos que podemos mostrar
            echo "<option value=''>Departamento</option>";
            foreach($tabla as $registro){
                echo "<option value='{$registro->iddepartamento}'>{$registro->nombredepartamento}</option>";
            }
        }else{
            echo "<option value=''>No se encontraron datos</option>";
        }
    }
}
?>