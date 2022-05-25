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

        $idproveedor;
        //Condicion para cuando se destruya el localStorage
        if($_GET['idproveedor'] == -1){
            //Cuando se destruye
            $idproveedor = $_SESSION['idproveedor'];
        }else{
           $idproveedor = $_GET['idproveedor'];
        }

        $tabla = $horario->listarHorario(["idproveedor" => $idproveedor]);

        if(count($tabla[0]) > 0){
            // CONTINE DATOS QUE VAMOS A MOSTRAR
            foreach($tabla as $registro){
                echo "
                    <tr>
                        <td class='col'>";
                        if(isset($_SESSION['idproveedor'])){
    
                            if ($_SESSION['idproveedor'] == $registro['idproveedor']){
                                echo "
                                    <button data-idhorario='{$registro['idhorario']}' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#ModalHorarioRegis'>Registrar Horario <i class='nav-icon fas fa-calendar-plus'></i></button>
                                    <button data-idhorario='{$registro['idhorario']}' class='btn btn-sm btn-warning' id='btnModificarHorario' data-toggle='modal' data-target='#ModalHorarioModifi'><i class='nav-icon fas fa-edit'></i></button>
                                ";
                            }
                        }
                echo "
                        </td>
                        <td class='col'>{$registro['dialaborable']}</td>
                        <td class='col'>{$registro['horainicio']}</td>
                        <td class='col'>{$registro['horafinal']}</td>
                    </tr>";
                
            }
        }else{
            echo "
            <tr>
                <td colspan='4'>No tienes contactos agregados</td>
            </tr>
                ";
        }
    }

    //Listar un horario
    if($operacion == 'listarOneDataHorario'){

        $idhorario = $horario->listarOneDataHorario(["idhorario" => $_GET["idhorario"]]);

        if($idhorario){
            echo json_encode($idhorario[0]);
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