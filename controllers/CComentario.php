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

        $idproveedor;
        if($_GET['idproveedor'] == -1){
            $idproveedor = $_SESSION['idproveedor'];
        }else{
            $idproveedor = $_GET['idproveedor'];
        }

        $tabla = $comentario->listarComentarios(["idproveedor" => $idproveedor]);

        if (count($tabla) > 0) {
            // Contiene los datos que podemos mostrar
            foreach ($tabla as $registroComent){
                echo "
                    <span class='username'>
                        <b>{$registroComent['nombreyapellido']}</b>
                        <span class='text-muted float-right'> {$registroComent['fechahora']}
                            <button data-idcomentario='{$registroComent['idcomentario']}'  class='btn btn-sm btn-warning btnEditarComentario'>
                                <i class='nav-icon fas fa-edit'></i>
                            </button>
                                <button data-idcomentario='{$registroComent['idcomentario']}'  class='btn btn-sm btn-danger btnDeleteComentario'>
                            <i class='nav-icon fas fa-trash'></i>
                            </button>
                        </span>
                    </span>
                    <br>
                    {$registroComent['comentario']}
                    <p><b>Puntuación:</b> {$registroComent['puntuacion']}</p>
                    <hr>
                    
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