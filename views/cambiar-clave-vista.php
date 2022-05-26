<?php
session_start();
//sesion apertura , esta diferente
if(!$_SESSION['login']){
    header('Location: ../index.php');
}
?>
<br><br>

<!-- START LOCK SCREEN ITEM -->
<div class="lockscreen-item">
  <!-- lockscreen image -->
  <div class="lockscreen-image">
    <img src="dist/img/logo1.jpeg" alt="User Image">
  </div>
  <!-- /.lockscreen-image -->

  <!-- lockscreen credentials (contains the form) 
  <form class="lockscreen-credentials">
    <div class="input-group">
      <input type="password" class="form-control" placeholder="password">
      <div class="input-group-append">
        <button type="button" class="btn">
          <i class="fas fa-arrow-right text-muted"></i>
        </button>
      </div>
    </div>
  </form>-->
  <!-- /.lockscreen credentials -->
</div>
<!-- /.lockscreen-item -->

<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
			<div class="d-flex justify-content-center">
				<div class="brand_logo_container">
					<img src="dist/img/Julio-developerss.jpeg" class="brand_logo" alt="Logo">
				</div>
			</div>
			<div class="d-flex justify-content-center form_container">
				<form id="form-update-pass">
          <label>Contraseña anterior</label>
					<div class="input-group mb-2">
						<div class="input-group-append">
							<span class="input-group-text">
                <i class="nav-icon fas fa-key"></i>
              </span>
						</div>
						<input type="password" name="" class="form-control input_pass" value="" placeholder="Primera Contraseña" id="txtClave1">
					</div>
          <label>Contraseña nueva</label>
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">
                <i class="nav-icon fas fa-key"></i>
              </span>
						</div>
						<input type="password" name="" class="form-control input_pass" value="" placeholder="Segunda Contraseña" id="txtClave2">
					</div>
					<label>Repita su Contraseña Nueva</label>
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text">
                <i class="nav-icon fas fa-key"></i>
              </span>
						</div>
						<input type="password" name="" class="form-control input_pass" value="" placeholder="Segunda Contraseña" id="txtClave3">
					</div>
					<div class="d-flex justify-content-center mt-3 login_container">
              <button type="button" name="button" class="btn login_btn" id="btnUpdatePass">Guardar Contraseña</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>

    $(document).ready(function (){

        //Resetea las cajas
        function borrarCajas(){
            $("#form-update-pass")[0].reset();
        }

        //Modifica clave
        function modificarClave(){
            const clave1 = $("#txtClave1").val();
            const clave2 = $("#txtClave2").val();
            const clave3 = $("#txtClave3").val();

            if(clave1 == "" || clave2 == "" || clave3 == ""){
                alert("Debe completar todos los campos para continuar");
            }
            else{
                if (clave2 != clave3){
                    alert("Las contraseñas no coinciden");
                }
                else{

                    $.ajax({
                        url: 'controllers/CProveedor.php',
                        type: 'GET',
                        data: {
                            operacion : 'modificarClaveProveedor',
                            clave1    : clave1,
                            clave2    : clave2
                        },
                        success: function (result) {
                            if($.trim(result) == ""){

                                alert("La contraseña fue actualizada");
                                borrarCajas();
                            }
                            else{
                                alert(result);
                                $("#txtclave1").focus();
                            }
                        }
                    });
                }
            }
        }

        $("#btnUpdatePass").click(modificarClave);
    });
</script>