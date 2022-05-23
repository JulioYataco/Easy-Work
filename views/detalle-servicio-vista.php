

<!-- Contenido del card -Servicio -->
<div class="group-cards" id="card-servicio-ondata">
    <!-- Cards servicios cargados de manera asincrona - ajax -->
</div>

<script>
    $(document).ready(function (){

        function onData(){

            var datos = {
                'operacion'  : 'oneDataServicio',
                'idservicio' : localStorage.getItem("capidservicio")
            };

            $.ajax({
                url: 'controllers/CServicio.php',
                type: 'GET',
                data: datos,
                success: function (e){
                    console.log(e);
                    $("#card-servicios-ondata").html(e);
                }
            });
        }

        onData();
    });
</script>