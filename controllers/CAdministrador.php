<?php
session_start();

require_once '../models/Administrador.php';

$administrador = new Administrador();

if(isset($_GET['operacion'])){

    $operacion = $_GET['operacion'];

    // Listar proveedor activo
    if ($operacion == 'listarProveedoresActivos') {
        # Almacenamos en un objeto
        $tabla = $administrador->listarProveedoresActivos();

        if(count($tabla) > 0) {
            // Contiene datos que podemos mostrar
            foreach ($tabla as $registro){
                echo "
                <tr>
                    <th scope='row'>{$registro->idproveedor}</th>
                    <td>{$registro->nombredistrito}</td>
                    <td>{$registro->nombres}</td>
                    <td>{$registro->apellidos}</td>
                    <td>{$registro->correo}</td>
                    <td>
                        <button data-idproveedor='{$registro->idproveedor}' title='Inabilitar Proveedor' type='button' class='btn btn-danger btnElimProv'>
                            <i class='nav-icon fas fa-user-minus'></i>
                        </button>
                        <button data-idproveedor='{$registro->idproveedor}' title='Ascender a Administrador' type='button' class='btn btn-success btnConvertAdmin'>
                            <i class='nav-icon fas fa-user-cog'></i>
                        </button>
                    </td>
                </tr>
                ";
            }
        }
    }

    // Listar proveedor Inctivos
    if ($operacion == 'listarProveedoresInactivos'){
        // Alamacenamos en un objeto
        $tabla = $administrador->listarProveedoresInactivos();

        if (count($tabla) > 0) {
            # Contine datos que podemos mostrar
            foreach ($tabla as $registro){
                echo "
                <tr scope='row'>
                    <td>{$registro->idproveedor}</td>
                    <td>{$registro->nombredistrito}</td>
                    <td>{$registro->nombres}</td>
                    <td>{$registro->apellidos}</td>
                    <td>{$registro->correo}</td>
                    <td>
                        <button data-idproveedor='{$registro->idproveedor}' title='Habilitar Proveedor' type='button' class='btn btn-warning btnHabiProv'>
                            <i class='nav-icon fas fa-user-plus'></i>
                        </button>
                    </td>
                </tr>
                ";
            }
        }
    }

    // Listar Admins
    if ($operacion == 'listarAministradores') {
        
        $tabla = $administrador->listarAministradores();

        if (count($tabla) > 0) {
            foreach ($tabla as $registro){
                echo "
                <tr scope='row'>
                    <td>{$registro->idproveedor}</td>
                    <td>{$registro->nombredistrito}</td>
                    <td>{$registro->nombres}</td>
                    <td>{$registro->apellidos}</td>
                    <td>{$registro->correo}</td>
                    <td>
                        <button data-idproveedor='{$registro->idproveedor}' title='Descender a Proveedor' type='button' class='btn btn-danger btnElimAdmin'>
                            <i class='nav-icon fas fa-user-minus'></i>
                        </button>
                    </td>
                </tr>
                ";
            }
        }
    }

    // Dar de baja a un proveedor
    if ($operacion == 'eliminarProveedoresActivos'){

        // almacenamos en un array
        $data = [
            "idproveedor"   =>  $_GET['idproveedor']
        ];
        // enviamos a la bd mediante el metodo 
        $administrador->eliminarProveedoresActivos($data);
    }

    //Dar de alta a un proveedor
    if($operacion == 'reactivarProveedores'){
        // almacenamos en un array
        $data = [
            "idproveedor" => $_GET['idproveedor']
        ];
        // enviamos a la bd mediante el metodo
        $administrador->reactivarProveedores($data);
    }

    //Convertir a un proveedor a administrador
    if ($operacion == 'convertirAdministrador'){
        $data = [
            "idproveedor" => $_GET['idproveedor']
        ];

        $administrador->convertirAdministrador($data);
    }

    //Dar de baja a un administrador
    if ($operacion == 'EliminarAdministrador'){
        $data = [
            "idproveedor" => $_GET['idproveedor']
        ];
        $administrador->EliminarAdministrador($data);
    }

}

?>