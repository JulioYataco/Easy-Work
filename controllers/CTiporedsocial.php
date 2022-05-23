<?php

require_once '../models/Tiporedsocial.php';

$tiporedsocial = new Tiporedsocial();

if(isset($_GET['operacion'])){

    $operacion = $_GET['operacion'];

    function mostrarTipoRedSocialSelect($datos, $optiondefault){
        //Comprobamos si existen datos
        if (count($datos) > 0){
            //Contiene datos que podemos mostrar
            echo "<option value=''>{$optiondefault}</option>";
            // Leer los registros de uno en uno
            foreach($datos as $registro){
                echo "<option value='{$registro->idtiporedsocial}'>{$registro->redsocial}</option>";
            }
        }else{
            echo "<option value=''>No se encontraron datos</option>";
        }
    }

    if($operacion == 'listarTiporedsocial'){

        $tabla = $tiporedsocial->listarTiporedsocial();

        if(count($tabla) > 0){

            // CONTINE DATOS QUE VAMOS A MOSTRAR
            foreach($tabla as $registro){
                echo "
                    <tr>
                        <td class='col'>{$registro->idtiporedsocial}</td>
                        <td class='col'>{$registro->redsocial}</td>
                        <td class='col'>
                            <button data-idtiporedsocial='{$registro->idtiporedsocial}' class='btn btn-sm btn-warning btnEditarTipoRed'><i class='nav-icon fas fa-edit'></i></button>
                            <button data-idtiporedsocial='{$registro->idtiporedsocial}' class='btn btn-sm btn-danger btnEliminarTipoRed'><i class='nav-icon fas fa-trash'></i></button>
                        </td>
                    </tr>";
            }
        }else{
            echo "
                <td class='col'> No se encontraron datos de tipo de red </td>
            ";
        }
    }

    if($operacion == 'listarTiporedsocialModal'){

        $datos = $tiporedsocial->listarTiporedsocialModal();
        $option = "Redes sociales";

        // Listar los tipos de red social
        mostrarTipoRedSocialSelect($datos, $option);

    }

    if($operacion == 'registrarTiporedsocial'){

        $datos = [
            "redsocial" => $_GET['redsocial']
        ];

        $tiporedsocial->registrarTiporedsocial($datos);
    }

    if($operacion == 'ModificarTiporedsocial'){

        $datos = [
            "idtiporedsocial" => $_GET['idtiporedsocial'],
            "redsocial" => $_GET['redsocial']
        ];

        $tiporedsocial->ModificarTiporedsocial($datos);
    }

    //Listar un tipo red social
    if($operacion == 'oneDataTipoRed'){

        $tabla = $tiporedsocial->oneDataTipoRed(["idtiporedsocial" => $_GET["idtiporedsocial"]]);

        if(count($tabla) > 0){

            echo json_encode($tabla[0]);
            
        }
        
    }

    //Eliminar 
    if($operacion == 'eliminarTipoRedSocial'){

        $data = [
            "idtiporedsocial" => $_GET['idtiporedsocial']
        ];
        
        $tiporedsocial->eliminarTipoRedSocial($data);
    }
}

?>