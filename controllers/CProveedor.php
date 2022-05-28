<?php

session_start();

 //Invocamos al modelo y la entidad
 require_once '../models/Proveedor.php';

 //Creamos una instancia del modelo
 $proveedor = new Proveedor();

//Hora zonal
date_default_timezone_set("America/Lima");

//Nos preguntamos si existe la operacion que nos este enviando el view
if (isset($_GET['operacion'])){

    //capturo la operacion dentro de una variable
    $operacion = $_GET['operacion'];

    //Si esxiste la operacion login
    if ($operacion == 'login'){
        
        //Creamos una tabla donde obtenemos un dato (correo) devuelve una fila
        $tabla = $proveedor->login(["correo" => $_GET['correo']]);
        //obetenemos la clave ingresada por usuario
        $claveingresada = $_GET['clave'];

        //Si encontramos datos en la tabla
        if ($tabla){
            //Encontramos al usuario
            //obtenemos la clave verdadera
            $claveencriptada = $tabla[0]['clave'];//Se refiere a la clave guardada en la base de datos.

            //COMPARAMOS: Si la clave imgresada, es igual a la claveencriptada, damos acceso
            if (password_verify($claveingresada, $claveencriptada)){
                //La contraseña es correcta
                $_SESSION['idproveedor'] = $tabla[0]['idproveedor'];
                $_SESSION['iddistrito'] = $tabla[0]['iddistrito'];
                $_SESSION['nombredistrito'] = $tabla[0]['nombredistrito'];
                $_SESSION['nombres'] = $tabla[0]['nombres'];;
                $_SESSION['apellidos'] = $tabla[0]['apellidos'];
                $_SESSION['fechanac'] = $tabla[0]['fechanac'];
                $_SESSION['telefono'] = $tabla[0]['telefono'];
                $_SESSION['correo'] = $tabla[0]['correo'];
                $_SESSION['clave'] = $tabla[0]['clave'];
                $_SESSION['fotoperfil'] = $tabla[0]['fotoperfil'];
                $_SESSION['nivelacceso'] = $tabla[0]['nivelacceso'];
                
                $_SESSION['login'] = true;      //Es como si fuera una llave
                echo "";
            }else{
                //Si la clave es incorrecta
                $_SESSION['idproveedor'] = "";
                $_SESSION['iddistrito'] = "";
                $_SESSION['nombredistrito'] = "";
                $_SESSION['nombres'] = "";
                $_SESSION['apellidos'] = "";
                $_SESSION['fechanac'] = "";
                $_SESSION['telefono'] = "";
                $_SESSION['correo'] = "";
                $_SESSION['clave'] = "";
                $_SESSION['fotoperfil'] = "";
                $_SESSION['nivelacceso'] = "";
                $_SESSION['login'] = false;
                echo "Error en la contraseña";
            }
        }else{
            //No encontramos al usuario
            $_SESSION['idproveedor'] = "";
            $_SESSION['iddistrito'] = "";
            $_SESSION['nombredistrito'] = "";
            $_SESSION['nombres'] = "";
            $_SESSION['apellidos'] = "";
            $_SESSION['fechanac'] = "";
            $_SESSION['telefono'] = "";
            $_SESSION['correo'] = "";
            $_SESSION['clave'] = "";
            $_SESSION['fotoperfil'] = "";
            $_SESSION['nivelacceso'] = "";
            $_SESSION['login'] = false;
            echo "El proveedor no existe";
        }
    }

    //Cerrar sesión
    if ($operacion == 'cerrar-sesion'){
        session_destroy();
        header("Location:../index.php");
    }

    //Registrar usuario
    if ($operacion == 'registrarProveedor'){

        //Array asociativo con todos los datos
        $datos = [
            "iddistrito"    =>  $_GET["iddistrito"],
            "nombres"       =>  $_GET["nombres"],
            "apellidos"     =>  $_GET["apellidos"],
            "fechanac"      =>  $_GET["fechanac"],
            "telefono"      =>  $_GET["telefono"],   
            "correo"        =>  $_GET["correo"],
            "clave"         =>  password_hash($_GET["clave"], PASSWORD_BCRYPT),
            "fotoperfil"    =>  "",
            "nivelacceso"   =>  "U"
        ];

        //Llamamos al metodo registrar
        $proveedor->registrarProveedor($datos);
    }

    //Listar proveedores
    if ($operacion == 'listarProveedores'){

        //$error = true;
        $idproveedor;
        if($_GET['idproveedor'] == -1){
            $idproveedor = $_SESSION['idproveedor'];
        }
        else{
            $idproveedor = $_GET['idproveedor'];
        }

        $tabla = $proveedor->listarProveedores(["idproveedor" => $idproveedor]);

        if(count($tabla[0]) > 0){
            echo json_encode($tabla[0]);
        }
    }

    //Modificar Proveedores
    if ($operacion == 'modificarProveedor'){
        
        // Almacenar en un Array Asociativo
        $data = [
            "idproveedor"   => $_SESSION['idproveedor'],
            "nombres"       =>  $_GET["nombres"],
            "apellidos"     =>  $_GET["apellidos"],
            "fechanac"      =>  $_GET["fechanac"],
            "telefono"      =>  $_GET["telefono"],   
            "correo"        =>  $_GET["correo"]
        ];
            //Enviamos los datos a la base de datos mediante el metodo registrar
            $proveedor->modificarProveedor($data);
    }

    //Modificar clave
    if ($operacion == 'modificarClaveProveedor'){

        $claveOriginal = $_GET['clave1'];
        $claveNueva = $_GET['clave2'];

        if(password_verify($claveOriginal, $_SESSION['clave'])){

            $datosEnviar = [
                "idproveedor" => $_SESSION['idproveedor'],
                "clave" => password_hash($claveNueva, PASSWORD_BCRYPT)
            ];

            $proveedor->modificarClaveProveedor($datosEnviar);
            echo "";
        }else{
            echo "La clave original ingresada no es correcta";
        }
    }

    //Grafico estadistico para saber la cantida de usuarios por año
    if ($operacion == 'getProveedorDashboard'){

        $data = $proveedor->getProveedorDashboard();
        echo json_encode($data);
    }

    //Grafico estadistico para saber el numero de publicaciones por categorias
    if ($operacion == 'getProveedorDashboardLineal'){

        $data = $proveedor->getProveedorDashboardLineal();
        echo json_encode($data);
    }

    //Grafico estadistico para saber el servicio de acuerdo al nivel
    if ($operacion == 'getProveedorDashboardcircular'){

        $data = $proveedor->getProveedorDashboardcircular();
        echo json_encode($data);
    }

    //Lista los servicios por categorias
    if($operacion == 'onDataproveedores'){

        $idproveedor;
        if($_GET['idproveedor'] == -1){
            $idproveedor = $_SESSION['idproveedor'];
        }else{
            $idproveedor = $_GET['idproveedor'];
        }

        $tabla = $proveedor->onDataproveedores(["idproveedor" => $idproveedor]);

        //Enviamos datos que se insertaran en la tabla
        if($tabla[0]){
            
            // Variable para saber si tiene imagen o no
            $imagen = "";

            foreach($tabla as $registro){
                //Si existe una imagen en la BD
                if ($registro['fotoperfil'] == "" || $registro['fotoperfil'] == "null"){
                    //La imagen que se mostrara por defecto
                    $imagen = "logo1.jpeg";
                } 
                else{
                    //Se muestra la imagen que esta almacenada en la BD
                    $imagen = $registro['fotoperfil'];
                }

                echo "
                    <div class='d-flex flex-row'>
                        <img src='dist/img/protadawork.jpg' class='img-fluid' width='100%' style='height: 350px; border-radius:0 0 0.5rem 0.5rem;'>
                    </div>
                    <div class='text-center' id='cardfotoperfil'>
                        <img class='profile-user-img img-fluid img-circle'
                            src='dist/img/{$imagen}'>
                        <button data-codigo='{$registro['idproveedor']}' data-img='{$registro['fotoperfil']}' class='btn-update-fotoperofil btn-sm btn'><i class='fas fa-camera' title='Cambiar imagen'></i></button>
                    </div>
                ";
            }
        }
    }

}


if (isset($_POST['operacion'])){

    //Variable operacion
    $operacion = $_POST['operacion'];

    if ($operacion == 'actualizarFotoperfil'){

        // para guardar la imagen se necesita gnerar un nombre aleatorio
        $nombreImagen = "";
        $nombre = date('dmY') . date('Gis');
        $error = false;

        //Comprobamos si contiene imagen
        if (isset($_FILES['fotoperfil'])){

            $nombreImagen = $_FILES['fotoperfil']['name'];
            $nombreImagen = explode(".", $nombreImagen);
            $nombreImagen = end($nombreImagen);
            $nombreImagen = $nombre.".".$nombreImagen;

            //Movemos
            if (!move_uploaded_file($_FILES['fotoperfil']['tmp_name'], '../dist/img/' . $nombreImagen)){
                $error = true;
            }

        }else{
            $nombreImagen = null;
        }

        $data = [
            "idproveedor"   =>  $_SESSION['idproveedor'],
            "fotoperfil"   =>  $nombreImagen
        ];

        if(!$error){
            //Enviamos los datos a la base de datos mediante el metodo registrar
            $proveedor->actualizarFotoperfil($data);
        }else{
            echo "Ocurrio un errorCtrl";
        }
    }//Fin de la operación
}

?>