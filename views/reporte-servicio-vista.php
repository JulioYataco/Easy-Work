<br>
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Reporte de Servicios Activos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Servicio(s)</th>
                    <th>Proveedor(s)</th>
                    <th>Ubicación</th>
                    <th>Nivel</th>
                    <th>Operación</th>
                </tr>
            </thead>
            <tbody id="ServiciosActivos">
                <!-- De forma asincrona -->
            </tbody>
            <tfoot>
            <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Servicio(s)</th>
                    <th>Proveedor(s)</th>
                    <th>Ubicación</th>
                    <th>Nivel</th>
                    <th>Operación</th>
            </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Reporte de servicios Inactivos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Servicio(s)</th>
                    <th>Proveedor(s)</th>
                    <th>Ubicación</th>
                    <th>Nivel</th>
                    <th>Operación</th>
            </tr>
            </thead>
            <tbody id="ServiciosInactivos">
                <!-- De forma asincrona -->
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Servicio(s)</th>
                    <th>Proveedor(s)</th>
                    <th>Ubicación</th>
                    <th>Nivel</th>
                    <th>Operación</th>
                </tr>
            </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<!-- DataTables  & Plugins -->
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
  $(document).ready(function () {

    var idservicio = "";

      function renderDataTable(){

        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    }

    //Lista todos los servicios activos
    function listarServicios(){
        $.ajax({
            url: 'controllers/CServicio.php',
            type: 'GET',
            data: 'operacion=listarServiciosActivos',
            success: function (e){
                //console.log(e);
                //Destruimos al DataTable anterior
                var tabla = $("#example1").DataTable();
                tabla.destroy();
                //Enviamos nuevas filas al cuerpo de la tabla
                $("#ServiciosActivos").html(e);
                //Volver a cargar el DataTable
                renderDataTable();
            }
        });
    }

    //Lista todos los servicios activos
    function listarServiciosInactivos(){
        $.ajax({
            url: 'controllers/CServicio.php',
            type: 'GET',
            data: 'operacion=listarServiciosInactivos',
            success: function (e){
                //console.log(e);
                //Destruimos al DataTable anterior
                var tabla2 = $("#example2").DataTable();
                tabla2.destroy();
                //Enviamos nuevas filas al cuerpo de la tabla
                $("#ServiciosInactivos").html(e);
                //Volver a cargar el DataTable
                renderDataTable();
            }
        });
    }
    
    // DESABILITAR SERVICIOS
    $("#example1").on("click", ".btnElimServ", function(){

        idservicio = $(this).attr("data-idservicio");

        var datos = {
            'operacion'  : 'eliminarServiciosActivos',
            'idservicio' : idservicio
        };
        if (confirm ("¿Estas seguro de inabilitar este servicio?")) {

            $.ajax({
                url : 'controllers/CServicio.php',
                type : 'GET',
                data : datos,
                success : function(e){
                    console.log(e);
                    if (e == "") {
                        listarServicios();
                        listarServiciosInactivos();
                        alert("se eliminino Correctamente");                        
                    }
                }
            });
        }
    });

    // DESABILITAR SERVICIOS
    $("#example2").on("click", ".btnActivarServ", function(){

        idservicio = $(this).attr("data-idservicio");

        var datos = {
            'operacion'  : 'ActivarServiciosActivos',
            'idservicio' : idservicio
        };
        if (confirm ("¿Estas seguro de HABILITAR este servicio?")) {

            $.ajax({
                url : 'controllers/CServicio.php',
                type : 'GET',
                data : datos,
                success : function(e){
                    console.log(e);
                    if (e == "") {
                        listarServicios();
                        listarServiciosInactivos();
                        alert("se Habilito Correctamente");                        
                    }
                }
            });
        }
    });


    listarServicios();
    listarServiciosInactivos();
    renderDataTable();


  });
</script>