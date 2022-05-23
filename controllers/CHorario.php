<?php

session_start();

 //Invocamos al modelo y la entidad
 require_once '../models/Horario.php';

 //Creamos una instancia del modelo
 $horario = new Horario();

//Hora zonal
date_default_timezone_set("America/Lima");

if (isset($_GET['operacion'])){

    //capturo la operacion dentro de una variable
    $operacion = $_GET['operacion'];

    if($operacion == 'registrarHorario'){

        //Array asociativo con todos los datos
        $datos = [
            "idproveedor"   =>  $_SESSION['idproveedor'],
            "dialaborable"  =>  $_GET["dialaborable"],
            "horainicio"    =>  $_GET["horainicio"],   
            "horafinal"     =>  $_GET["horafinal"]
        ];

        $horario->registrarHorario($datos);
    }

    if($operacion == 'listarHorario'){
        $error = true;
        $tabla = $horario->listarHorario(["idproveedor" => $_SESSION['idproveedor']]);

        if(count($tabla[0]) > 0){
            echo json_encode($tabla[0]);
        }
    }

    if($operacion == 'modificarHorario'){

        //Array asociativo con todos los datos
        $datosmodificar = [
            "idproveedor"  => $_SESSION['idproveedor'],
            "dialaborable" => $_GET["dialaborable"],
            "horainicio"   => $_GET["horainicio"],   
            "horafinal"    => $_GET["horafinal"]
        ];

            $horario->modificarHorario($datosmodificar);
        
    }
}
?>