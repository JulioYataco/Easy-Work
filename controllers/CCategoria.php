<?php

require_once '../models/Categoria.php';

//Instanciamos al modelo
$categoria = new Categoria();

if (isset($_GET['operacion'])){
    
    $operacion = $_GET['operacion'];

    //Muestra las categorias en un select
    function mostrarCategoriasSelect($datos, $optiondefault){
        //Comprobamos si existen datos
        if (count($datos) > 0){
            //Contiene datos que podemos mostrar
            echo "<option value=''>{$optiondefault}</option>";
            // Leer los registros de uno en uno
            foreach($datos as $registro){
                echo "<option value='{$registro->idcategoria}'>{$registro->nombrecategoria}</option>";
            }
        }else{
            echo "<option value=''>No se encontraron datos</option>";
        }
    }

    //Lista las categorias
    if($operacion == 'listarCategorias'){

        $tabla = $categoria->listarCategorias();

        if(count($tabla) > 0){

            // CONTINE DATOS QUE VAMOS A MOSTRAR
            foreach($tabla as $registro){
                echo "
                    <tr>
                        <td>{$registro->idcategoria}</td>
                        <td>{$registro->nombrecategoria}</td>
                        <td>
                            <button data-idcategoria='{$registro->idcategoria}' class='btn btn-sm btn-warning btnEditarCat'><i class='nav-icon fas fa-edit'></i></button>
                            <button data-idcategoria='{$registro->idcategoria}' class='btn btn-sm btn-danger btnEliminarCat'><i class='nav-icon fas fa-trash'></i></button>
                        </td>
                    </tr>";
            
            }
        }else{
            echo "
                <td class='col'> No se encontraron datos de tipo de red </td>
            ";
        }
    }

    //Lista las categorias en el select del modal
    if ($operacion == 'listarCategoriasModalSelect'){

        $datos = $categoria->listarCategorias();
        $option = "Categorias";

        // Listar las categoria
        mostrarCategoriasSelect($datos, $option);
    }

    //Lista una categoria 
    if ($operacion == 'onDataCategoria'){

        $tabla = $categoria->onDataCategoria(["idcategoria" => $_GET['idcategoria']]);

        if(count($tabla) > 0){
            echo json_encode($tabla[0]);
        }
    }
    
    //Registra una categoria
    if($operacion == 'registrarCategoria'){

        $datos = [
            "nombrecategoria" => $_GET['nombrecategoria']
        ];

        $categoria->registrarCategoria($datos);
    }

    //Modificar una categoria
    if($operacion == 'modificarCategoria'){

        $datos = [
            "idcategoria" => $_GET['idcategoria'],
            "nombrecategoria" => $_GET['nombrecategoria']
        ];

        $categoria->modificarCategoria($datos);
    }

    //Eliminar categoria
    if($operacion == 'eliminarCategoria'){

        $data = [
            "idcategoria" => $_GET['idcategoria']
        ];
        
        $categoria->eliminarCategoria($data);
    }

}

?>