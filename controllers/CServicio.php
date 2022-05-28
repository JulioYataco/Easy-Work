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

    //Listar servicios en general
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
                                    <h4 data-idproveedores='{$registro->idproveedor}' class='CapIdproveedor'>{$registro->proveedor}</h4>
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

                echo "
                                </div>
                                <div class='content-message-services' style='display: flex;'>
                                    <span>Nivel: {$registro->nivel}</span>
                                    <div class='buttonService'>
                                        <button data-idcode='{$registro->idproveedor}' class='btnContactoListar btn-sm btn-primary'>Contactar</button>
                                        <button data-idcode='{$registro->idproveedor}' class='btn-comentario btn-sm btn-info'>Comentar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> ";
            }
        }
    }

    //Lista los servicios por categorias
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
                                <h4 data-idproveedores='{$registro['idproveedor']}' class='CapIdproveedor'>{$registro['proveedor']}</h4>
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
                            <div class='content-message' style='display: flex;'>
                                    <span>Nivel: {$registro['nivel']}</span>
                                    <div class='buttonService'>
                                        <button data-idcode='{$registro['idproveedor']}' class='btnContactoListar btn-sm btn-primary'>Contactar</button>
                                        <button data-idcode='{$registro['idproveedor']}' class='btn-comentario btn-sm btn-info'>Comentar</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    //Lista los servicios por departamentos
    if($operacion == 'listarServiciosDepartamento'){

        $tabla = $servicio->listarServiciosDepartamento(["iddepartamento" => $_GET['iddepartamento']]);

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
                            <div class='content-message' style='display: flex;'>
                                    <span>Nivel: {$registro['nivel']}</span>
                                    <div class='buttonService'>
                                        <button data-idcode='{$registro['idproveedor']}' class='btnContactoListar btn-sm btn-primary'>Contactar</button>
                                        <button data-idcode='{$registro['idproveedor']}' class='btn-comentario btn-sm btn-info'>Comentar</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    //Lista los servicios por provincias
    if($operacion == 'listarServiciosProvincia'){

        $tabla = $servicio->listarServiciosProvincia(["idprovincia" => $_GET['idprovincia']]);

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
                            <div class='content-message' style='display: flex;'>
                                    <span>Nivel: {$registro['nivel']}</span>
                                    <div class='buttonService'>
                                        <button data-idcode='{$registro['idproveedor']}' class='btnContactoListar btn-sm btn-primary'>Contactar</button>
                                        <button data-idcode='{$registro['idproveedor']}' class='btn-comentario btn-sm btn-info'>Comentar</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    //Lista los servicios por distritos
    if($operacion == 'listarServiciosDistrito'){

        $tabla = $servicio->listarServiciosDistrito(["iddistrito" => $_GET['iddistrito']]);

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
                            <div class='content-message' style='display: flex;'>
                                    <span>Nivel: {$registro['nivel']}</span>
                                    <div class='buttonService'>
                                        <button data-idcode='{$registro['idproveedor']}' class='btnContactoListar btn-sm btn-primary'>Contactar</button>
                                        <button data-idcode='{$registro['idproveedor']}' class='btn-comentario btn-sm btn-info'>Comentar</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    //Capturar un servicio por proveedor
    if($operacion == 'oneDataServicioProveedor'){

        $idproveedor;
        if($_GET['idproveedor'] == -1){
            $idproveedor = $_SESSION['idproveedor'];
        }else{
            $idproveedor = $_GET['idproveedor'];
        }

        $tabla = $servicio->oneDataServicioProveedor(["idproveedor" => $idproveedor]);

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
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

    //Listar un servicio
    if($operacion == 'oneDataServicio'){

        $tabla = $servicio->oneDataServicio(["idservicio" => $_GET['idservicio']]);

        if (count($tabla[0]) > 0){
            echo json_encode($tabla[0]);
        }
    }

    //Elimianr un servicio
    if($operacion == 'eliminarServicio'){
        $data = $servicio->eliminarServicio(["idservicio" => $_GET['idservicio']]);
    }

    //Listar los contactos por cada proveedor
    if($operacion == 'oneDataContacto'){

        $tabla = $servicio->oneDataContacto(["idproveedor" => $_GET["idproveedor"]]);

        if($tabla){
            echo json_encode($tabla[0]);
        }
    }

    //Listar las redes sociales por servicio
    if($operacion == 'oneDataRedsocial'){

        $tabla = $servicio->oneDataRedsocial(["idproveedor" => $_GET["idproveedor"]]);

        if($tabla){
            
            foreach($tabla as $fila){
                echo "
                    <spam><a href='{$fila['link']}'><spam>{$fila['redsocial']}</spam></a></spam>
                ";
            }
        }
    }

    //Listar la red social de un proveedor
    if($operacion == 'oneDataRedSocialProveedor'){

        $data = $servicio->oneDataRedSocialProveedor(["idproveedor" => $_GET['idproveedor']]);

        if($data){
            
            foreach($data as $fila){
                echo "
                    <spam><a href='{$fila['link']}'><spam>{$fila['redsocial']}</spam></a></spam>
                ";
            }
        }

    }

    //Listar los servicios activos
    if($operacion == 'listarServiciosActivos'){

        $datos = $servicio->listarServiciosActivos();

        if(count($datos) > 0){

            foreach ($datos as $fila){
                echo "
                    <tr>
                        <td>{$fila->idservicio}</td>
                        <td>{$fila->nombrecategoria}</td>
                        <td>{$fila->servicio}</td>
                        <td>{$fila->proveedor}</td>
                        <td>{$fila->ubicacion}</td>
                        <td>{$fila->nivel}</td>
                        <td>
                            <button data-idservicio='{$fila->idservicio}' title='Inabilitar Servicio' type='button' class='btn btn-danger btnElimServ'>
                                <i class='nav-icon fas fa-user-minus'></i>
                            </button>
                        </td>
                    </tr>
                ";
            }
        }
    }

    //Listar los servicios inactivos
    if($operacion == 'listarServiciosInactivos'){

        $datos = $servicio->listarServiciosInactivos();

        if(count($datos) > 0){

            foreach ($datos as $fila){
                echo "
                    <tr>
                        <td>{$fila->idservicio}</td>
                        <td>{$fila->nombrecategoria}</td>
                        <td>{$fila->servicio}</td>
                        <td>{$fila->proveedor}</td>
                        <td>{$fila->ubicacion}</td>
                        <td>{$fila->nivel}</td>
                        <td>
                            <button data-idservicio='{$fila->idservicio}' title='Inabilitar Servicio' type='button' class='btn btn-info btnActivarServ'>
                            <i class='fas fa-undo'></i>
                            </button>
                        </td>
                    </tr>
                ";
            }
        }
    }

    // Dar de baja a un servicio
    if ($operacion == 'eliminarServiciosActivos'){

        // almacenamos en un array
        $data = [
            "idservicio"   =>  $_GET['idservicio']
        ];
        // enviamos a la bd mediante el metodo 
        $servicio->eliminarServiciosActivos($data);
    }

    // Dar de alta a un servicio
    if ($operacion == 'ActivarServiciosActivos'){

        // almacenamos en un array
        $data = [
            "idservicio"   =>  $_GET['idservicio']
        ];
        // enviamos a la bd mediante el metodo 
        $servicio->ActivarServiciosActivos($data);
    }


    //PRUEBA
    /*if($operacion == 'listarOneDataProveedor'){

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
    }*/
   
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