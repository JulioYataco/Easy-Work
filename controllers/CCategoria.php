<?php

require_once '../models/Categoria.php';

//Instanciamos al modelo
$categoria = new Categoria();

if (isset($_GET['operacion'])){
    
    $operacion = $_GET['operacion'];

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

    if($operacion == 'listarCategorias'){

        $tabla = $categoria->listarCategorias();

        if(count($tabla) > 0){

            // CONTINE DATOS QUE VAMOS A MOSTRAR
            foreach($tabla as $registro){
                echo "
                    <tr>
                        <td class='col'>{$registro->idcategoria}</td>
                        <td class='col'>{$registro->nombrecategoria}</td>
                        <td class='col'>
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

    if ($operacion == 'listarCategoriasModalSelect'){

        $datos = $categoria->listarCategorias();
        $option = "Categorias";

        // Listar las categoria
        mostrarCategoriasSelect($datos, $option);
    }

    if ($operacion == 'onDataCategoria'){

        $tabla = $categoria->onDataCategoria(["idcategoria" => $_GET['idcategoria']]);

        if(count($tabla[0]) > 0){
            echo json_encode($tabla[0]);
        }
    }
    
    if($operacion == 'registrarCategoria'){

        $datos = [
            "nombrecategoria" => $_GET['nombrecategoria']
        ];

        $categoria->registrarCategoria($datos);
    }

}

?>