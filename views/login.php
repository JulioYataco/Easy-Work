<div class="row justify-content-center">
        <div class="col-xl-10 col-lg-9">
            <div class="card 0-header border-0 shadow-lg my-5" style="border-radius: 1rem 0 0 1rem;">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-md-block">
                            <!-- Aqui va la imagen -->
                            <img src="dist/img/portada-login.jpeg" alt="Logo de Easy-Work" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <!-- Centrar el titulo de login -->
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                                    <p>Ingresa o Registrate, ya es hora de mostrar lo que sabes</p>
                                </div>
                                <!-- / Centrar el titulo de login -->

                                <!-- formulario para usuario y contraseña -->
                                <form class="ususario">
                                    <!-- Input para correo -->
                                    <div class="form-group">
                                      <input type="text" id="txtCorreo" class="form-control form-control-border" placeholder="Correo electronico" aria-describedby="helpId">
                                    </div>
                                    <!-- Input para contraseña -->
                                    <div class="form-group">
                                        <input type="password" id="txtClave" class="form-control form-control-border" placeholder="Contraseña">
                                    </div>
                                    <div>
                                        <a href="">¿Olviste tu contraseña?</a>
                                    </div>
                                    
                                    <br>
                                    <!-- Botones -->
                                    <button type="button" class="btn btn-primary btn-block" id="btnIngresar">Ingresar</button>
                                    <hr>
                                    <a href="index.html?view=registrar-login" class="btn btn-block">Crear cuenta</a>
                                </form>
                                <!-- / formulario para usuario y contraseña -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
  //Evento ready = Página lista/cargá por completo
$(document).ready(function (){

  function iniciarSesion(){

    var correo = $("#txtCorreo").val();
    var clave = $("#txtClave").val();

    if (correo == "" || clave  == ""){
      alert("Por favor, Complete los datos");
      
    }else{

    var datos = {
      'operacion' :   'login',
      'correo'    :   correo,
      'clave'     :   clave
    };

      $.ajax({
        url: 'controllers/CProveedor.php',
        type: 'GET',
        data: datos,
        success: function(e){
          if (e != ""){
            //Al ser diferente de vacio, Se entiende que hay un error
            alert(e);
          }else{
            window.location.href = "main.php";
          }
        }
      });
    }
  }
    
  $("#btnIngresar").click(iniciarSesion);
});
</script>

