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

    //Grafico estadistico
    if ($operacion == 'getProveedorDashboard'){

        $data = $proveedor->getProveedorDashboard();
        echo json_encode($data);
    }

    //Grafico estadistico
    if ($operacion == 'getProveedorDashboardLineal'){

        $data = $proveedor->getProveedorDashboardLineal();
        echo json_encode($data);
    }

    //Grafico estadistico
    if ($operacion == 'getProveedorDashboardcircular'){

        $data = $proveedor->getProveedorDashboardcircular();
        echo json_encode($data);
    }

}


if (isset($_POST['operacion'])){

    //Variable operacion
    $operacion = $_POST['operacion'];

    /*if ($_POST['operacion'] == 'registrarProveedor'){

        // Almacenar en un Array Asociativo
        $datos = [
            "iddistrito"    =>  $_POST["iddistrito"],
            "nombres"       =>  $_POST["nombres"],
            "apellidos"     =>  $_POST["apellidos"],
            "fechanac"      =>  $_POST["fechanac"],
            "telefono"      =>  $_POST["telefono"],   
            "correo"        =>  $_POST["correo"],
            "clave"         =>  $_POST["clave"],
            "fotoperfil"    =>  "",
            "nivelacceso"   =>  "U"
        ];

        $nombreimg = "";

        // Comprobar img vacio
        if (!isset($_FILES['fotoperfil'])){
            $nombreimg = "";
        }else{
            $nombreimg = date(""). ".jpg";
        }

        // Asignando la foto
        $_FILES['fotoperfil']->__SET($nombreimg);

        // Con el método registrar enviamos los datos a la base de datos
        $proveedor->registrarProveedor($datos);

        if (move_uploaded_file($_FILES['fotoperfil']['tmp_name'], "../dist/img/" .$nombreimg)){
            //Archivo subido correctamente
        }
    }*/
}

?>