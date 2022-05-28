<?php
session_start();
?>

<!-- AQUI VA LOS DATOS DEL PROVEEDOR -->

<div class="card text-center" id="card-fotoperfil">
  <!-- Se cargara de forma asincrona -->
  
    <h3 class="profile-username text-center" ><input class="form-control form-control-border profile-username text-center" type="text" id="portadaNombres"></h3>
    <!-- <p class="text-muted text-center">Software Engineer</p> -->
</div>

<hr>


<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Horario</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Contactos</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Redes sociales</a>
    <a class="nav-link" id="nav-perfil-tab" data-toggle="tab" href="#nav-perfil" role="tab" aria-controls="nav-perfil" aria-selected="false">Editar Perfil</a>
   <a class="nav-link" id="nav-calificar-tab" data-toggle="tab" href="#nav-calificar" role="tab" aria-controls="nav-calificar" aria-selected="false">Comentarios a Proveedor</a>
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
    <div class="row" style="aling-items: center; justify-content: center;">
    <div class="col-md-8" >
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <!-- Nombre de usuario -->
                <div class="user-block">
                  <img class="img-circle" src="dist/img/logo1.jpeg" alt="User Image">
                  <span class="username"><b><input type="text" class="form-control form-control-border" id="NomProvComentan"></b></span>
                  
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
              <div class="card-body" id="tabComent">
                <div class="card-comment">
                  <!-- User image -->
                  <!-- <img class="img-circle img-sm" src="dist/img/0305202271301.png" alt="User Image"> -->
                  <!-- Usuario comenta -->
                  <div class="comment-text"> 
                      <b>Julio Smith</b>
                      <span class='text-muted float-right'> 25/04/2022 08:20:00
                        <button class='btn btn-sm btn-warning btnEditarComentario'>
                            <i class='nav-icon fas fa-edit'></i>
                        </button>
                            <button class='btn btn-sm btn-danger btnDeleteComentario'>
                        <i class='nav-icon fas fa-trash'></i>
                        </button>
                      </span>
                      <br>
                      Soy un comentario estatico
                      <p><b>Puntuación:</b> 5</p>
                      <hr>
                      <!-- Cargaran de forma asincrona -->
                  </div> 
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                <form action="#" method="post">
                <img class="img-fluid img-circle img-sm" src="dist/img/<?php echo $_SESSION['fotoperfil']?>" alt="Alt Text">
                  <div class="img-push">
                    <div style='display:flex;'>
                      <input type="text" class="form-control form-control-md" id="areaComent" placeholder="Escribe un comentario">
                      <button class="btn btn-sm btn-primary" id="btnComentarRegis"><i class="nav-icon fas fa-paper-plane"></i></button>
                    </div>
                  </div>
                  <div class="input-group">
                      <select class="custom-select form-control form-control-sm" style="margin-left: 548px;"id="txtpuntuacion">
                          <option value="">Puntuación</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                      </select>
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

<!-- Modal para modificar Comentarios -->
<div class="modal fade" id="ModalEditComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="ContEditComent">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Comentarios</label>
                        <input type="text" id='EditareaComent' class="form-control" id="agregar_nombre" name="agregar_nombre">
                        <!-- <textarea style='padding: 10px;' readonly="no" wrap="hard" id='EditareaComent' cols='50' rows='2'placeholder='Comente algo ....'> </textarea> -->
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control form-control-border" id="Edittxtpuntuacion">
                            <option value="">Puntuación</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" id="btnModiComent">Modificar</button>
            </div>
        </div>
    </div>
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
                <button type="button" id="btn-guardar-servicio" data-dismiss="modal" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Lo que se muesta en la cabezera -->
<div class="row content-header">
    <div class="col-xl-5 col-md-6 col-sm-12 form-group">
        <form class="form-inline">
            <div class="input-group">
                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-outline-success" id="btn-registrar-servicio" type="button" title="Registrar nuevo servicio" data-toggle="modal" data-target="#modal-servicios"><i class="fas fa-plus-square"></i> Nuevo Publicación</button>
                    <!-- <button class="btn btn-outline-primary" id="btn-aviso-registro" type="button" title="Registrar nuevo servicio" data-toggle="modal" data-target="#modal-iniciarsesion" style="margin-top: 1em">Ingresar</button> -->
                </div>
            </div>
        </form>
    </div>
</div>


<h4 align="center">MIS SERVICIOS</h4>

<!-- Contenido de los cards -Servicios -->
<div class="group-cards" id="card-one-servicios">
    <!-- Cards servicios cargados de manera asincrona - ajax -->
</div>

<!-- Modal para cambiar imagen del servicio -->
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

<!-- Modal para cambiar fotoperfil del proveedor-->
<div class="modal" id="modal-actualizar-fotoperfil" tabindex="-1">
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
          <form autocomplete="off" id="formulario-foto" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-12">
                    <!-- <label for="imagen-portada">Imagén de portada</label>  -->       
                    <div class="custom-file d-none">
                        <input type="file" class="custom-file-input form-control" accept=".jpg, .jpeg, .png" id="imagen-perfil" lang="es" placeholder="IMGE">
                        <label class="custom-file-label" for="imagenportada" id="nombre-foto">Elijá una nueva imagen</label>
                    </div>
                    <!-- Muestra la imagen previa -->
                    <div class="contenido-img-perfil">
                        <img src="dist/img/logo1.jpeg" id="img-perfil" width="400" height="200" class="imagen-responsivo">
                        
                        <div class="hover-imagen d-none">
                            <i class="fas fa-times" id="eliminar-imagen-portada" title="Eliminar imagen"></i>
                        </div>
                    </div>
                    <!-- Botón que ejecuta el input file -->
                    <button type="button" id="btn-subir-foto-perfil" class="btn mt-1 btn-block btn-outline-primary">
                        <i class="fas fa-camera-retro"></i> Subir imagen
                    </button>
                </div>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar proceso</button>
        <button type="button" id="guardar-foto" class="btn btn-sm btn-primary">Guardar imagen</button>
      </div>
    </div>
  </div>
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

        // Variables temporales para servicio
        var idcategoriatmp = "";
        var serviciotmp = ""; 
        var imagenportadatmp = "";
        var fotoportada = "";

        // Variables para foto de perfil
        var fotoperfil = "";
        var fotoperfiltmp = "";


        // Mostrar imagen en la etiqueta img
        function mostrarImagenPrevia(idselector, imagen){
          // Asignando la imagen a su atributo src
          idselector.attr("src", "dist/img/" + imagen);
        }

        //Listar foto perfil
        function listarfotoperfil(){

          $.ajax({
            url: 'controllers/CProveedor.php',
            type: 'GET',
            data: 'operacion=onDataproveedores&idproveedor=' + ObetenerID,
            success: function (e){
              $("#card-fotoperfil").html(e);
            }
          });
        }

        //Modificar una imagen
        $("#card-fotoperfil").on("click", ".btn-update-fotoperofil", function(){

          //capturamos el idservicio, nombre y fotoperfil
          idproveedor = $(this).attr("data-codigo");
          fotoperfiltmp = $(this).attr("data-img");

          //Resetear valores
          $("#nombre-foto").html("Elijá una imagen");
          $("#imagen-perfil").attr('src', '#');
          $("#formulario-foto")[0].reset();

          // Selector de la etiqueta img
          let idimg = $("#img-perfil");

          // Abrir modal de imagen (Con la imagen que se indique)
          // Comprobar si ya existe una imagen
          if (fotoperfiltmp == "" || fotoperfiltmp == null){
              
              // Mostrar imagen por defecto del sistema
              mostrarImagenPrevia(idimg, 'logo1.jpeg');
              $("#nombre-foto").html("Elija una imagen");
          }
          else{
              // Mostrar imagen actual
              mostrarImagenPrevia(idimg, fotoperfiltmp);
              $("#nombre-foto").html("Elija una imagen");
          }

          var datos = {
              'operacion' : 'onDataproveedores',
              'idproveedor' : idproveedor
          };

          $.ajax({
              url: 'controllers/CProveedor.php',
              type: 'GET',
              data: datos,
              success: function (e){
                console.log(e);
                  $("#modal-actualizar-fotoperfil").modal('show');
              }
          });

        });

        //Modificar imagen de un servicio
        function modificarFotoPerfil(){

          //Obtenemos la foto
          fotoperfil = $("#imagen-perfil")[0].files[0];

          //Validar si existe foto definida
          if(fotoperfil == undefined){
              alert("No definio una imagen nueva");
          }
          else{
              
              //Objeto FormData
              var formData = new FormData();

              formData.append("operacion", "actualizarFotoperfil");
              formData.append("fotoperfil", fotoperfil);

              if(confirm("¿Estas seguro de modificar la foto de portada?")){

                  $.ajax({
                      url: 'controllers/CProveedor.php',
                      type: 'POST',
                      data: formData,
                      contentType: false,
                      processData: false,
                      cache: false,
                      success: function (e){
                          // Resetear variables
                          console.log(e);
                          idproveedor = -1;
                          fotoperfil = "";
                          
                          // Resetear el formulario
                          $("#formulario-foto")[0].reset();

                          // Cerrar modal y mostrar aviso
                          $("#modal-actualizar-fotoperfil").modal('hide');
                          listarfotoperfil();
                          alert("Foto de perfil actualizada correctamente");
                      }

                  });
              }

          }
        }

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

        //Mostrar imagen previa a actualizar servicio
        $("#imagen-perfil").change(function (e){
            //Obtener la seleccion de imagen
            let image = $("#img-perfil");
            cargarImgPrevia(e, image);

            //Mostrar efecto hover
            //$(".hover-imagen").removeClass('d-none');
        });

        $("#guardar-foto").click(modificarFotoPerfil);

        //Evento del boton que ejecuta al input (guardar)
        $("#btn-subir-foto-perfil").click(function (){
            $("#imagen-perfil").click();
        });

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
                    $("#NomProvComentan").val(datos.nombres);
                    
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

            if(confirm("¿Estas seguro que desea modificar?")){

              $.ajax({
                  url: 'controllers/CProveedor.php',
                  type: 'GET',
                  data: datos,
                  success: function(e){
                    //console.log(e);

                    if(e == ""){
                      
                      listarProveedor();
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
                  listarRedSocial(idproveedor);
                }
              });
            }
          }

        }

        //Lista Red individual por proveedor
        function listarRedSocial(idproveedor){
          //Enviar los datos por ajax
          $.ajax({
            url: 'controllers/CRedsocial.php',
            type: 'GET',
            data: 'operacion=listarRedessociales&idproveedor=' + ObetenerID,
            success: function (e){
              console.log(e);
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
                  if(e == ""){
                    listarContacto(idproveedor);
                    alert("Se ha registrado correctamente el contacto");
                  }
                }
              });
            }
          }
        }

        //Lista contacto individual por proveedor
        function listarContacto(idproveedor){
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
                if(e == ""){
                  listarContacto(idproveedor);
                  alert("Contacto modificado Correctamente");

                  var datosServer = JSON.parse(e);

                  $("#txtModCelular").val(datosServer.celular);
                  $("#txtModTelefono").val(datosServer.telefono);
                  $("#txtModCorreo").val(datosServer.email);
                }
              }
            });
          }
        });

        //Modifica los datos del proveedor
        $('#btnGuardarCambioProveedor').click(modificarProveedor);

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
                  listarContacto(idproveedor);
                  alert("Contacto Eliminado");
                }
              }
            });
          }
        });

        //Modifica los datos del horario
        //$('#btnGuardarCambioHorario').click(modificarHorario);
        
        //Listar Comentarios
        function listarComentario(){
          $.ajax({
              url  : 'controllers/CComentario.php',
              type : 'GET',
              data : 'operacion=listarComentarios&idproveedor=' + ObetenerID,
              success : function (e){
                  //console.log(e);
                  //Renderizar las etiquetas que vienen
                  $("#tabComent").html(e);
              }
          });
        }

        //Obtenemos los datos de un proveedor para poder hacer un comentario
        $("#card-servicios").on("click", ".btn-comentario", function(){
            //Capturamos el ID
            idproveedor = $(this).attr('data-idcode');
            listarComentario(idproveedor);
            $.ajax({
                url: 'controllers/CComentario.php',
                type: 'GET',
                data: 'operacion=obtenerOneDataProveedor&idproveedor=' + idproveedor,
                success: function (e){
                    
                    var datos = JSON.parse(e);
                    //console.log(datos);
                    $("#ModalComentario").modal('show');
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
                  'idproveedor'   : ObetenerID,
                  'comentario'    : comentario,
                  'puntuacion'    : puntuacion
              };
              //console.log(ObetenerID);

              $.ajax({
                  url: 'controllers/CComentario.php',
                  type: 'GET',
                  data: datos,
                  success: function(e){
                      console.log(e);
                      listarComentario();
                      alert("Se publico tu comentario correctamente");
                  }
              });
            }
          }
        });

        //Listar un comentario (CAPTURANDO ID DE COMENTARIO)
        $("#tabComent").on("click", ".btnEditarComentario", function(){

          idcomentario = $(this).attr("data-idcomentario");

          $.ajax({
              url: 'controllers/CComentario.php',
              type: 'GET',
              data: 'operacion=listarOneDataComentarios&idcomentario=' + idcomentario,
              success: function (e){
                  //console.log(e);
                  if(e != ""){
                      var data = JSON.parse(e);
                      datosNuevos = false;
                      $("#EditareaComent").val(data.comentario);
                      $("#Edittxtpuntuacion").val(data.puntuacion);

                      $("#ModalEditComentario").modal("show");
                  }
              }
          });
        });

        //Boton que ejecuta la funcion modificar comentario
        $("#ModalEditComentario").on("click", "#btnModiComent", function(){

          console.log(idcomentario);
          comentario = $("#EditareaComent").val();
          puntuacion = $("#Edittxtpuntuacion").val();

          //Array
          var datos = {
              'operacion'     : 'modificarComentario',
              'idcomentario'  : idcomentario,
              'comentario'    : comentario,
              'puntuacion'    : puntuacion
          };
          if(confirm("¿Estas seguro de modificar tu comentario?")){
              $.ajax({
                  url: 'controllers/CComentario.php',
                  type: 'GET',
                  data: datos,
                  success: function (e){
                      if (e == "") {
                          listarComentario(idproveedor);
                          alert("Se elimino correctamente");
                          var datosServer = JSON.parse(e);

                          $("#EditareaComent").val(datosServer.comentario);
                          $("#Edittxtpuntuacion").val(datosServer.puntuacion);
                      }
                      
                      
                  }
              });
          }
        });

        // Eliminar comentario
        $("#tabComent").on("click", ".btnDeleteComentario", function(){

          idcomentario = $(this).attr("data-idcomentario");
          //console.log(idcomentario);
          var datos = {
              'operacion'     :'eliminarComentario',
              'idcomentario'  : idcomentario
          };
          if (confirm("¿Esta segurro de eliminar este comentario?")) {
            $.ajax({
                url : 'controllers/CComentario.php',
                type : 'GET',
                data : datos,
                success : function (e){
                    console.log(e);
                    if (e == "") {
                        listarComentario(idproveedor);
                        alert("Se elimino correctamente");
                    }
                }
            });
          }
        });

        //Registrar horario
        $('#btnGuardarHorario').click(registrarHorario);

        //Boton que registra
        $('#btnRegisRed').click(registrarRedSocial);

        //Boton activa la funcion registrarContactos
        $('#btnRegisContac').click(registrarContactos);


        /**
         * PARA PODER PUBLICAR UN SERVICIO
        */

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
        
        //Boton para resetar a "Publicar servicio"
        $("#btn-registrar-servicio").click(function(){
            $("#formulario-servicios")[0].reset();
            $("#btn-guardar-servicio").removeClass("btn-info").addClass("btn-primary")
            .html("Publicar");
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

            if(confirm("Estas seguro de publicar el servicio")){
                $("#modal-servicios").modal("hide");
                registrarOActualizarServicio(formData);
            }
        });

        //Para modificar o registrar
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
                      listarServicioOneData();
                    }     
                }
            });
        }

        //Modificar un Servicio
        $("#card-one-servicios").on("click", ".btn-editar", function(){

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
        $("#card-one-servicios").on("click", ".btn-update-img", function(){

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
        $("#card-one-servicios").on("click", ".btn-eliminar", function(){

          idservicio = $(this).attr("data-codigo");

          if(confirm("¿Estas seguro de eliminar este servicio?")){
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
                          listarServicioOneData();
                          alert("Foto de portada actualizada correctamente");
                      }

                  });
              }

          }
        }

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

        // Evento click, para guardar la nueva imagen
        $("#guardar-imagen").click(modificarFotoPortada);

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

        //Mostrar imagen previa a actualizar servicio
        $("#imagen-portada").change(function (e){
            //Obtener la seleccion de imagen
            let image = $("#img-servicio");
            cargarImgPrevia(e, image);

            //Mostrar efecto hover
            //$(".hover-imagen").removeClass('d-none');
        });

        //Evento del boton que ejecuta al input (guardar)
        $("#btn-subir-img-servicio").click(function (){
            $("#imagen-portada").click();
        });


        listarfotoperfil();
        //Listares
        listarComentario(idproveedor);
        listarServicioOneData()
        listarContacto();
        listarTipoRedSocialModal();
        listarProveedor();
        listarHorario();
        listarRedSocial();
    });
</script>