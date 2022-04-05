<?php

session_start();

//Nos preguntamos si existe la operacion que nos este enviando el view
if (isset($_GET['operacion'])){

    //Invocamos al modelo y la entidad
    //require_once '../entities/EProveedor.php';  
    require_once '../models/Proveedor.php';
    //Creamos una instancia del modelo
    $proveedor = new Proveedor();

    //capturo la operacion dentro de una variable
    $operacion = $_GET['operacion'];

    //Si esxiste la operacion login
    if ($operacion == 'login'){
        //Creamos una tabla donde obtenemos un dato (correo) devuelve una fila
        $tabla = $proveedor->login($_GET['correo']);
        //obetenemos la clave ingresada por usuario
        $claveingresada = $_GET['clave'];

        //Si encontramos datos en la tabla
        if ($tabla){
            //Encontramos al usuario
            //obtenemos la clave verdadera
            $claveencriptada = $tabla['clave']; //Se refiere a la clave guardada en la base de datos.

            //COMPARAMOS: Si la clave imgresada, es igual a la claveencriptada, damos acceso
            if (password_verify($claveingresada, $claveencriptada)){
                //La contraseña es correcta
                $_SESSION['datosUsuario'] = $tabla['apellidos'] . ' ' . $tabla['nombres'];
                $_SESSION['login'] = true;      //Es como si fuera una llave
                echo "";
            }else{
                //Si la clave es incorrecta
                $_SESSION['datosUsuario'] = "";
                $_SESSION['login'] = false;
                echo "Error en la contraseña";
            }
        }else{
            //No encontramos al usuario
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
        //Instanciamos la entidad Proveedores
        $entProveedor = new EProveedor();

        //Llenar de datos a la entidad
        $entProveedor->__SET('iddistrito',      $_GET['iddistrito']);
        $entProveedor->__SET('nombres',         $_GET['nombres']);
        $entProveedor->__SET('apellidos',       $_GET['apellidos']);
        $entProveedor->__SET('fechanac',        $_GET['fechanac']);
        $entProveedor->__SET('telefono',        $_GET['telefono']);
        $entProveedor->__SET('correo',          $_GET['correo']);
        $entProveedor->__SET('clave',           $_GET['clave']);
        $entProveedor->__SET('fotoperfil',  '');
        $entProveedor->__SET('nivelacceso',     'U');

        //Llamamos al metodo registrar
        $valor = $proveedor->registrarProveedor($entProveedor);
    }
}

if (isset($_POST['operacion'])){

    //Variable operacion
    $operacion = $_POST['operacion'];

    if ($operacion == 'registrarProveedor'){
        $entProveedor = new EProveedor();

        // Almacenar en la entidad
        $entProveedor->__SET('iddistrito',      $_POST['iddistrito']);
        $entProveedor->__SET('nombres',         $_POST['nombres']);
        $entProveedor->__SET('apellidos',       $_POST['apellidos']);
        $entProveedor->__SET('fechanac',        $_POST['fechanac']);
        $entProveedor->__SET('telefono',        $_POST['telefono']);
        $entProveedor->__SET('correo',          $_POST['correo']);
        $entProveedor->__SET('clave',           $_POST['clave']);

        $nombreimg = "";

        // Comprobar img vacio
        if (!isset($_FILES['fotoperfil'])){
            $nombreimg = "";
        }else{
            $nombreimg = date(""). ".jpg";
        }

        // Asignando la foto
        $entProveedor->__SET('fotoperfil', $nombreimg);

        // Con el método registrar enviamos los datos a la base de datos
        $proveedor->registrarProveedor($entProveedor);

        if (move_uploaded_file($_FILES['fotoperfil']['tmp_name'], "../dist/img/" .$nombreimg)){
            //Archivo subido correctamente
        }

    }
}

?>