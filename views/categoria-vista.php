<br>
<!-- Boton para agregar categoria -->
<button type="button" class="btn btn-success" id="" data-toggle="modal" data-target="#ModalRegisCategoria">
         Categoria <i class="fas fa-plus-square"></i></i>
</button>
<br>

<!-- MODAL PARA AÑADIR CATEGORIA -->
<div class="modal fade" id="ModalRegisCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            
            <div class="inputs">
              <label for="">Categoria</label>
              <input class="form-control form-control-border" type="text" placeholder="Escriba el nonbre de la categoria" id="txtCategoria">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnRegistrarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA Modificar CATEGORIA -->
<div class="modal fade" id="ModalModCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mofidicar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            
            <div class="inputs">
              <label for="">Categoria</label>
              <input class="form-control form-control-border" type="text" placeholder="Escriba el nonbre de la categoria" id="txtModCategoria">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnModCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>
<hr>


<div class="table-responsive-sm">
  <table border="1" class="table">
    <thead class="bg-info">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Categoria</th>
        <th scope="col">Operación</th>
      </tr>
    </thead>
    <tbody id="tabla-categoria">
        <!-- SE CARGARAN DE FORMA ASINCRONA -->
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function(){

    var idcategoria = "";
    var nombrecategoria = "";

    //Lista
    function listarCategoria(){
      $.ajax({
        url: 'controllers/CCategoria.php',
        type: 'GET',
        data: 'operacion=listarCategorias',
        success: function (e){
          $("#tabla-categoria").html(e);
        }
      });
    }

    //Registra
    function registrarCategoria(){

      //Capturamos al input
      let nombrecategoria = $("#txtCategoria").val();

      if(nombrecategoria == ""){
        alert("Por favor, complete los datos");
      }
      else{
        // Creamos un array asosciativo
        var datos = {
          'operacion' : 'registrarCategoria',
          'nombrecategoria' : nombrecategoria
        };

        $.ajax({
          url: 'controllers/CCategoria.php',
          type: 'GET',
          data: datos,
          success: function(e){
            console.log(e);
            if(confirm("¿Estas seguro de agregar esta categoria?")){
              alert("Categoria guardado correctamente");
              location.reload();
            }
          }
        });
      }
    }

    //Obtener el id para modificar 
    $("#tabla-categoria").on("click", ".btnEditarCat", function(){

      idcategoria = $(this).attr('data-idcategoria');

      $.ajax({
        url: 'controllers/CCategoria.php',
        type: 'GET',
        data: 'operacion=onDataCategoria&idcategoria=' + idcategoria,
        success: function(e){
          console.log(e);
              
            if(e != ""){
              var data = JSON.parse(e);

              $("#txtModCategoria").val(data.nombrecategoria);

              $("#ModalModCategoria").modal('show');
            }
        }
      });   
    });

    //Modificar contactos
    $("#btnModCategoria").click(function(){

      nombrecategoria = $("#txtModCategoria").val();

      var datos = {
        'operacion'       : 'modificarCategoria',
        'idcategoria'     : idcategoria,
        'nombrecategoria' : nombrecategoria
      };

      if(confirm("¿Estas seguro de modificar esta categoria?")){

        $.ajax({
          url: 'controllers/CCategoria.php',
          type: 'GET',
          data: datos,
          success: function(e){
            console.log(e);

            listarCategoria();
            alert("Se a modificado Correctamente");
          }
        
        });
      }
    });

    //Eliminar un tipo de red social
    $("#tabla-categoria").on("click", ".btnEliminarCat", function(){

          //Capturamos el id
          idcategoria = $(this).attr('data-idcategoria');
          
          var datos = {
            'operacion'   : 'eliminarCategoria',
            'idcategoria' : idcategoria
          };

          if(confirm("¿Estas seguro de eliminar esta categoria?")){

            $.ajax({
              url: 'controllers/CCategoria.php',
              type: 'GET',
              data: datos,
              success: function(e){
                console.log(e);
                if(e == ""){
                  listarCategoria();
                  alert("Se elimino correctamente");
                  
                }
              }
            });
          }
    })

    //Boton que ejecuta la funcion registrar tipo red
    $("#btnRegistrarCategoria").click(registrarCategoria);

    listarCategoria();

  });

</script>