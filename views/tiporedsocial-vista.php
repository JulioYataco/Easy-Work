<!-- MODAL PARA AÑADIR TIPO RED SOCIAL -->
<div class="modal fade" id="ModalRegisRedSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar red social</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            
            <div class="inputs">
              <label for="">Red Social</label>
              <input class="form-control form-control-border" type="text" placeholder="Escriba el nonbre de la red social" id="txtRedSocial">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnRegistrarRedSocial">Guardar</button>
      </div>
    </div>
  </div>
</div>
<hr>

<!-- MODAL PARA MODIFICAR TIPO RED SOCIAL -->
<div class="modal fade" id="ModalModificarRedSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modificar Redes sociales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            
            <div class="inputs">
              <label for="">Red Social</label>
              <input class="form-control form-control-border" type="text" placeholder="Escriba el nonbre de la red social" id="txtModRedSocial">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnRegistrarRedSocial">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Boton para agregar tipo red social -->
<button type="button" class="btn btn-success" id="" data-toggle="modal" data-target="#ModalRegisRedSocial">
         Red Social <i class="fas fa-plus-square"></i></i>
</button>
<hr>
<br>

<div class="table-responsive-sm">
  <table border="1" class="table">
    <thead class="bg-info">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Red social</th>
        <th scope="col">Operación</th>
      </tr>
    </thead>
    <tbody id="tabla-tipoRed">
        <!-- SE CARGARAN DE FORMA ASINCRONA -->
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function(){

    var idtiporedsocial = "";

    function listarTipoRed(){
      $.ajax({
        url: 'controllers/CTiporedsocial.php',
        type: 'GET',
        data: 'operacion=listarTiporedsocial',
        success: function (e){
          $("#tabla-tipoRed").html(e);
        }
      });
    }

    function registrarTipoRed(){

      //Capturamos al input
      let redsocial = $("#txtRedSocial").val();

      if(redsocial == ""){
        alert("Por favor, complete los datos");
      }
      else{
        // Creamos un array asosciativo
        var datos = {
          'operacion' : 'registrarTiporedsocial',
          'redsocial' : redsocial
        };

        $.ajax({
          url: 'controllers/CTiporedsocial.php',
          type: 'GET',
          data: datos,
          success: function(e){
            console.log(e);
            if(confirm("¿Estas seguro de agregar este tipo de red social?")){
              alert("Red Social guardado correctamente");
              location.reload();
            }
          }
        });
      }
    }

    //Actualizar
    $("#tabla-tipoRed").on("click", ".btnEditarTipoRed", function(){

      var idtiporedsocial = $(this).attr('data-idtiporedsocial');
      $.ajax({
        url: 'controllers/CTiporedsocial.php',
        type: 'GET',
        data: 'operacion=oneDataTipoRed&idtiporedsocial' + idtiporedsocial,
        success: function(e){
          console.log(e);
              
            if(e != ""){
              var data = JSON.parse(e);

              $("#txtModRedSocial").val(data.redsocial)[0];

              $("#ModalModificarRedSocial").modal('show');
            }
        }
      });   
    });

    //Boton que ejecuta la funcion registrar tipo red
    $("#btnRegistrarRedSocial").click(registrarTipoRed);

    listarTipoRed();

  });

</script>