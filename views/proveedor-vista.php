<?php
session_start();
?>

<!-- AQUI VA LOS DATOS DEL PROVEEDOR -->
<div class="">
    <div class="card text-center">
      <div class="d-flex flex-row">
        <img src="dist/img/protadawork.jpg" class="img-fluid" width="100%" style="height: 350px; border-radius:0 0 0.5rem 0.5rem;" alt="...">
      </div>
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
          src="dist/img/logo1.jpeg"
          alt="Perfil de usuario">
      </div>
        <h3 class="profile-username text-center" ><input class="form-control form-control-border profile-username text-center" type="text" id="portadaNombres"></h3>
        <!-- <p class="text-muted text-center">Software Engineer</p> -->
    </div>
</div> 
<hr>


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Horario</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Contactos</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Redes sociales</a>
    <a class="nav-link" id="nav-perfil-tab" data-toggle="tab" href="#nav-perfil" role="tab" aria-controls="nav-perfil" aria-selected="false">Editar Perfil</a>
    <a class="nav-link" id="nav-calificar-tab" data-toggle="tab" href="#nav-calificar" role="tab" aria-controls="nav-calificar" aria-selected="false">Calificar Proveedor</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <!-- Muestra la tabla de horarios -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <br>
    <button class='btn btn-sm btn-primary' data-toggle='modal' data-target='#ModalHorarioRegis'>Registrar Horario <i class='nav-icon fas fa-calendar-plus'></i></button>
    <button class='btn btn-sm btn-warning' id='btnModificarHorario' data-toggle='modal' data-target='#ModalHorarioModifi'><i class='nav-icon fas fa-edit'></i></button>
    <h3 align="center">Mi Horario de Servicio</h3>

    <!-- TABLA DE HORARIOS del proveedor -->
    <!-- /.col -->
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Días laborables</th>
                <th>Hora inicio</th>
                <th>Hora final</th>
              </tr>
            </thead>
            <tbody id="tab_horario">
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <br>

  </div>
  <!-- Muestra la tabla de Contactos -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <!-- Boton para agregar contacto -->
    <br>
    <button type="button" class="btn btn-primary" id="" data-toggle="modal" data-target="#ModalRegisContac">
        Añadir Contacto <i class="nav-icon fas fa-address-book"></i>
    </button> 

    <!-- TABLA PARA LISTAR CONTACTO-->
    <h3 align="center">Mis contactos</h3>
    <!-- /.col -->
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Celular</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Operación</th>
              </tr>
            </thead>
            <tbody id="tab_contac">
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <br>
    
  </div>
  <!-- Muestra la tabla de redes sociales -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <!-- Boton para agregar red social -->
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegisRedSocial">
        Añadir red Social <i class="nav-icon fas fa-edit"></i>
    </button> 
    <!-- Titulo de tabla -->
    <h3 align="center">Mis redes sociales</h3>

    <!-- TABLA DE REDES SOCIALES-->
    <!-- /.col -->
    <div class="col-md-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table">
            <thead>
              <tr>
                <th>Red Social</th>
                <th>Cuenta</th>
                <th>Acceso directo</th>
                <th>Operación</th>
              </tr>
            </thead>
            <tbody id="tab_redes">
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    
  </div>
  <!-- Editar Perfil -->
  <div class="tab-pane fade" id="nav-perfil" role="tabpanel" aria-labelledby="nav-perfil-tab">
    <!-- AQUI VA LOS DATOS DEL PROVEEDOR -->
    <div class="container mt-3">
        <div class="card p-3 text-center">
            <div class="d-flex flex-row justify-content-center mb-3">
                <input id="img" type="file" />
                <hr>
                <div id="preview"></div>
            </div>
            <h4>Editar Perfil</h4><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="inputs">
                        <label>Distrito</label> 
                        <input class="form-control form-control-border" type="text" placeholder="Distrito" id="profDistrito" value="<?php echo $_SESSION['nombredistrito']; ?>" disabled="disabled">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputs"> 
                        <label>Nombres</label> 
                        <input class="form-control form-control-border" type="text" placeholder="Nombres" id="profNombres" >  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputs"> 
                        <label>Apellidos</label> 
                        <input class="form-control form-control-border" type="text" placeholder="Apellidos" id="profApellidos" >  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputs"> 
                        <label>Fecha de Nacimiento</label> 
                        <input class="form-control form-control-border" type="date" id="profNacimiento"  > 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputs"> 
                        <label>Teléfono</label> 
                        <input class="form-control form-control-border" type="tel" placeholder="Teléfono" id="profTelefono" maxlength="9"> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inputs"> 
                        <label>Correo</label> 
                        <input class="form-control form-control-border" type="mail" placeholder="Correo" id="profCorreo" > 
                    </div>
                </div>
            </div>
            <div class="mt-3 gap-2 d-flex justify-content-end">
                <button class="px-3 btn btn-sm btn-primary" id="btnGuardarCambioProveedor">Guardar Cambios</button> 
            </div>
            <div class="mt-3 gap-2 d-flex justify-content-end">
                <button class="btn btn-sm btn-danger" id="btnEliminar">Eliminar Cuenta</button> 
            </div>
        </div>
    </div>
  </div>
  <!-- Comentarios para proveedor -->
  <div class="tab-pane fade" id="nav-calificar" role="tabpanel" aria-labelledby="nav-calificar-tab">
    <br>
    <button class="btn btn-md btn-primary">Comentar</button>
    <hr>
    <div class="row" style="aling-items: center; justify-content: center;">
    <div class="col-md-6" >
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <!-- Nombre de usuario -->
                <div class="user-block">
                  <img class="img-circle" src="dist/img/0305202271301.png" alt="User Image">
                  <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                  <span class="description">Shared publicly - 7:30 PM Today</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                    
                  <!-- <img class="img-circle img-sm" src="dist/img/0305202271301.png" alt="User Image"> -->
                  <!-- Usuario comenta -->
                  <div class="comment-text" id="tabComent">
                      <!-- Cargaran de forma asincrona -->
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="#" method="post">
                  <!-- Aqui el usuario comenta -->
                  <div class="img-push">
                    <div style='display:flex;'>
                      <input type="text" class="form-control form-control-sm" placeholder="Escribe un comentario">
                      <button class='btn btn-sm btn-primary' id='btnComentarRegis'><i class='nav-icon fas fa-paper-plane'></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
    </div>
  </div>
</div>


<!-- MODAL PARA AÑADIR HORARIO -->
<div class="modal fade" id="ModalHorarioRegis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Horario de Servio Disponible</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="inputs">
                <label>Dias Laborable</label>
                <div class="input-group mb-3">
                  <select class="custom-select" id="txtDialaborable">
                    <option>Lunes - Viernes</option>
                    <option>Lunes - Sabado</option>
                    <option>Todos los Días</option>
                    <option>Sabados - Domingos</option>
                    <option>Interdiario</option>
                  </select>
                </div>
            </div>
        </div>
        <h4>Las horas son formatos 24h</h4>
        <div class="col-md-12">
            <div class="inputs">
                <label>Hora de Inicio</label>
                <input class="form-control form-control-border" type="time"  id="txtHorainicio">
            </div>
        </div>
        <div class="col-md-12">
            <div class="inputs">
                <label>Hora de termino</label>
                <input class="form-control form-control-border" type="time" id="txtHorafinal">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnGuardarHorario">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA MODIFICAR HORARIO -->
<div class="modal fade" id="ModalHorarioModifi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Horario de Servio Disponible</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="inputs">
                <label>Dias Laborable</label>
                <div class="input-group mb-3">
                  <select class="custom-select" id="txtDialaborableMod">
                    <option>Lunes - Viernes</option>
                    <option>Lunes - Sabado</option>
                    <option>Todos los Días</option>
                    <option>Sabados - Domingos</option>
                    <option>Interdiario</option>
                  </select>
                </div>
            </div>
        </div>
        <h4>Las horas son formatos 24h</h4>
        <div class="col-md-12">
            <div class="inputs">
                <label>Hora de Inicio</label>
                <input class="form-control form-control-border" type="time"  id="txtHorainicioMod">
            </div>
        </div>
        <div class="col-md-12">
            <div class="inputs">
                <label>Hora de termino</label>
                <input class="form-control form-control-border" type="time" id="txtHorafinalMod">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnGuardarCambioHorario">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA AÑADIR CONTACTO -->
<div class="modal fade" id="ModalRegisContac" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Horario de Servio Disponible</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <h2>Registre sus Contactos</h2>
            <div class="inputs">
                <label>Celular</label>
                <input class="form-control form-control-border" type="tel" placeholder="Celular" id="txtRegCelular" maxlength="9">
            </div>
            <div class="inputs">
                <label>Telefono</label>
                <input class="form-control form-control-border" type="tel" placeholder="Teléfono(opcional)" id="txtRegTelefono" maxlength="9">
            </div>
        </div>
        <div class="inputs">
          <label>Correo</label>
          <input class="form-control form-control-border" type="mail" placeholder="Correo(Opcional)" id="txtRegCorreo" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnRegisContac">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA MODIFICAR CONTACTO -->
<div class="modal fade" id="ModalModContac" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Horario de Servio Disponible</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <h2>Modificar Contactos</h2>
            <div class="inputs">
                <label>Celular</label>
                <input class="form-control form-control-border" type="tel" placeholder="Celular" id="txtModCelular" maxlength="9">
            </div>
            <div class="inputs">
                <label>Telefono</label>
                <input class="form-control form-control-border" type="tel" placeholder="Teléfono(opcional)" id="txtModTelefono" maxlength="9">
            </div>
        </div>
        <div class="inputs">
          <label>Correo</label>
          <input class="form-control form-control-border" type="mail" placeholder="Correo(Opcional)" id="txtModCorreo" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModOneContac">Guardar Cambio <i class="nav-icon fas fa-save"></i></button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA AÑADIR RED SOCIAL -->
<div class="modal fade" id="ModalRegisRedSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Redes sociales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="inputs">
                <select class="custom-select form-control form-control-border" placeholder="Red Social" id="txtRegisRed" autofocus="true">
                    <!-- Aqui se cargara de manera asincronica -->
                </select>
            </div>
            <div class="inputs">
              <label for="">Nombre de la Cuenta</label>
              <input class="form-control form-control-border" type="text" placeholder="Escriba el nonbre de la cuenta o numero" id="txtRegNombreCuenta">
            </div>
            <div class="inputs">
              <label for="">Link Directo</label>
              <input class="form-control form-control-border" type="text" placeholder="Ingrese su link (opcional)" id="txtRegLink">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnRegisRed">Guardar</button>
      </div>
    </div>
  </div>
</div>
<hr>

<!-- MODAL PARA Modificar RED SOCIAL -->
<div class="modal fade" id="ModalModModSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar tu red social</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="inputs">
                <select class="custom-select form-control form-control-border" placeholder="Red Social" id="txtModtipoRed" autofocus="true">
                    <!-- Aqui se cargara de manera asincronica -->
                </select>
            </div>
            <div class="inputs">
              <label for="">Nombre de la Cuenta</label>
              <input class="form-control form-control-border" type="text" placeholder="Escriba el nonbre de la cuenta o numero" id="txtModNombreCuenta">
            </div>
            <div class="inputs">
              <label for="">Link Directo</label>
              <input class="form-control form-control-border" type="text" placeholder="Ingrese su link (opcional)" id="txtModLink">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModRedSocial">Guardar Cambio</button>
      </div>
    </div>
  </div>
</div>

<h4 align="center">MIS SERVICIOS</h4>

<!-- Contenido de los cards -Servicios -->
<div class="group-cards" id="card-one-servicios">
    <!-- Cards servicios cargados de manera asincrona - ajax -->
</div>

<script>
    $(document).ready(function(){

      //Recibo al proveedor que envio desde la vista servicios

      var ObetenerID = localStorage.getItem("ObtenerID");
      //console.log(ObetenerID);

      if(ObetenerID == null){
        ObetenerID = -1;
      }
        
        var idproveedor = "";
        var nombres = "";
        var apellidos = "";
        var fechanac = "";
        var telefono = "";
        var correo = "";
        var fotoperfil = "";

        var idcontacto = "";
        var celular = "";
        var telefono = "";
        var email = "";

        var redsocial = "";
        var nombrecuenta  = "";
        var link = "";

        var idtiporedsocial = "";
        var idredsocial = "";
        var datosNuevos = true;


        /**CRUD DE PROVEEDORES */
        function listarProveedor(){
            //Enviando la consulta al controlador
            $.ajax({
                url : 'controllers/CProveedor.php',
                type : 'GET',
                data : 'operacion=listarProveedores&idproveedor=' + ObetenerID, //Le mando el ID
                success : function(e){

                    // Convertir a JSON
                    var datos = JSON.parse(e);
                    //console.log(datos);

                    //Mostrando en el view
                    $("#profNombres").val(datos.nombres);
                    $("#profApellidos").val(datos.apellidos);
                    $("#profNacimiento").val(datos.fechanac);
                    $("#profTelefono").val(datos.telefono);
                    $("#profCorreo").val(datos.correo);

                    //Mostrar en protada de perfil
                    $("#portadaNombres").val(datos.nombres);
                    
                }
            });
        }

        //Modificar proveedor
        function modificarProveedor(){

            nombres = $('#profNombres').val();
            apellidos = $('#profApellidos').val();
            fechanac = $('#profNacimiento').val();
            telefono = $('#profTelefono').val();
            correo = $('#profCorreo').val();

            //Enviamos la operacion en un array
            var datos = {
                'operacion'     : 'modificarProveedor',
                'idproveedor'   : idproveedor,
                'nombres'       : nombres,
                'apellidos'     : apellidos,
                'fechanac'      : fechanac,
                'telefono'      : telefono,
                'correo'        : correo
            };

            $.ajax({
                url: 'controllers/CProveedor.php',
                type: 'GET',
                data: datos,
                success: function(e){
                    //console.log(e);

                    //Confirma
                    if(confirm("¿Estas seguro que desea modificar?")){
                        alert("Se modifico correctamente");

                        var datosServer = JSON.parse(e);

                        //Asignar
                        $("#profNombres").val(datosServer.nombres);
                        $("#profApellidos").val(datosServer.apellidos);
                        $("#profNacimiento").val(datosServer.fechanac);
                        $("#profTelefono").val(datosServer.telefono);
                        $("#profCorreo").val(datosServer.correo);
                    }
                }
            });
        }

        /**CRUD DE HORARIO */
        function registrarHorario(){
            
            //validamos los campos
            let dialaborable = $('#txtDialaborable').val();
            let horainicio = $('#txtHorainicio').val();
            let horafinal = $('#txtHorafinal').val();

            if (dialaborable == "" || horainicio == "" || horafinal == "") {
                alert(" Por favor complete los campos requeridos");
            }else {
                // Creamos un array asosciativo
                var datos = {
                    'operacion'    : 'registrarHorario',
                    'dialaborable' : dialaborable,
                    'horainicio'   : horainicio,
                    'horafinal'    : horafinal
                };

                $.ajax({
                    url : 'controllers/CHorario.php',
                    type : 'GET',
                    data : datos,
                    success: function(e) {
                        //console.log(e);
                        if(confirm("¿Estas seguro que registrar horario?")){
                            alert ('El Horario se guardo correctamente');
                            location.reload()
                        }    
                    }
                });
            }
        }

        //Listar
        function listarHorario(){

            $.ajax({
                url : 'controllers/CHorario.php',
                type : 'GET',
                data : 'operacion=listarHorario&idproveedor=' + ObetenerID,
                success : function(e) {
                  //Renderizar las etiquetas que vienen desde el controllers
                  $("#tab_horario").html(e);
                }
            });
        }

        //Capturar id de horario
        $("#tab_horario").on("click", "#btnModificarHorario", function(){

          idhorario = $(this).attr("data-idhorario");
          console.log(idhorario);

          $.ajax({
            url: 'controllers/CHorario.php',
            type: 'GET',
            data: 'operacion=listarOneDataHorario&idhorario=' + idhorario,
            success: function(e){
              console.log(e);

              if(e != ""){
                var data = JSON.parse(e);
              
                datosNuevos = false;
              
                $("#txtDialaborableMod").val(data.dialaborable);
                $("#txtHorainicioMod").val(data.horainicio);
                $("#txtHorafinalMod").val(data.horafinal);
              
                $("#ModalHorarioModifi").modal("show");
              }
            }
          });
        });

        //Modificar
        $("#btnGuardarCambioHorario").click(function (){

          //validamos los campos
          let dialaborable = $('#txtDialaborableMod').val();
          let horainicio = $('#txtHorainicioMod').val();
          let horafinal = $('#txtHorafinalMod').val();

          //Enviamos la operacion en un array
          var datos = {
              'operacion'    : 'modificarHorario',
              'dialaborable' : dialaborable,
              'horainicio'   : horainicio,
              'horafinal'    : horafinal
          };

          //Confirma
          if(confirm("¿Estas seguro que desea modificar el horario?")){
            $.ajax({
                url: 'controllers/CHorario.php',
                type: 'GET',
                data: datos,
                success: function(e){
                    console.log(e);

                      listarHorario();
                      alert("Se modifico correctamente");
                }
            });
          }
        });
        
        /**CRUD DE REDES TIPO RED SOCIAL */
        function listarTipoRedSocialModal(){
          $.ajax({
                url: 'controllers/CTiporedsocial.php',
                type: 'GET',
                data: 'operacion=listarTiporedsocialModal',
                success: function (e){
                    //console.log(e);
                    $("#txtRegisRed").html(e);
                    $("#txtModtipoRed").html(e);
                    
                }
            });
        }

        /**CRUD DE RED SOCIAL */
        function registrarRedSocial(){

          let tiporedsocial = $("#txtRegisRed").val();
          let nombrecuenta = $("#txtRegNombreCuenta").val();
          let link = $("#txtRegLink").val();

          if(tiporedsocial == "" || nombrecuenta == ""){
            alert("Por favor, ingrese una red social para continuar");
          }
          else{
            if(confirm("¿Estas seguro que desea agregar esta red social?")){

              var datos = {
                'operacion'       : 'registrarRedSocial',
                'idtiporedsocial' : tiporedsocial,
                'nombrecuenta'    : nombrecuenta,
                'link'            : link
              };

              $.ajax({
                url: 'controllers/CRedsocial.php',
                type: 'GET',
                data: datos,
                success: function (e){
                  console.log(e);
                  alert("Se ha registrado correctamente");
                  listarRedSocial();
                }
              });
            }
          }

        }

        //Lista Red individual por proveedor
        function listarRedSocial(){
          //Enviar los datos por ajax
          $.ajax({
            url: 'controllers/CRedsocial.php',
            type: 'GET',
            data: 'operacion=listarRedessociales&idproveedor=' + ObetenerID,
            success: function (e){
              //Renderizar las etiquetas que vienen desde el controllers
              $("#tab_redes").html(e);
            }
          });
        }

        //Eliminar una red social
        $("#tab_redes").on("click", ".btnEliminarRedSocial", function(){
          //Capturamos el id
          idredsocial = $(this).attr("data-idredsocial");
          
          var datos = {
            'operacion'   : 'eliminarRedSocial',
            'idredsocial' : idredsocial
          };

          if(confirm("¿Estas seguro de eliminar esta red social?")){

            $.ajax({
              url: 'controllers/CRedsocial.php',
              type: 'GET',
              data: datos,
              success: function(e){
                console.log(e);
                if(e == ""){
                  listarRedSocial();
                  alert("Se elimino correctamente");
                  
                }
              }
            });
          }
        })

        //Modificar red social
        $("#tab_redes").on("click", ".btnEditarRedSocial", function(){

          idredsocial = $(this).attr("data-idredsocial");
          console.log(idredsocial);

          $.ajax({
            url: 'controllers/CRedsocial.php',
            type: 'GET',
            data: 'operacion=listarOneRedessociales&idredsocial=' + idredsocial,
            success: function(e){
              console.log(e);
              
              if(e != ""){
                var data = JSON.parse(e);

                datosNuevos = false;

                $("#txtModtipoRed").val(data.idtiporedsocial);
                $("#txtModNombreCuenta").val(data.nombrecuenta);
                $("#txtModLink").val(data.link);

                $("#ModalModModSocial").modal("show");
              }
            }
          });
        });

        //Modificar contactos
        $("#btnModRedSocial").click(function(){

          redsocial = $("#txtModtipoRed").val();
          nombrecuenta = $("#txtModNombreCuenta").val();
          link = $("#txtModLink").val();

          var datos = {
            'operacion'     : 'modificarRedessociales',
            'idredsocial'   : idredsocial,
            'idtiporedsocial' : redsocial,
            'nombrecuenta'  : nombrecuenta,
            'link'          : link
          };

          if(confirm("¿Estas seguro de modificar esta red social?")){

            $.ajax({
              url: 'controllers/CRedsocial.php',
              type: 'GET',
              data: datos,
              success: function(e){
                console.log(e);

                listarRedSocial();
                alert("Se a modificado Correctamente");
              }
            
            });
          }
        });

        /**CRUD DE CONTACTOS */
        function registrarContactos(){  

          let celular = $("#txtRegCelular").val();
          let telefono = $("#txtRegTelefono").val();
          let email = $("#txtRegCorreo").val();

          if(celular == ""){
            alert("Completa los campos obligatorios");
          }
          else{
            if(confirm("¿Estas seguro que deseas guardar el contacto?")){

              var datos = {
                'operacion' : 'registrarContacto',
                'celular'   : celular,
                'telefono'  : telefono,
                'email'     : email
              };

              $.ajax({
                url: 'controllers/CContacto.php',
                type: 'GET',
                data: datos,
                success: function(e){
                  console.log(e);
                  alert("Se ha registrado correctamente el contacto");
                }
              });
            }
          }
        }

        //Lista contacto individual por proveedor
        function listarContacto(){
          //Enviamos
          $.ajax({
            url: 'controllers/CContacto.php',
            type: 'GET',
            data: 'operacion=listarContacto&idproveedor=' + ObetenerID,
            success: function(e){
              //console.log(e);
              $("#tab_contac").html(e);
            }
          });
        }

        //Listar todos los servicio de cada proveedor
        function listarServicioOneData(){

          $.ajax({
            url: 'controllers/CServicio.php',
            type: 'GET',
            data: 'operacion=oneDataServicioProveedor&idproveedor=' + ObetenerID,
            success: function(e){
              $("#card-one-servicios").html(e);
            }
          });
        }

        //Eliminamos un contacto
        $("#tab_contac").on("click", ".btnDeleteContacto", function(){
          idcontacto = $(this).attr('data-idcontacto');

          var datos = {
            'operacion'   : 'eliminarContacto',
            'idcontacto'  : idcontacto
          };

          if(confirm("¿Estas seguro de eliminar este contacto?")){

            $.ajax({
              url: 'controllers/CContacto.php',
              type: 'GET',
              data: datos,
              success: function(e){
                console.log(e);
                if(e == ""){
                  listarContacto();
                  alert("Contacto Eliminado");
                }
              }
            });
          }
        });

        //Obtener un contacto
        $("#tab_contac").on("click", ".btnEditarContacto", function(){

          idcontacto = $(this).attr('data-idcontacto');
          $.ajax({
            url: 'controllers/CContacto.php',
            type: 'GET',
            data: 'operacion=listarUnDatoContacto&idcontacto=' + idcontacto,
            success: function(e){
              console.log(e);
              
              if(e != ""){
                var data = JSON.parse(e);

                datosNuevos = false;

                $("#txtModCelular").val(data.celular);
                $("#txtModTelefono").val(data.telefono);
                $("#txtModCorreo").val(data.email);

                $("#ModalModContac").modal("show");
              }
            }
          });
        });

        //Modificar contactos
        $("#ModalModContac").on("click", "#btnModOneContac", function(){

          celular = $("#txtModCelular").val();
          telefono = $("#txtModTelefono").val();
          email = $("#txtModCorreo").val();

          var datos = {
            'operacion' : 'modificarContacto',
            'idcontacto': idcontacto,
            'telefono'  : telefono,
            'celular'   : celular,
            'email'     : email
          };
          if(confirm("¿Estas seguro de modificar tu contacto?")){
            $.ajax({
              url: 'controllers/CContacto.php',
              type: 'GET',
              data: datos,
              success: function(e){
                console.log(e);
                
                  var datosServer = JSON.parse(e);

                  $("#txtModCelular").val(datosServer.celular);
                  $("#txtModTelefono").val(datosServer.telefono);
                  $("#txtModCorreo").val(datosServer.email);

                  listarContacto();
                  alert("Se a modificado Correctamente");
              }
            });
          }
        });

        //Modifica los datos del proveedor
        $('#btnGuardarCambioProveedor').click(modificarProveedor);

        //Modifica los datos del horario
        //$('#btnGuardarCambioHorario').click(modificarHorario);

        //Registrar horario
        $('#btnGuardarHorario').click(registrarHorario);

        //Boton que registra
        $('#btnRegisRed').click(registrarRedSocial);

        //Boton activa la funcion registrarContactos
        $('#btnRegisContac').click(registrarContactos);

        //Listar comentarios
        //Listar comentarios de los servicios de cada proveedor
        function listarComentario(){
          $.ajax({
              url  : 'controllers/CComentario.php',
              type : 'GET',
              data : 'operacion=listarComentarios$idproveedor=' + ObetenerID,
              success : function (e){
                  console.log(e);
                  //Renderizar las etiquetas que vienen
                  $("#tabComent").html(e);
              }
          });
        }

        //Eliminamos un contacto
        $("#tabComent").on("click", ".btnDeleteComentario", function(){
          idcomentario = $(this).attr('data-idcontacto');

          var datos = {
            'operacion'   : 'eliminarContacto',
            'idcontacto'  : idcontacto
          };

          if(confirm("¿Estas seguro de eliminar este contacto?")){

            $.ajax({
              url: 'controllers/CContacto.php',
              type: 'GET',
              data: datos,
              success: function(e){
                console.log(e);
                if(e == ""){
                  listarContacto();
                  alert("Contacto Eliminado");
                }
              }
            });
          }
        });

        //Listares
        listarComentario();
        listarServicioOneData()
        listarContacto();
        listarTipoRedSocialModal();
        listarProveedor();
        listarHorario();
        listarRedSocial();

    });
</script>