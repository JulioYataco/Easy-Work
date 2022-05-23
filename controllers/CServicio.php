<?php
// Sesión heredada
session_start();

//Lamamos al modelo
require_once '../models/Servicio.php';

//Instanciamos el modelo
$servicio = new Servicio();

if (isset ($_GET['operacion'])){

    //capturo la operacion dentro de una variable
    $operacion = $_GET['operacion'];

    if($operacion == 'listarServicios'){   

        $tabla = $servicio->listarServicios();    

        // Enviar resultados a la vista
        if(count($tabla) == 0){
            echo "<h5>No encontramos registros disponibles</h5>";
        }
        else{
            // Variable para saber si tiene imagen o no
            $imagen = "";

            foreach($tabla as $registro){

                $data = $servicio->oneDataRedSocialProveedor(["idproveedor" => $registro->idproveedor]);

                //Si existe una imagen en la BD
                if ($registro->fotoportada == "" || $registro->fotoportada == "null"){
                    //La imagen que se mostrara por defecto
                    $imagen = "image-portada-default.png";
                } 
                else{
                    //Se muestra la imagen que esta almacenada en la BD
                    $imagen = $registro->fotoportada;
                }

                echo "
                    <div class='card'>
                        <div class='form-row'>
                            <div class='form-group control-img col-md-4' data-idservicio='{$registro->idservicio}'>
                                <img src='dist/img/{$imagen}'>
                            </div>";
                        
                    
                    if(isset($_SESSION['idproveedor'])){
                        // Mostrar icono de imagen, solo cuando el usuario lo halla registrado o sea un administrador
                        if ($_SESSION['idproveedor'] == $registro->idproveedor || $_SESSION['nivelacceso'] == 'A'){
                            echo "
                                <li class='options btn-update-img' data-codigo='{$registro->idservicio}' data-name='{$registro->servicio}' data-img='{$registro->fotoportada}'><i class='fas fa-camera' title='Cambiar imagen'></i></li>
                            ";
                        }
                    }
                    

                echo "
                            <div class='form-group col-md-8'>
                                <div class='header-card'>
                                    <h4>{$registro->servicio}</h4>
                                <div class='options-icon'>";

                                if(isset($_SESSION['idproveedor'])){

                                    // Mostrar icono (Eliminar) solo cuando el usuario lo haya registrado
                                    if ($_SESSION['idproveedor'] == $registro->idproveedor){
                                        echo "
                                            <li class='options btn-eliminar' data-codigo='{$registro->idservicio}'><i class='fas fa-trash-alt' title='Eliminar publicación' data-title='Eliminar'></i></li>
                                        ";
                                    }
                                }
                            
                                if(isset($_SESSION['idproveedor'])){

                                    // Mostrar icono (Editar) solo si es Administrador o el usuario que lo registro
                                    if ($_SESSION['nivelacceso'] == 'A' || $_SESSION['idproveedor'] == $registro->idproveedor){
                                        echo "
                                            <li class='options btn-editar' data-codigo='{$registro->idservicio}' data-nombreservicio='{$registro->servicio}' data-img='{$registro->fotoportada}'><i class='fa fa-edit' title='Modificar publicación' data-title='Editar servicio'></i></li>           
                                        ";
                                    }
                                }

                echo "   
                                </div>                     
                                </div>
                                <div class='content-message-services'>
                                    <p>{$registro->descripcion}</p>
                                    <hr>    
                                </div>
                                <div class='content-message-services'>
                                    <p>Ubicanos en: {$registro->ubicacion}</p>";
                                    
                                foreach($data as $fila){
                                    echo "
                                        
                                        <spam><a href='{$fila['link']}'><spam>{$fila['redsocial']}</spam></a></spam>
                                    ";
                                }

                                    echo "
                                </div>
                                <div class='content-message' style='display: flex;'>
                                    <span>Nivel: {$registro->nivel}</span>
                                    <div class='buttonService'>
                                        <button data-idcode='{$registro->idproveedor}' class='btnContactoListar btn-sm btn-primary'>Contactar</button>
                                        <button class='btn-comentario btn-sm btn-info'>Comentar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> ";
            }
        }
    }

    if($operacion == 'onDataCategoria'){

        $tabla = $servicio->onDataCategoria(["idcategoria" => $_GET['idcategoria']]);

        //Enviamos datos que se insertaran en la tabla
        if($tabla){
            
            // Variable para saber si tiene imagen o no
            $imagen = "";

            foreach($tabla as $registro){
                //Si existe una imagen en la BD
                if ($registro['fotoportada'] == "" || $registro['fotoportada'] == "null"){
                    //La imagen que se mostrara por defecto
                    $imagen = "image-portada-default.png";
                } 
                else{
                    //Se muestra la imagen que esta almacenada en la BD
                    $imagen = $registro['fotoportada'];
                }
    
                echo "<div class='card'>
                        <div class='form-row'>
                            <div class='form-group col-md-4'>
                                <img src='dist/img/{$imagen}'>
                            </div>";

                            if(isset($_SESSION['idproveedor'])){

                                if ($_SESSION['idproveedor'] == $registro['idproveedor'] || $_SESSION['nivelacceso'] == 'A'){
                                    echo "
                                        <li class='options btn-update-img' data-codigo='{$registro['idservicio']}' data-name='{$registro['servicio']}' data-img='{$registro['fotoportada']}'><i class='fas fa-camera' title='Cambiar imagen'></i></li>
                                    ";
                                }
                            }
    
                echo "
                        <div class='form-group col-md-8'>
                            <div class='header-card'>
                                <h4>{$registro['servicio']}</h4>
                            <div class='options-icon'>";

                            if(isset($_SESSION['idproveedor'])){

                                // Mostrar icono (Eliminar) solo cuando el usuario lo haya registrado
                                if ($_SESSION['idproveedor'] == $registro['idproveedor']){
                                    echo "
                                        <li class='options btn-eliminar' data-codigo='{$registro['idservicio']}'><i class='fas fa-trash-alt' title='' data-title='Eliminar'></i></li>
                                    ";
                                }
                            }
                        
                            if(isset($_SESSION['idproveedor'])){

                                // Mostrar icono (Editar) solo si es Administrador o el usuario que lo registro
                                if ($_SESSION['nivelacceso'] == 'A' || $_SESSION['idproveedor'] == $registro['idproveedor']){
                                    echo "
                                        <li class='options btn-editar' data-codigo='{$registro['idservicio']}' data-nombreservicio='{$registro['servicio']}'data-descripcion='{$registro['descripcion']}' data-ubicacion='{$registro['ubicacion']}' data-nivel='{$registro['nivel']}'><i class='fa fa-edit' title='' data-title='Editar servicio'></i></li>           
                                    ";
                                }
                            }
    
                    echo "    
                        </div>                    
                            </div>
                            <div class='content-message-services'>
                                <p>{$registro['descripcion']}</p>
                                <hr>    
                            </div>
                            <div class='content-message-services'>
                                <p>Ubicanos en: {$registro['ubicacion']}</p>
                            </div>
                            <div class='content-message-services'>
                                <p>Nivel: {$registro['nivel']}</p>
                                    <button class='buttonService btnContactoListar btn-sm btn-primary'>Contactar</button>
                                    <button class='buttonService2 btn-comentario btn-sm btn-info'>Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    if($operacion == 'oneDataServicioProveedor'){

        $tabla = $servicio->oneDataServicioProveedor(["idproveedor" => $_SESSION['idproveedor']]);

        //Enviamos datos que se insertaran en la tabla
        if($tabla){
            
            // Variable para saber si tiene imagen o no
            $imagen = "";

            foreach($tabla as $registro){
                //Si existe una imagen en la BD
                if ($registro['fotoportada'] == "" || $registro['fotoportada'] == "null"){
                    //La imagen que se mostrara por defecto
                    $imagen = "image-portada-default.png";
                } 
                else{
                    //Se muestra la imagen que esta almacenada en la BD
                    $imagen = $registro['fotoportada'];
                }
    
                echo "<div class='card'>
                        <div class='form-row'>
                            <div class='form-group col-md-4'>
                                <img src='dist/img/{$imagen}'>
                            </div>";

                            if(isset($_SESSION['idproveedor'])){

                                if ($_SESSION['idproveedor'] == $registro['idproveedor'] || $_SESSION['nivelacceso'] == 'A'){
                                    echo "
                                        <li class='options btn-update-img' data-codigo='{$registro['idservicio']}' data-name='{$registro['servicio']}' data-img='{$registro['fotoportada']}'><i class='fas fa-camera' title='Cambiar imagen'></i></li>
                                    ";
                                }
                            }
    
                echo "
                        <div class='form-group col-md-8'>
                            <div class='header-card'>
                                <h4>{$registro['servicio']}</h4> 
                                <i class='nav-icon ml-auto fas fa-ellipsis-h'></i>
                            <div class='options-icon'>";

                            if(isset($_SESSION['idproveedor'])){

                                // Mostrar icono (Eliminar) solo cuando el usuario lo haya registrado
                                if ($_SESSION['idproveedor'] == $registro['idproveedor']){
                                    echo "
                                        <li class='options btn-eliminar' data-codigo='{$registro['idservicio']}'><i class='fas fa-trash-alt' title='' data-title='Eliminar'></i></li>
                                    ";
                                }
                            }
                        
                            if(isset($_SESSION['idproveedor'])){

                                // Mostrar icono (Editar) solo si es Administrador o el usuario que lo registro
                                if ($_SESSION['nivelacceso'] == 'A' || $_SESSION['idproveedor'] == $registro['idproveedor']){
                                    echo "
                                        <li class='options btn-editar' data-codigo='{$registro['idservicio']}' data-nombreservicio='{$registro['servicio']}'data-descripcion='{$registro['descripcion']}' data-ubicacion='{$registro['ubicacion']}' data-nivel='{$registro['nivel']}'><i class='fa fa-edit' title='' data-title='Editar servicio'></i></li>           
                                    ";
                                }
                            }
    
                    echo "    
                        </div>                    
                            </div>
                            <div class='content-message-services'>
                                <p>{$registro['descripcion']}</p>
                                <hr>    
                            </div>
                            <div class='content-message-services'>
                                <p>Ubicanos en: {$registro['ubicacion']}</p>
                            </div>
                            <div class='content-message-services'>
                                <p>Nivel: {$registro['nivel']}</p>
                                    <button class='buttonService btnContactoListar btn-sm btn-primary'>Contactar</button>
                                    <button class='buttonService2 btn-comentario btn-sm btn-info'>Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    if($operacion == 'oneDataServicio'){

        $tabla = $servicio->oneDataServicio(["idservicio" => $_GET['idservicio']]);

        if (count($tabla[0]) > 0){
            echo json_encode($tabla[0]);
        }
    }

    if($operacion == 'eliminarServicio'){
        $data = $servicio->eliminarServicio(["idservicio" => $_GET['idservicio']]);
    }

    if($operacion == 'oneDataContacto'){

        $tabla = $servicio->oneDataContacto(["idproveedor" => $_GET["idproveedor"]]);

        if($tabla){
            echo json_encode($tabla[0]);
        }
    }

    //PRUEBA
    if($operacion == 'listarOneDataProveedor'){

        $tabla = $servicio->listarOneDataProveedor(["idproveedor" => $_SESSION['idproveedor']]);

        //Enviamos datos que se insertaran en la tabla
        if($tabla){
            
            // Variable para saber si tiene imagen o no
            $imagen = "";

            foreach($tabla as $registro){
                //Si existe una imagen en la BD
                if ($registro['fotoportada'] == "" || $registro['fotoportada'] == "null"){
                    //La imagen que se mostrara por defecto
                    $imagen = "image-portada-default.png";
                } 
                else{
                    //Se muestra la imagen que esta almacenada en la BD
                    $imagen = $registro['fotoportada'];
                }
    
                echo "<div class='card'>
                        <div class='form-row'>
                            <div class='form-group col-md-4'>
                                <img src='dist/img/{$imagen}'>
                            </div>";

                            if(isset($_SESSION['idproveedor'])){

                                if ($_SESSION['idproveedor'] == $registro['idproveedor'] || $_SESSION['nivelacceso'] == 'A'){
                                    echo "
                                        <li class='options btn-update-img' data-codigo='{$registro['idservicio']}' data-name='{$registro['servicio']}' data-img='{$registro['fotoportada']}'><i class='fas fa-camera' title='Cambiar imagen'></i></li>
                                    ";
                                }
                            }
    
                echo "
                        <div class='form-group col-md-8'>
                            <div class='header-card'>
                                <h4>{$registro['servicio']}</h4> 
                                <i class='nav-icon ml-auto fas fa-ellipsis-h'></i>
                            <div class='options-icon'>";

                            if(isset($_SESSION['idproveedor'])){

                                // Mostrar icono (Eliminar) solo cuando el usuario lo haya registrado
                                if ($_SESSION['idproveedor'] == $registro['idproveedor']){
                                    echo "
                                        <li class='options btn-eliminar' data-codigo='{$registro['idservicio']}'><i class='fas fa-trash-alt' title='' data-title='Eliminar'></i></li>
                                    ";
                                }
                            }
                        
                            if(isset($_SESSION['idproveedor'])){

                                // Mostrar icono (Editar) solo si es Administrador o el usuario que lo registro
                                if ($_SESSION['nivelacceso'] == 'A' || $_SESSION['idproveedor'] == $registro['idproveedor']){
                                    echo "
                                        <li class='options btn-editar' data-codigo='{$registro['idservicio']}' data-nombreservicio='{$registro['servicio']}'data-descripcion='{$registro['descripcion']}' data-ubicacion='{$registro['ubicacion']}' data-nivel='{$registro['nivel']}'><i class='fa fa-edit' title='' data-title='Editar servicio'></i></li>           
                                    ";
                                }
                            }
    
                    echo "    
                        </div>                    
                            </div>
                            <div class='content-message-services'>
                                <p>{$registro['descripcion']}</p>
                                <hr>    
                            </div>
                            <div class='content-message-services'>
                                <p>Ubicanos en: {$registro['ubicacion']}</p>
                            </div>
                            <div class='content-message-services'>
                                <p>Nivel: {$registro['nivel']}</p>
                                    <button class='buttonService btnContactoListar btn-sm btn-primary'>Contactar</button>
                                    <button class='buttonService2 btn-comentario btn-sm btn-info'>Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }
    
}

if (isset($_POST['operacion'])){

    //capturo la operacion dentro de una variable
    $operacion = $_POST['operacion'];

    if ($operacion == 'registrarServicio'){

        // para guardar la imagen se necesita gnerar un nombre aleatorio
        $nombreImagen = "";
        $nombre = date('dmY') . date('Gis');
        $error = false;

        //Comprobamos si contiene imagen
        if (isset($_FILES['fotoportada'])){

            $nombreImagen = $_FILES['fotoportada']['name'];
            $nombreImagen = explode(".", $nombreImagen);
            $nombreImagen = end($nombreImagen);
            $nombreImagen = $nombre.".".$nombreImagen;

            //Movemos
            if (!move_uploaded_file($_FILES['fotoportada']['tmp_name'], '../dist/img/' . $nombreImagen)){
                $error = true;
            }

        }else{
            $nombreImagen = null;
        }

        $data = [
            "idproveedor"   =>  $_SESSION['idproveedor'],
            "idcategoria"   =>  $_POST['idcategoria'],
            "servicio"      =>  $_POST['servicio'],
            "descripcion"   =>  $_POST['descripcion'],
            "ubicacion"     =>  $_POST['ubicacion'],
            "nivel"         =>  $_POST['nivel'],
            "fotoportada"   =>  $nombreImagen
        ];

        if(!$error){
            //Enviamos los datos a la base de datos mediante el metodo registrar
            $servicio->registrarServicio($data);
        }else{
            echo "Ocurrio un errorCtrl";
        }
    }//Fin de la operación

    if ($operacion == 'modificarServicio'){

        // para guardar la imagen se necesita gnerar un nombre aleatorio
        $nombreImagen = "";

        // Comprobar img vacio
        if (!isset($_FILES['fotoportada'])){

            $nombreImagen = null;
        }
        else{
            $ext = explode('.', $_FILES['fotoportada']['name']);   // Separar la extension de la imagen
            $nombreImagen = date('Ymdhis')  .'.' . end($ext);

            //Movemos al destino donde se almacenara la imagen
            if(!move_uploaded_file($_FILES['fotoportada']['tmp_name'], '../dist/img/' . $nombreImagen)){
                echo "Error";
            }
        }

        echo $servicio->modificarServicio([

            "idservicio" =>     $_POST['idservicio'],
            "idproveedor" =>    $_SESSION['idproveedor'],
            "idcategoria" =>    $_POST['idcategoria'],
            "servicio" =>       $_POST['servicio'],
            "descripcion" =>    $_POST['descripcion'],
            "ubicacion" =>      $_POST['ubicacion'],
            "nivel" =>          $_POST['nivel'],
            "fotoportada" => $nombreImagen
        ]);   
    }//Fin de la operación Modificar
}



?>