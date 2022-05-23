<?php
session_start();
?>

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
<hr>

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
        <div class="col-md-6">
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
        <div class="col-md-6">
            <div class="inputs">
                <label>Hora de Inicio</label>
                <input class="form-control form-control-border" type="time"  id="txtHorainicio">
            </div>
        </div>
        <div class="col-md-6">
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
        <div class="col-md-6">
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
        <div class="col-md-6">
            <div class="inputs">
                <label>Hora de Inicio</label>
                <input class="form-control form-control-border" type="time"  id="txtHorainicioMod">
            </div>
        </div>
        <div class="col-md-6">
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

<!--  AQUI CARGAREMOS EL HORARIO TRAIDO DEL CONTROLLER -->
<div class="">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalHorarioRegis">
        Registrar Horario <i class="nav-icon fas fa-calendar-plus"></i>
    </button>
    <button type="button" class="btn btn-warning" id="btnModificarHorario" data-toggle="modal" data-target="#ModalHorarioModifi">
        Modificar Horario <i class="nav-icon fas fa-edit"></i>
    </button>
    <br>
    <h3 align="center">Mi Horario de Servicio</h3>
</div>

<!-- TABLA DE HORARIOS del proveedor -->
<div class="table-responsive-sm">
  <table border="1" class="table">
      <thead>
          <tr class="bg-success">
              <th scope="col">Dias Lavorables</th>
              <th scope="col">Hora de Inicio</th>
              <th scope="col">Hora Termino</th>
          </tr>
      </thead>
    <tbody>
      <tr>
          <td align="center"><input type="text" id="txtListDias" style="border: none; background: transparent; width: 100%;" disabled> </td>
          <td align="center"> <input type="text" id="txtListHoraIni" style="border: none; background: transparent; width: 100%;" disabled></td>
          <td align="center"><input type="text" id="txtListHoraFin" style="border: none; background: transparent; width: 100%;" disabled></td>
      </tr>
    </tbody>
  </table>
</div>
<br>

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
        <div class="col-md-6">
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
        <div class="col-md-6">
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
<hr>

<!-- Boton para agregar contacto -->
<button type="button" class="btn btn-primary" id="" data-toggle="modal" data-target="#ModalRegisContac">
    Añadir Contacto <i class="nav-icon fas fa-address-book"></i>
</button>


<!-- TABLA PARA LISTAR CONTACTO-->
<h3 align="center">Mis contactos</h3>
<div class="table-responsive-sm">
  <table border="1" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Celular</th>
        <th scope="col">Teléfono</th>
        <th scope="col">E-mail</th>
        <th scope="col">Operación</th>
        
      </tr>
    </thead>
    <tbody id="tab_contac">
        <!-- SE CARGARAN DE FORMA ASINCRONA -->
    </tbody>
  </table>
</div>
<br>

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
        <div class="col-md-6">
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
        <div class="col-md-6">
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
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModRedSocial">Guardar</button>
      </div>
    </div>
  </div>
</div>
<hr>

<!-- Boton para agregar red social -->
<button type="button" class="btn btn-primary" id="" data-toggle="modal" data-target="#ModalRegisRedSocial">
        Añadir red Social <i class="nav-icon fas fa-edit"></i>
</button>


<!-- Titulo de tabla -->
<h3 align="center">Mis redes sociales</h3>

<!-- TABLA DE REDES SOCIALES-->
<div class="table-responsive-sm">
  <table border="1" class="table">
    <thead class="bg-info">
      <tr>
        <th scope="col">Redes Sociales</th>
        <th>Cuenta</th>
        <th>Link</th>
        <th>Operación</th>
      </tr>
    </thead>
    <tbody id="tab_redes">
        <!-- SE CARGARAN DE FORMA ASINCRONA -->
    </tbody>
  </table>
</div>
<br>
<hr>


<h4 align="center">MIS SERVICIOS</h4>

<!-- Contenido de los cards -Servicios -->
<div class="group-cards" id="card-one-servicios">
    <!-- Cards servicios cargados de manera asincrona - ajax -->
</div>

<script>
    $(document).ready(function(){
        
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
                data : 'operacion=listarProveedores',
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
                }
            });
        }

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
                data : 'operacion=listarHorario',
                success : function(e) {
                    //Convertimos a JSON
                    var datosHora = JSON.parse(e);
                    //console.log(datosHora);

                    //Mostramos en el view tabla
                    $("#txtListDias").val(datosHora.dialaborable);
                    $("#txtListHoraIni").val(datosHora.horainicio);
                    $("#txtListHoraFin").val(datosHora.horafinal);

                    //Mostramos en el ModalHorarioModifi
                    $("#txtDialaborableMod").val(datosHora.dialaborable);
                    $("#txtHorainicioMod").val(datosHora.horainicio);
                    $("#txtHorafinalMod").val(datosHora.horafinal);
                }
            });
        }

        //Modificar
        function modificarHorario(){

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

            $.ajax({
                url: 'controllers/CHorario.php',
                type: 'GET',
                data: datos,
                success: function(e){
                    console.log(e);

                    //Confirma
                    if(confirm("¿Estas seguro que desea modificar el horario?")){
                      listarHorario()
                        alert("Se modifico correctamente");

                        var datosServer = JSON.parse(e);

                        //Asignar
                        $("#txtDialaborableMod").val(datosServer.dialaborable);
                        $("#txtHorainicioMod").val(datosServer.horainicio);
                        $("#txtHorafinalMod").val(datosServer.horafinal);
                    }
                }
            });
        }

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
            data: 'operacion=listarRedessociales',
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
            data: 'operacion=listarContacto',
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
            data: 'operacion=oneDataServicioProveedor',
            success: function(e){
              $("#card-one-servicios").html(e);
            }
          });
        }

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

          $.ajax({
            url: 'controllers/CContacto.php',
            type: 'GET',
            data: datos,
            success: function(e){
              console.log(e);
              if(confirm("¿Estas seguro de modificar tu contacto?")){

                var datosServer = JSON.parse(e);

                $("#txtModCelular").val(datosServer.celular);
                $("#txtModTelefono").val(datosServer.telefono);
                $("#txtModCorreo").val(datosServer.email);

                listarContacto();
                alert("Se a modificado Correctamente");
              }
            }
          });

        });

        //Modifica los datos del proveedor
        $('#btnGuardarCambioProveedor').click(modificarProveedor);

        //Modifica los datos del horario
        $('#btnGuardarCambioHorario').click(modificarHorario);

        //Registrar horario
        $('#btnGuardarHorario').click(registrarHorario);

        //Boton que registra
        $('#btnRegisRed').click(registrarRedSocial);

        //Boton activa la funcion registrarContactos
        $('#btnRegisContac').click(registrarContactos);

        //Listares
        listarServicioOneData()
        listarContacto();
        listarTipoRedSocialModal();
        listarProveedor();
        listarHorario();
        listarRedSocial();

    });
</script>