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
    if ($operacion == 'obtenerOneDataProveedor'){

        $tabla = $comentario->obtenerOneDataProveedor(["idproveedor" => $_GET['idproveedor']]);

        if(count($tabla) > 0){
            echo json_encode($tabla[0]);
        }
    }

    //Registra un comentario
    if ($operacion == 'registrarComentario'){

        $datos = [
            "idproveedor"      => $_GET["idproveedor"],
            "idusuariocomenta" => $_SESSION['idproveedor'],
            "comentario"       => $_GET["comentario"],
            "puntuacion"       => $_GET["puntuacion"]
        ];

        //Llamamos al metodo registrar
        $comentario->registrarComentario($datos);
    }

    //Lista los comentarios
    if ($operacion == 'listarComentarios'){

        $tabla = $comentario->listarComentarios(["idproveedor" => $_GET['idproveedor']]);

        if (count($tabla) > 0) {
            // Contiene los datos que podemos mostrar
            foreach ($tabla as $registroComent){
                echo "
                    <thead>
                        <tr>
                            <th scope='col'>{$registroComent['nombreyapellido']}</th>
                            <th scope='col'></th>
                            <th scope='col'></th>
                            <th scope='col'>{$registroComent['fechahora']}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <td colspan='3'>{$registroComent['comentario']}  </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>Puntuacion :</th>
                            <td colspan='1'>{$registroComent['puntuacion']}</td>
                            <td>
                                <button data-idcomentario='{$registroComent['idcomentario']}'  class='btn btn-sm btn-warning btnEditarComentario'>
                                <i class='nav-icon fas fa-edit'></i>
                                </button>
                                <button data-idcomentario='{$registroComent['idcomentario']}'  class='btn btn-sm btn-danger btnDeleteComentario'>
                                    <i class='nav-icon fas fa-trash'></i>{$registroComent['idcomentario']}
                                </button>
                            </td>                            
                        </tr>
                    </tbody>
                    <hr> <hr>
                ";
            }
        }
    }

    //Listar un comentario
    if ($operacion == 'listarOneDataComentarios'){

        $tabla = $comentario->listarOneDataComentarios(["idcomentario" => $_GET["idcomentario"]]);

        if($tabla){
            echo json_encode($tabla[0]);
        }
    }

    //Modificar
    if ($operacion == 'modificarComentario'){
        //Array asociativo
        $data = [
            "idcomentario"  => $_GET["idcomentario"],
            "comentario"    => $_GET["comentario"],
            "puntuacion"    => $_GET["puntuacion"]
        ];
        $comentario->modificarComentario($data);
    }

    //Eliminar
    if ($operacion == 'eliminarComentario'){
        //Array asociativo
        $data = [
            "idcomentario"  => $_GET["idcomentario"]
        ];
        $comentario->eliminarComentario($data);
    }

}

?>