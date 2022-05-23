<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 1rem 0 0 1rem;">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="dist/img/registrar-login.jpeg" alt="Logo de Easy-Work" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">¡Crear cuenta!</h1>
                        </div>
                        <form class="user" id="formRegistroProveedor">
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <select id="txtDepartamento" class="js-example-basic-single js-states form-control form-control-border">
                                        <!-- Se cargarán de forma asincrona -->
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select id="txtProvincia" class="js-example-basic-single js-states form-control form-control-border">
                                        <!-- Se cargarán de forma asincrona -->
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select id="txtDistrito" class="js-example-basic-single js-states form-control form-control-border" >
                                        <!-- Se cargarán de forma asincrona -->
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-border" id="txtNombres"
                                        placeholder="Nombres">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-border" id="txtApellidos"
                                        placeholder="Apellidos">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-border" id="txtFechaNac"
                                        placeholder="Fecha nacimiento">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="input-text form-control form-control-border" id="txtTelefono" maxlength="11"
                                        placeholder="Telefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-border" id="txtcorreo"
                                    placeholder="Correo Electronico">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-border"
                                        id="txtClave" placeholder="Contraseña">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-border"
                                        id="txtClave2" placeholder="Repetir contraseña">
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary btn-user btn-block" id="btnRegistrarProveedor" type="button">Crear Cuenta</button>

                            <a href="index.php?view=login" class="btn btn-block">
                                Cancelar
                            </a>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Librería para formatear cajas de textos -->
<script src="plugins/jquery-mask/jquery.mask.min.js"></script>

<script>
    $(document).ready(function (){

        // Aplicar mascaras RUC: 11 digitos
        $("#txtTelefono").mask('000 000 000');
            
        function registrarProveedor(){
            //1. Validación comprobar que se cuenta con la información mínima
            let iddistrito = $("#txtDistrito").val();
            let nombres = $("#txtNombres").val();
            let apellidos = $("#txtApellidos").val();
            let fechanac = $("#txtFechaNac").val();
            let telefono = $("#txtTelefono").val();
            let correo = $("#txtcorreo").val();
            let clave = $("#txtClave").val();
            let clave2 = $("#txtClave2").val();
                
            //Validando campos vacios
            if (iddistrito == "" || nombres == "" || apellidos == "" || fechanac == "" || correo == "" || clave == "" || clave2 == ""){
                alert("Por favor, complete los campos");

            }else{

                //Validamos la contraseña
                if (clave != clave2){
                    alert("Las contraseñas no coinciden, revise por favor.");
                }else{

                    //Confirmamos si estamos seguros
                    if(confirm("¿Estas seguro de guardar registro?")){

                        //2. Crear el array asociativo $_GET'' controlador
                        var datos = {
                            'operacion'     : 'registrarProveedor',
                            'iddistrito'    : iddistrito,
                            'nombres'       : nombres,
                            'apellidos'     : apellidos,
                            'fechanac'      : fechanac,
                            'telefono'      : telefono,
                            'correo'        : correo,
                            'clave'         : clave
                        };

                        //3. Enviar los datos por Ajax
                        $.ajax({
                            url:    'controllers/CProveedor.php',
                            type:   'GET',
                            data:   datos,
                            success: function(e){
                                alert("Se a registrado exitosamente");
                                //4. Regresar todo a su estado original
                                $("#formRegistroProveedor")[0].reset();
                            }
                        }); //Fin de AJAX
                    }//Confirmación para guardar
                }//En caso este correcta las dos contraseñas
            }//Pasó la validación
        }//Fin de registrarProveedor
            

        function cargarDepartamentos(){
            //Enviar datos por ajax, usando el metodo GET
            $.ajax({
                url:    'controllers/CDepartamento.php',
                type:   'GET',
                data:   'operacion=ListarDepartamentos',
                success: function (e){
                    //Renderizar las etiquetas que vienen desde controllers
                    $("#txtDepartamento").html(e); //html e Inyecta nuenvas etiquetas e 
                }
            }); // Fin ajax
        }
            
            //Cargar las provincias de acuerdo con lo que se seleccione en Departamentos
        $("#txtDepartamento").change( function (){
                
            var datos = {
                'operacion'         : 'ListarProvincias',
                'iddepartamento'    : $(this).val()
            };
            console.log($(this).val());

            $.ajax({
                url: 'controllers/CProvincia.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    //Renderizar etiquetas que vienen desde controllers
                    $("#txtProvincia").html(e);
                }
            });
        });
            
            //Cargar las provincias de acuerdo con lo que se seleccione en Provincias
        $("#txtProvincia").change( function (){
                
            var datos = {
                'operacion' : 'ListarDistritos',
                'idprovincia' : $(this).val()
            };
                
            $.ajax({
                url: 'controllers/CDistrito.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    $("#txtDistrito").html(e);
                }
            });
        });
            

        //Eventos asociados a botones
        $("#btnRegistrarProveedor").click(registrarProveedor);

        //Ejecutar metodos al iniciar
        cargarDepartamentos(); //Utilizado para registrar un departamento
    });
</script>