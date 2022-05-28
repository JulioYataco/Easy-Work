<?php
session_start();
//sesion apertura , esta diferente
if(!$_SESSION['login']){
    header('Location: ../index.php');
}
?>

<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="dist/img/logo1.jpeg" class="brand_logo" alt="Logo">
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form id="form-update-pass">
                <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="" class="form-control input_pass" value="" placeholder="Contraseña actual" id="txtClave1">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="" class="form-control input_pass" value="" placeholder="Contraseña nueva" id="txtClave2">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="" class="form-control input_pass" placeholder="Repita la contraseña nueva" id="txtClave3">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                           
                        </div>
                    </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                <button type="button" name="button" class="btn login_btn" id="btnUpdatePass">Modificar contraseña</button>
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
                  if(confirm("¿Estas seguro de cambiar la contraseña?")){

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
        }

        $("#btnUpdatePass").click(modificarClave);
    });
</script>