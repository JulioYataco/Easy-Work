<div class="row">
  <div class="col-md-12">
    <div style="position: relative; width: 70vw; height: 35vw; margin: auto;">
      <canvas id="lienzo"></canvas>
    </div>
  </div>
</div>

<form action="">
  <div class="row">
    <div class="col-md-10" style="text-align: center;">
      
    </div>
  </div>
</form>

<script>
  //Contexto representa el tipo de canvas a utilizar
  const contexto = document.getElementById("lienzo").getContext("2d");

  const grafico = new Chart(contexto, {
    type: 'bar',
    data: {
      labels: ["", "", "", ""],
      datasets: [
        {
          label: 'Proveedores',
          data: [15,20,25,30],
          backgroundColor: listBackground,
          borderColor: listBorder,
          borderWidth: 2
        }
    ]
    },
    options: opChart
  });

  
    getData();

  function getData(){

    let labelChart = [];
    let dataChart = [];

    $.ajax({
      url: 'controllers/CProveedor.php',
      type: 'GET',
      data: 'operacion=getProveedorDashboard',
      success: function (result){
        debugger;
        let datos = JSON.parse(result);
        
        console.log(datos);

        datos.forEach(valor => {
          
          labelChart.push(valor["anio"]);
          dataChart.push(valor["cantidad"]);
         
        });

        console.log(dataChart);

        //Actualizando gráfico
        grafico.data.labels = labelChart;
        grafico.data.datasets[0].data = dataChart;
        grafico.update();
      }
    });
  }

</script>