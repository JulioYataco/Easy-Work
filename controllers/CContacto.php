<?php
// Sesión heredada
session_start();

require_once '../models/Contacto.php';

$contacto = new Contacto();

if(isset($_GET['operacion'])){

    $operacion = $_GET['operacion'];

    if($operacion == 'registrarContacto'){

        $data = [
            "idproveedor"   => $_SESSION['idproveedor'],
            "celular"       => $_GET['celular'],
            "telefono"      => $_GET['telefono'],
            "email"         => $_GET['email']
        ];

        $contacto->registrarContacto($data);
    }

    //Listar contacto por proveedor
    if($operacion == 'listarContacto'){

        $tabla = $contacto->listarContacto(["idproveedor" => $_SESSION['idproveedor']]);

        if(count($tabla) > 0){
            foreach ($tabla as $registroContac){
                echo "
                <tr>
                    <td class='col'> {$registroContac['celular']} </td>
                    <td class='col'> {$registroContac['telefono']} </td>
                    <td class='col'> {$registroContac['email']} </td>
                    <td class='col'>";

                    if(isset($_SESSION['idproveedor'])){

                        if ($_SESSION['idproveedor'] == $registroContac['idproveedor']){
                            echo "
                                <button data-idcontacto='{$registroContac['idcontacto']}'  class='btn btn-sm btn-warning btnEditarContacto'><i class='nav-icon fas fa-edit'></i></button>
                                <button data-idcontacto='{$registroContac['idcontacto']}'  class='btn btn-sm btn-danger btnDeleteContacto'><i class='nav-icon fas fa-trash'></i></button>
                            ";
                        }
                    }
                        
                echo "
                    </td>
                </tr>";
            
            }
        }
    }

    if($operacion == 'listarOneDataProveedor'){

        $tabla = $contacto->listarOneDataProveedor(["idproveedor" => $_SESSION['idproveedor']]);

        if(count($tabla) > 0){
            foreach ($tabla as $registroContac){
                echo "
                <tr>
                    <td class='col'>{$registroContac['celular']}</td>
                    <td class='col'>{$registroContac['telefono']}</td>
                    <td class='col'>{$registroContac['email']}</td>
                    <td class='col'>";

                    if(isset($_SESSION['idproveedor'])){

                        if ($_SESSION['idproveedor'] == $registroContac['idproveedor']){
                            echo "
                                <button data-idcontacto='{$registroContac['idcontacto']}' class='btn btn-sm btn-warning btnEditarContacto'><i class='nav-icon fas fa-edit'></i></button>
                                <button data-idcontacto='{$registroContac['idcontacto']}' class='btn btn-sm btn-danger btnDeleteContacto'><i class='nav-icon fas fa-trash'></i></button>
                            ";
                        }
                    }
                        
                echo "
                    </td>
                </tr>";
            
            }
        }
    }

    //Listar un contacto
    if($operacion == 'listarUnDatoContacto'){

        $idcontacto = $contacto->listarOneContacto(["idcontacto" => $_GET["idcontacto"]]);

        if($idcontacto){
            echo json_encode($idcontacto[0]);
        }
    }

    //Modificar un contacto
    if($operacion == 'modificarContacto'){
        //Array Asociativo
        $data = [
            "idcontacto"    => $_GET["idcontacto"],
            "celular"       => $_GET["celular"],
            "telefono"      => $_GET["telefono"],
            "email"         => $_GET["email"]
        ];

        $contacto->modificarContacto($data);
    }

    //Eliminar contacto
    if($operacion == 'eliminarContacto'){

        $data = [
            "idcontacto" => $_GET["idcontacto"]
        ];

        $contacto->eliminarContacto($data);
    }

}

?>