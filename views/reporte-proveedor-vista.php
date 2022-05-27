<!-- TABLA PROVEEDORES ACTIVOS -->
<br>
<div class="well" >
    <h5>Lista de Proveedores Activos</h5>
    <table class="table table-striped" id="TableProveedoresActiv">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Distrito</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody id="TabProveedorAct">
            <!-- AQUI SE CARGARAN DE FORMA ASINCRONA -->
        </tbody>
    </table>
</div>
<hr>
<br>
<!-- TABLA PROVEEDORES INACTIVOS -->
<div class="well">
    <h5>Lista de Proveedores Inactivos</h5>
    <table class="table table-striped" id="TableProveedoresInac">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Distrito</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody id="TabProveedorInac">
            <!-- AQUI SE CARGARAN DE FORMA ASINCRONA -->
        </tbody>
    </table>
</div>
<hr>
<br>
<!-- TABLA PROVEEDORES ACTIVOS -->
<div class="well">
    <h5>Lista de Administradores</h5>
    <table class="table table-striped" id="TableAdminds">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Distrito</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody id="TabAdminds">
            <!-- AQUI SE CARGARAN DE FORMA ASINCRONA -->
        </tbody>
    </table>
</div>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
    $(document).ready(function (){

        var idproveedor = "";

        function renderDataTableProvActiv(){
        
            $("#TableProveedoresActiv").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#TableProveedoresActiv_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        }

        function renderDataTableProvInact(){
        
            $("#TableProveedoresInac").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#TableProveedoresInac_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        }

        function renderDataTableAminds(){
        
            $("#TableAdminds").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        }

        // LISTAR PROVE ACTIVOS
        function listarProveedoresActivos(){
            $.ajax({
                url: 'controllers/CAdministrador.php',
                type: 'GET',
                data: 'operacion=listarProveedoresActivos',
                success: function(e){
                    var tabla = $("#TableProveedoresActiv").DataTable();

                    tabla.destroy();

                    $("#TabProveedorAct").html(e);

                    renderDataTableProvActiv();
                }
            });
        }

        // LISTAR PROVEEDORES INACTIVOS
        function listarProveedoresInactivos(){
            $.ajax({
                url : 'controllers/CAdministrador.php',
                type : 'GET',
                data : 'operacion=listarProveedoresInactivos',
                success: function(e){
                    var tabla = $("#TableProveedoresInac").DataTable();

                    tabla.destroy();

                    $("#TabProveedorInac").html(e);
                    renderDataTableProvInact();
                }

            });
        }

        // LISTAR ADMINS
        function listarAdmins(){
            $.ajax({
                url : 'controllers/CAdministrador.php',
                type : 'GET',
                data : 'operacion=listarAministradores',
                success : function(e){
                    var tabla = $("#TableAdminds").DataTable();
                    tabla.destroy();
                    $("#TabAdminds").html(e);
                    renderDataTableAminds();
                }
            });
        }

        // DESABILITAR PROVEEDOR
        $("#TabProveedorAct").on("click", ".btnElimProv", function(){

            idproveedor = $(this).attr("data-idproveedor");

            var datos = {
                'operacion'     : 'eliminarProveedoresActivos',
                'idproveedor' : idproveedor
            };
            if (confirm ("¿Estas seguro de inabilitar a este proveedor?")) {

                $.ajax({
                    url : 'controllers/CAdministrador.php',
                    type : 'GET',
                    data : datos,
                    success : function(e){
                        if (e == "") {
                            listarProveedoresActivos();
                            listarProveedoresInactivos();
                            alert("se eliminino Correctamente");                        
                        }
                    }
                });
            }
        });

        // Convertir a Administrador
        $("#TabProveedorAct").on("click", ".btnConvertAdmin",  function(){

            idproveedor = $(this).attr("data-idproveedor");

            var datos = {
                'operacion'     : 'convertirAdministrador',
                'idproveedor'   : idproveedor 
            };

            if (confirm("¿Estas seguro de convertir a este PROVEEDOR en ADMINISTRADOR?")) {

                $.ajax({
                    url: 'controllers/CAdministrador.php',
                    type : 'GET',
                    data : datos,
                    success : function(e){
                        if(e == ""){
                            listarProveedoresActivos();
                            listarAdmins();
                            alert("Ahora el proveedor es un Administrador");
                        }
                    }
                });
            }
        });

        // PARA HABILITAR PROVEEDOR
        $("#TabProveedorInac").on("click", ".btnHabiProv", function(){
            idproveedor = $(this).attr("data-idproveedor");

            var datos = {
                'operacion'     :'reactivarProveedores',
                'idproveedor'   : idproveedor
            };
            if (confirm("¿Estas seguro Habilitar a este proveedor?")) {
                $.ajax({
                    url: 'controllers/CAdministrador.php',
                    type : 'GET',
                    data : datos,
                    success : function(e){
                        console.log(e);
                        if (e=="") {
                            listarProveedoresInactivos();
                            listarProveedoresActivos();
                            alert("se habilitó correctamente");
                        }
                    }
                });
            }
        });

        //Convertir ADMINISTRADOR a PROVEEDOR
        $("#TabAdminds").on ("click", ".btnElimAdmin", function(){
            idproveedor = $(this).attr("data-idproveedor");

            var datos = {
                'operacion'     :'EliminarAdministrador',
                'idproveedor'   : idproveedor
            };
            if (confirm("¿Estas seguro Convertir este Administrador a Proveedor?")) {
                $.ajax({
                    url: 'controllers/CAdministrador.php',
                    type: 'GET',
                    data: datos,
                    success: function(e){
                        if(e == ""){
                            listarProveedoresActivos();
                            listarAdmins();
                            alert("Se elimino correctamente");
                        }
                    }
                });
            }
        });

        // RENDER TABLE
        renderDataTableProvInact();
        renderDataTableProvActiv();
        renderDataTableAminds();

        // funciones
        listarAdmins();
        listarProveedoresInactivos();
        listarProveedoresActivos();


    });
</script>