<?php
session_start();
?>
<div class="row content-header">
    <div class="col-xl-5 col-md-6 col-sm-12 form-group">
        <form class="form-inline">
            <label class="my-1 mr-2" for="filtro-categorias">Filtrar:</label>
            <div class="input-group">
                <select class="custom-select form-control" id="filtro-categorias">
                    <!-- Cargados de manera asincrónica -->
                </select>

                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-outline-success" id="btn-registrar-servicio" type="button" title="Registrar nuevo servicio" data-toggle="modal" data-target="#modal-servicios"><i class="fas fa-plus-square"></i> Nuevo Publicación</button>
                    <!-- <button class="btn btn-outline-primary" id="btn-aviso-registro" type="button" title="Registrar nuevo servicio" data-toggle="modal" data-target="#modal-iniciarsesion" style="margin-top: 1em">Ingresar</button> -->
                </div>
            </div>
        </form>
    </div>  
</div>
<hr>

<!-- <span class="badge badge-primary">Primary</span> -->


<!-- Modal de contactos -->
<div class="modal fade" id="modal-contacto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contactos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Celular">Celular</label>
                            <input class="form-control" type="text" id="txtCelular" disabled="disabled">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Celular">Telefono</label>
                            <input class="form-control" type="text" id="txtTelefono" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group col-md-12">
                            <label for="Celular">Email:</label>
                            <input class="form-control" type="text" id="txtEmail" disabled="disabled">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Comentario -->
<div class='modal fade' id='ModalComentario' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLongTitle'>Comentarios</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class='modal-body'>
                <div class='col-md'>
                    <div class='inputs'>
                        <label>Lista de Comentarios</label><br>
                        <div style='border : 1px solid; width: 100%; height: 230px;'>
                            <!-- Aqui se cargaran los datos de forma asincrona -->
                        </div>
                        <hr>
                    </div>
                    <div class='inputs'>
                        <label>Escriba un comentario</label>
                        <div style='display:flex;'>
                            <textarea style='padding: 10px;' id='areaComent' cols='50' rows='2' placeholder='Comente algo ....'></textarea>
                                <button class='btn btn-sm btn-primary' id='btnComentarRegis' data-dismiss='modal'>Enviar<i class='nav-icon fas fa-paper-plane'></i></button>
                        </div>
                        <div class="input-group">
                            <select class="custom-select form-control form-control-border" id="txtpuntuacion">
                                <option value="">Puntuación</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Comentario -->
<!-- <div class="modal fade" id="modal-comentarios" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comentar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <h4>-- Aqui se listara los comentarios --</h4>
                <hr>
                <form autocomplete="off">
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <div class="input-group">
                                <select class="custom-select form-control form-control-border" id="calificacion" autofocus="true">
                                    <option value="">Califica este servicio</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <textarea class="form-control form-control-border" placeholder="Escribe un comentario" id="Comentario" rows="1" maxlength="550" style="max-height:227px;"></textarea>
                        </div>
                        <div class="form-group col-md-2">
                            <button class="form-control btn btn-sm btn-info">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div> -->

<!-- Contenido de los cards -Servicios -->
<div class="group-cards" id="card-servicios">
    <!-- Cards servicios cargados de manera asincrona - ajax -->
</div>

<!-- Modal para publicar servicio -->
<div class="modal fade" id="modal-servicios" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" data-animation="slideInOutDown">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header header-servicio bg-primary">
                <h4 class="modal-title titulo-servicio text-uppercase" id="titulo-servicio-registro">Publicar Servicio</h4>
                <!-- Boton para cerrera el modal -->    
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" id="formulario-servicios">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <select class="custom-select form-control form-control-border" id="categoria" autofocus="true">
                                    <!-- Aqui se cargara las categorias de manera asincronica -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control form-control-border" placeholder="Nombre del servicio" id="servicio" maxlength="35">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control form-control-border" placeholder="Descripción" id="descripcion" rows="1" maxlength="550" style="max-height:227px;"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control form-control-border" id="ubicacion" placeholder="Ubicación de establecimiento (Opcional)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <select class="custom-select form-control form-control-border" id="nivel" autofocus="true">
                                    <option value="">Nivel de experiencia</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Sub formulario img portada -->
                <form id="formulario-img-insert" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-xm-12 col-sm-12 col-md-12 col-xl-6 col-lg-6 file-image-portada">
                            <label for="fotoportada">Foto de portada (Opcional)</label>        
                            <div class="custom-file d-none">
                                <input type="file" class="custom-file-input form-control" accept=".jpg, .jpeg, .png" id="input-foto-portada" lang="es">
                                <label class="custom-file-label" for="fotoportada">Elijá una imagen</label>
                            </div>
                            <!-- Muestra la imagen previa -->
                            <div class="contenido-img d-none">
                                <img src="dist/img/image-portada-default.png" id="img-previa-registrar" class="imagen-responsivo" style="height:190px; border-radius:3px">
                                <div class="hover-imagen">
                                    <i class="fas fa-times" id="eliminar-imagen" title="Eliminar imagen"></i>
                                </div>
                            </div>
                            <button type="button" id="btn-subir-imagen" class="btn btn-block btn-outline-primary">
                                <i class="fas fa-camera"></i> Subir imagen
                            </button>
                        </div>                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btn-guardar-servicio" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para cambiar imagen del proveedor de servicio -->
<div class="modal" id="modal-actualizar-img" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-teal text-light">
        <h5 class="modal-title text-uppercase text-weigth-600" id="nombre-servicio">Cambiar la imagen actual</h5>
        <!-- Boton para cerrera el modal -->
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form autocomplete="off" id="formulario-img">
              <div class="form-row">
                <div class="col-md-12">
                    <!-- <label for="imagen-portada">Imagén de portada</label>  -->       
                    <div class="custom-file d-none">
                        <input type="file" class="custom-file-input form-control" accept=".jpg, .jpeg, .png" id="imagen-portada" lang="es" placeholder="IMGE">
                        <label class="custom-file-label" for="imagenportada" id="nombre-imagen">Elijá una nueva imagen</label>
                    </div>
                    <!-- Muestra la imagen previa -->
                    <div class="contenido-img-perfil">
                        <img src="dist/img/image-portada-default.png" id="img-servicio" width="400" height="200" class="imagen-responsivo">
                        
                        <div class="hover-imagen d-none">
                            <i class="fas fa-times" id="eliminar-imagen-portada" title="Eliminar imagen"></i>
                        </div>
                    </div>

                    <!-- Botón que ejecuta el input file -->
                    <button type="button" id="btn-subir-img-servicio" class="btn mt-1 btn-block btn-outline-primary">
                        <i class="fas fa-camera-retro"></i> Subir imagen
                    </button>
                </div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar proceso</button>
        <button type="button" id="guardar-imagen" class="btn btn-sm btn-primary">Guardar imagen</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para indicar al usuario que se registre o inicie sesión -->
<!-- <div class="modal fade" id="modal-iniciarsesion" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content bg-outline-primary">
            
            <div class="modal-body" style="text-align: center; margin-top: 1.5em">
                <h3>¡Hola! para publicar servicios, <br>Ingresa a tu cuenta</h3>
                <br>
                <div class="row">
                    <div class="form-group col-md-12">
                        <a href="index.php?view=registrar-login" class="btn btn-md btn-primary" type="button">Crear cuenta</a>
                    </div>
                    <div class="form-group col-md-12">
                        <a href="index.php?view=login" class="btn btn-md">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<script>
    $(document).ready(function (){

        var datosNuevos = true;
        var idcategoria = "";
        var idservicio = -1;
        var idproveedor = -1;
        var servicio = "";
        var descripcion = "";
        var ubicacion = "";
        var nivel = ""; 
        var fotoportada = "";

        var idcontacto = "";

        //Para comentario
        var comentario = "";
        var puntuacion = "";


        // Variables temporales
        var idcategoriatmp = "";
        var serviciotmp = ""; 
        var imagenportadatmp = "";

        function listarServicios(){
            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: 'operacion=listarServicios',
                success: function (e){
                    $("#card-servicios").html(e);
                }
            });
        }

        // Mostrar categorias en el modal
        function listarCategoriasModal(){

            $.ajax({
                url: 'controllers/CCategoria.php',
                type: 'GET',
                data: 'operacion=listarCategoriasModalSelect',
                success: function (e){
                    //console.log(e);
                    $("#categoria").html(e); //ID de select
                    $("#filtro-categorias").html(e);
                }
            });
        }

        // Cambiar aparaiencia del modal registrar servicio por actualizar si es true
        /*function aparienciaModificarServicio(modificar){

            // Validar el valor del parametro
            if (modificar){
                // Modificar cabecera del modal
                $(".titulo-servicio").html("Modificar datos del servicio");
                $(".header-servicio").removeClass("bg-primary");
                $(".header-servicio").addClass("bg-teal");

                // Cambiar Botón guardar por modificar
                $("#btn-guardar-servicio").html("Modificar");
                $("#btn-guardar-servicio").removeClass("btn-primary");
                $("#btn-guardar-servicio").addClass("btn-steal");
            }
            else{
                // Modificar cabecera del modal, a su estado normal
                $(".titulo-servicio").html("Registro de servicios");
                $(".header-servicio").removeClass("bg-teal");
                $(".header-servicio").addClass("bg-primary");

                // Cambiar Botón guardar, a su estado normal
                $("#btn-guardar-servicio").html("Guardar");
                $("#btn-guardar-servicio").removeClass("btn-steal");
                $("#btn-guardar-servicio").addClass("btn-primary");
            }
        }*/
    
        //Boton para resetar a "Publicar servicio"
        $("#btn-registrar-servicio").click(function(){
            $("#formulario-servicios")[0].reset();
            $("#btn-guardar-servicio").removeClass("btn-info").addClass("btn-primary")
            .html("Publicar");
        });

        //Lista los servicios por categorias
        $("#filtro-categorias").change(function (){

            var datos = {
                operacion     : 'onDataCategoria',
                idcategoria   : $(this).val()
            };
            console.log($(this).val());

            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    $("#card-servicios").html(e);
                }
            });
        });

        //Evento del boton que ejecuta al input (guardar)
        $("#btn-subir-imagen").click(function (){
            $("#input-foto-portada").click();
        });

        //Mostrar imagen previa a actualizar servicio
        $("#imagen-portada").change(function (e){
            //Obtener la seleccion de imagen
            let image = $("#img-servicio");
            cargarImgPrevia(e, image);

            //Mostrar efecto hover
            //$(".hover-imagen").removeClass('d-none');
        });

        //Elimina la imagen del formulario publicar servicio
        $("#eliminar-imagen").click(function (){

            $("#formulario-img-insert")[0].reset();
            $("#img-previa-registrar").attr('src', 'dist/img/image-portada-default.png');

            // Ocultar capa img y input-file
            $(".contenido-img").addClass("d-none");
        });

        // Función para cargar imagen previa
        function cargarImgPrevia(e, img){
            // Creando el objeto de la clase FileReader
            var reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro filereader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function (){
                img.attr('src', reader.result);
            }
        }

        // Mostrar imagen en la etiqueta img
        function mostrarImagenPrevia(idselector, imagen){
            // Asignando la imagen a su atributo src
            idselector.attr("src", "dist/img/" + imagen);
        }

        // Mostrar imagen previa a registrar servicio
        $("#input-foto-portada").change(function (e){

            //Obtener la imagen
            let idimage = $("#img-previa-registrar");
            cargarImgPrevia(e, idimage);

            // Mostrar contenido de la img + input
            $(".contenido-img").removeClass("d-none");
        });

        //Reseta modal
        $("#btn-registrar-servicio").click(function(){
            $("#formulario-servicios")[0].reset();
        });

        //Guardar un servicio
        $("#btn-guardar-servicio").click(function (){

            // Nuevo objeto HTM5 (formData) con los datos que necesitan el controlador
            var formData = new FormData();

                formData.append("idcategoria", $("#categoria").val());
                formData.append("servicio", $("#servicio").val());
                formData.append("descripcion", $("#descripcion").val());
                formData.append("ubicacion", $("#ubicacion").val());
                formData.append("nivel", $("#nivel").val());
                formData.append("fotoportada", $("#input-foto-portada")[0].files[0]);

                if (datosNuevos){
                    //Nuevo
                    formData.append("operacion", "registrarServicio");
                }
                else{
                    //Actualizar
                    formData.append("operacion", "modificarServicio");
                    formData.append("idservicio", idservicio);
                }

                if(confirm("Estas seguro de plublicar el servicio")){
                    $("#modal-servicios").modal("hide");
                    registrarOActualizarServicio(formData);
                }
        });

        function registrarOActualizarServicio(formData){
            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function (e){
                    //console.log(e);
                    if(e == ""){
                        listarServicios();
                    }     
                }
            });
        }

        //Modificar un Servicio
        $("#card-servicios").on("click", ".btn-editar", function(){

            //capturamos el idservicio
            idservicio = $(this).attr("data-codigo");
            //servicio = $(this).attr("data-nombreservicio");

            // Mostrar titulo del servicio
            $("#titulo-servicio-registro").html("Actualizar Servicio");

            //Reseamos formularios
            $("#formulario-servicios")[0].reset();
            //$("#formulario-img-insert")[0].reset();
            //$(".file-image-portada").hide();

            //Array asociativo
            var datos = {
                'operacion' : 'oneDataServicio',
                'idservicio': idservicio
            };

            //Enviar la consula al controller
            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    
                    if(e != ""){

                        // Datos que probienen en el objeto e
                        var datosE = JSON.parse(e);
    
                        console.log(datosE);
    
                        datosNuevos = false;
                        //Asignamos valores a sus etiquetas, obtenidos de JSON
                        $("#categoria").val(datosE.idcategoria);
                        $("#servicio").val(datosE.servicio);
                        $("#descripcion").val(datosE.descripcion);
                        $("#ubicacion").val(datosE.ubicacion);
                        $("#nivel").val(datosE.nivel);
    
                        //Actualizar
                        servicio = "";
    
                        $("#btn-guardar-servicio").removeClass("btn-primary").addClass("btn-info")
                        .html("Actualizar");
                        $("#modal-servicios").modal('show');
                    }
                }
            });
        });    

        //Modificar una imagen
        $("#card-servicios").on("click", ".btn-update-img", function(){

            //capturamos el idservicio, nombre y fotoperfil
            idservicio = $(this).attr("data-codigo");
            serviciotmp = $(this).attr("data-name");
            imagenportadatmp = $(this).attr("data-img");

            //Resetear valores
            $("#nombre-imagen").html("Elijá una imagen");
            $("#imagen-portada").attr('src', '#');
            $("#formulario-img")[0].reset();

            // Selector de la etiqueta img
            let idimg = $("#img-servicio");

            // Abrir modal de imagen (Con la imagen que se indique)
            // Comprobar si ya existe una imagen
            if (imagenportadatmp == "" || imagenportadatmp == null){
                
                // Mostrar imagen por defecto del sistema
                mostrarImagenPrevia(idimg, 'image-portada-default.png');
                $("#nombre-imagen").html("Elija una imagen");
                $("#nombre-servicio").html(serviciotmp);
            }
            else{
                // Mostrar imagen actual
                mostrarImagenPrevia(idimg, imagenportadatmp);
                $("#nombre-imagen").html("Elija una imagen");
                $("#nombre-servicio").html(serviciotmp);
            }

            var datos = {
                'operacion' : 'oneDataServicio',
                'idservicio' : idservicio
            };

            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    // Datos que probienen en el objeto e
                    var json = JSON.parse(e);
                    //console.log(json.idcategoria);

                    // Obteniendo los datos del registro actual
                    // Asignando valores a las variables de acceso global, obtenido del JSON
                    idcategoriatmp = json.idcategoria;
                    idproveedor = json.idproveedor;
                    serviciotmp = json.servicio;
                    descripcion = json.descripcion;
                    ubicacion   = json.ubicacion;
                    nivel = json.nivel;
                    fotoportada = json.fotoportada;

                    // Mostrar modal
                    $("#modal-actualizar-img").modal('show');
                }
            });

        });

        //Eliminar un servicio
        $("#card-servicios").on("click", ".btn-eliminar", function(){

            idservicio = $(this).attr("data-codigo");

            if(confirm("¡Estas seguro de eliminar este servicio?")){
                $.ajax({
                    url: 'controllers/CServicio.php',
                    type: 'GET',
                    data: 'operacion=eliminarServicio&idservicio=' + idservicio,
                    success: function (e){
                        if(e == ""){
                            listarServicios();
                        }
                    }
                });
            }
        });

        //Listar contacto de servicio
        $("#card-servicios").on("click", ".btnContactoListar", function(){

            let idproveedor = $(this).attr('data-idcode');
            console.log(idcontacto);
            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: 'operacion=oneDataContacto&idproveedor=' + idproveedor,
                success: function (e){

                    console.log(e);
                    if(e != ""){
                        var datos = JSON.parse(e);
                        datosNuevos = false;

                        $("#txtCelular").val(datos.celular);
                        $("#txtTelefono").val(datos.telefono);
                        $("#txtEmail").val(datos.email);

                        $("#modal-contacto").modal('show');
                    }
                }
            });
        });

        //Comentarios
        $("#card-servicios").on("click", ".btn-comentario", function(){
            
            // Mostrar modal
            $("#modal-comentarios").modal('show');
        });

        //"X" que elimina la imagen previa
        $("#eliminar-imagen-portada").click(function (){

            //Resetea el formulario
            $("#formulario-img")[0].reset();

            //Mostrar imagen
            if(fotoportada == "" || fotoportada == null){
                $("#img-servicio").attr('src', 'dist/img/image-portada-default.png');
            }
            else{
                $("#img-servicio").attr('src', 'dist/img/' + imagenportadatmp);
            }

            //Ocultar efecto haver
            $(".hover-imagen").addClass('d-none');
        });

        // Evento click del botón - seleccionar imagen (ACTUALIZAR)
        $("#btn-subir-img-servicio").click(function (){
            $("#imagen-portada").click();
        });

        //Modificar imagen de un servicio
        function modificarFotoPortada(){

            //Obtenemos la foto
            fotoportada = $("#imagen-portada")[0].files[0];

            //Validar si existe foto definida
            if(fotoportada == undefined){
                alert("No definio una imagen nueva");
            }
            else{
                // Validar descripción null (Operador ternario)
                descripcion = descripcion == null ? "": descripcion;
                ubicacion = ubicacion == null ? "": ubicacion;
                nivel = nivel == null ? "": nivel;

                //Objeto FormData
                var formData = new FormData();

                formData.append("operacion", "modificarServicio");
                formData.append("idservicio", idservicio);
                formData.append("idproveedor", idproveedor);
                formData.append("idcategoria", idcategoriatmp);
                formData.append("servicio", serviciotmp);
                formData.append("descripcion", descripcion);
                formData.append("ubicacion", ubicacion);
                formData.append("nivel", nivel);
                formData.append("fotoportada", fotoportada);

                if(confirm("¿Estas seguro de modificar la foto de portada?")){

                    $.ajax({
                        url: 'controllers/CServicio.php',
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function (e){
                            // Resetear variables
                            console.log(e);
                            idservicio = -1;
                            idproveedor = -1;
                            idcategoria = "";                                
                            idcategoriatmp = "";                                
                            servicio = "";
                            serviciotmp = "";
                            descripcion = "";
                            fotoportada = "";
                            ubicacion = "";
                            nivel = "";
                            
                            // Resetear el formulario
                            $("#formulario-img")[0].reset();

                            // Cerrar modal y mostrar aviso
                            $("#modal-actualizar-img").modal('hide');
                            listarServicios();
                            alert("Foto de portada actualizada correctamente");
                        }

                    });
                }

            }
        }
    
        //Obtener el Id de un servicio
        $("#card-servicios").on( "click", ".control-img", function (){

            var idservicio = $(this).attr('data-idservicio');
            var datos = {
                'operacion'  : 'oneDataServicio',
                'idservicio' : $(this).val()
            };
            console.log(idservicio);

            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    console.log(e);
                    //Renderizar etiquetas que vienen desde controllers
                    window.location.href = "main.php?view=detalle-servicio-vista";
                    localStorage.setItem("idservicio", "capidservicio"),
                    
                    localStorage.removeItem("capidservicio")
                }
            });
        });

        //Obtenemos los datos de un proveedor para poder hacer un comentario
        $("#card-servicio").on("click", ".actualizarcoment", function(){
            //Capturamos el ID
            idproveedor = $(this).attr('data-idproveedor');
            console.log(idproveedor);
            $.ajax({
                url: 'controllers/CComentario.php',
                type: 'GET',
                data: 'operacion=obtenerOneDataProveedor&idproveedor=' + idproveedor,
                success: function (e){
                    
                    var datos = JSON.parse(e);
                    console.log(datos);
                    
                }
            })
        });

        //Registrar(Publicar) un comentario
        $("#btnComentarRegis").click(function(){

            comentario = $('#areaComent').val();
            puntuacion = $('#txtpuntuacion').val();

            if(comentario == "" || puntuacion == ""){
                alert("Por favor, complete los campos requeridos");
            }
            else{
                if(confirm("¿Estas seguro de comentar?")){

                    var datos = {
                        'operacion'     : 'registrarComentario',
                        'idproveedor'   : idproveedor,
                        'comentario'    : comentario,
                        'puntuacion'    : puntuacion
                    }

                    $.ajax({
                        url: 'controllers/CComentario.php',
                        type: 'GET',
                        data: datos,
                        success: function(e){
                            console.log(e);
                            alert("Se publico tu comentario correctamente");
                        }
                    });
                }
            }
        });

        // Evento click, para guardar la nueva imagen
        $("#guardar-imagen").click(modificarFotoPortada);

        listarServicios();
        listarCategoriasModal();
        
    });
</script>