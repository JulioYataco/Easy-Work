<?php

// Sesión heredada
session_start();

require_once '../models/Redsocial.php';

$redsocial = new Redsocial;

if(isset($_GET['operacion'])){

    $operacion = $_GET['operacion'];

    //Registrar
    if($operacion == 'registrarRedSocial'){

        //Array Asociativo
        $datos = [
            "idproveedor"       => $_SESSION['idproveedor'],
            "idtiporedsocial"   => $_GET['idtiporedsocial'],
            "nombrecuenta"      => $_GET['nombrecuenta'],
            "link"              => $_GET['link']
        ];

        $redsocial->registrarRedSocial($datos);
    }

    if($operacion == 'listarRedSocialProveedor'){

        $tabla = $redsocial->listarRedSocialProveedor(["idproveedor" => $_SESSION['idproveedor']]);

        if(count($tabla) > 0){
            // CONTINE DATOS QUE VAMOS A MOSTRAR
            foreach($tabla as $registro){
            echo "
                <tr>
                    ";

                    if(isset($_SESSION['idproveedor'])){

                        if ($_SESSION['idproveedor'] == $registro['idproveedor']){
                            echo "
                            <td class='col'>
                            <button class='btn btn-sm btn-warning btnEditarContacto'><i class='nav-icon fas fa-edit'></i></button>
                            <button data-idredsocial='{$registro['idredsocial']}' class='btn btn-sm btn-danger btnEliminarRedSocial'><i class='nav-icon fas fa-trash'></i></button>
                            </td>
                            ";
                        }
                    }
                    
            echo "
                    <td class='col'>{$registro['redsocial']}</td>
                    <td class='col'>{$registro['nombrecuenta']}</td>
                    <td class='col'><a href='{$registro['link']}'>Directo</a></td>
                </tr>";
            
            }
        }else{
            echo "
                <td class='col'> No se encontraron datos redsocial </td>
                <td class='col'> No se encontraron datos redsocial </td>
            ";
        }
    }

    //Eliminar 
    if($operacion == 'eliminarRedSocial'){

        $data = [
            "idredsocial" => $_GET['idredsocial']
        ];
        
        $redsocial->eliminarRedSocial($data);
    }


    //Listar redes sociales por proveedor
    if($operacion == 'listarRedessociales'){

        $idproveedor;
        if($_GET['idproveedor'] == -1){
            $idproveedor = $_SESSION['idproveedor'];
        }else{
            $idproveedor = $_GET['idproveedor'];
        }

        $tabla = $redsocial->listarRedessociales(["idproveedor" => $idproveedor]);

        if(count($tabla) > 0){
            // CONTINE DATOS QUE VAMOS A MOSTRAR
            foreach($tabla as $registro){
            echo "
                <tr>
                    <td class='col'>";
                    if(isset($_SESSION['idproveedor'])){

                        if ($_SESSION['idproveedor'] == $registro['idproveedor']){
                            echo "
                                <button data-idredsocial='{$registro['idredsocial']}' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#ModalRegisRedSocial'>Añadir Red Social <i class='far fa-plus-square'></i></button>
                                <button data-idredsocial='{$registro['idredsocial']}' class='btn btn-sm btn-warning btnEditarRedSocial'><i class='nav-icon fas fa-edit'></i></button>
                                <button data-idredsocial='{$registro['idredsocial']}' class='btn btn-sm btn-danger btnEliminarRedSocial'><i class='nav-icon fas fa-trash'></i></button>
                            
                            ";
                        }
                    }
                    
            echo "
                    </td>
                    <td class='col'>{$registro['redsocial']}</td>
                    <td class='col'>{$registro['nombrecuenta']}</td>
                    <td class='col'><a href='{$registro['link']}'>Directo</a></td>
                </tr>";
            
            }
        }else{
            echo "
            <tr>
                <td colspan='4'>No tienes redes sociales agregadas</td>
            </tr>
            ";
        }
    }

    //Listar una redes sociales
    if($operacion == 'listarOneRedessociales'){

        $idcontacto = $redsocial->listarOneRedessociales(["idredsocial" => $_GET["idredsocial"]]);

        if($idcontacto){
            echo json_encode($idcontacto[0]);
        }
    }

    //Modificar unas red social
    if($operacion == 'modificarRedessociales'){
        //Array Asociativo
        $data = [
            "idredsocial"  => $_GET["idredsocial"],
            "idproveedor"  => $_SESSION["idproveedor"],
            "idtiporedsocial" => $_GET["idtiporedsocial"],
            "nombrecuenta" => $_GET["nombrecuenta"],
            "link"         => $_GET["link"]
        ];

        $redsocial->modificarRedessociales($data);
    }

}

?>