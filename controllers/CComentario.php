<?php

// Sesión heredada
session_start();

//Llamamos al modelo
require_once '../models/Comentario.php';

//Instanciamos la clase del modelo
$comentario = new Comentario();

if(isset($_GET['operacion'])){

    //capturo la operacion dentro de una variable
    $operacion = $_GET['operacion'];

    //Obtenemos datos de un proveedor
    if($operacion == 'obtenerOneDataProveedor'){

        $tabla = $comentario->obtenerOneDataProveedor(["idproveedor" => $_GET['idproveedor']]);

        if(count($tabla) > 0){
            echo json_encode($tabla[0]);
        }
    }

    if($operacion == 'registrarComentario'){

        $datos = [
            "idproveedor"      => $_GET["idproveedor"],
            "idusuariocomenta" => $_SESSION['idproveedor'],
            "comentario"       => $_GET["comentario"],
            "puntuacion"       => $_GET["puntuacion"]
        ];

        //Llamamos al metodo registrar
        $comentario->registrarComentario($datos);
    }
}

?>