<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4"> 
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Grafico Lineal</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                      <div class="chart">
                        <div class="row">
                          <div class="col-md-12">
                            <div style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                              <canvas id="canvas"></canvas>
                            </div>
                          </div>
                        </div>
                            <form form action="">
                            </form>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-4">
                <!-- LINE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Grafico de Barras</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                      <div class="chart">
                        <div class="row">
                          <div class="col-md-12">
                            <div style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                              <canvas id="lienzo"></canvas>
                            </div>
                          </div>
                        </div>

                        <form action="">
                          <div class="row">
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
                    <!-- /.card-body -->
            </div>
                <!-- /.card -->


            <div class="col-md-4">
                <!-- CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Grafico Pie</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                      
                      <div class="chart">
                        <div class="row">
                            <div class="col-md-12">
                              <div style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                <canvas id="estadistico"></canvas>
                              </div>
                            </div>
                        </div>
                        <form action="">
                              <div class="row">
                              </div>
                        </form>
                      </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col (RIGHT) -->
      </div>
        <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


<!-- Grafico barra -->
<script>
  //Contexto representa el tipo de canvas a utilizar
  const contexto = document.getElementById("lienzo").getContext("2d");

  const grafico = new Chart(contexto, {
    type: 'bar',
    data: {
      labels: ["", "", "", ""],
      datasets: [
        {
          label:'Registro',
          data: [15,20,25,30],
          backgroundColor: [
            'rgba(39,174,96, 0.5)',
            'rgba(211,84,0, 0.5)',
            'rgba(231,76,60,0.5)',
            'rgba(86,101,115, 0.5)'
          ],
          borderColor: [ 
            'rgba(39,174,96,0.5)',
            'rgba(211,84,0,1)',
            'rgba(231,76,60,1)',
            'rgba(86,101,115,1)'
          ],
          borderWidth: 2
        }
    ]
    },
    options:  {
    scales : { y: { beginAtZero: true } },
    responsive: true,
    plugins:{
        legend: {
            position: 'top',
          },
    },
    maintainAspectRatio: false
  }
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
          
          labelChart.push(valor["fecha"]);
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

<!-- Grafico Lineal -->
<script>
  //Contexto representa el tipo de canvas a utilizar
  const contexto1 = document.getElementById("canvas").getContext("2d");

  const grafico2 = new Chart(contexto1, {
    type: 'line',
    data: {
      labels: ["", "", "", ""],
      datasets: [
        {
          label:'Publicaciones',
          data: [15,20,25,30],
          backgroundColor: [
            'rgba(39,174,96, 0.5)',
            'rgba(211,84,0, 0.5)',
            'rgba(231,76,60,0.5)',
            'rgba(86,101,115, 0.5)'
          ],
          borderColor: [ 
            'rgba(39,174,96,0.5)',
            'rgba(211,84,0,1)',
            'rgba(231,76,60,1)',
            'rgba(86,101,115,1)'
          ],
          borderWidth: 2
        }
    ]
    },
    options:  {
    scales : { y: { beginAtZero: true } },
    responsive: true,
    plugins:{
        legend: {
            position: 'top',
          },
    },
    maintainAspectRatio: false
  }
  });

    getDatalienal();

  function getDatalienal(){

    let labelChart = [];
    let dataChart = [];
    $.ajax({
      url: 'controllers/CProveedor.php',
      type: 'GET',
      data: 'operacion=getProveedorDashboardLineal',
      success: function (result){
        debugger;
        let datos = JSON.parse(result);
        
        console.log(datos);
        datos.forEach(valor => {
          
          labelChart.push(valor["Categoria"]);
          dataChart.push(valor["Publicaciones"]);
        
        });
        console.log(dataChart);
        //Actualizando gráfico
        grafico2.data.labels = labelChart;
        grafico2.data.datasets[0].data = dataChart;
        grafico2.update();
      }
    });
  }

</script>

<!-- Grafico circular -->
<script>
  //Contexto representa el tipo de canvas a utilizar
  const contexto2 = document.getElementById("estadistico").getContext("2d");

  const grafico3 = new Chart(contexto2, {
    type: 'pie',
    data: {
      labels: ["Muy mal", "Mal", "Bueno", "Muy Bueno", "Excelente"],
      datasets: [
        {
          label:'Publicaciones',
          data: [15,20,25,30],
          backgroundColor: [
            'rgba(39,174,96, 0.5)',
            'rgba(211,84,0, 0.5)',
            'rgba(231,76,60,0.5)',
            'rgba(86,101,115, 0.5)'
          ],
          borderColor: [ 
            'rgba(39,174,96,0.5)',
            'rgba(211,84,0,1)',
            'rgba(231,76,60,1)',
            'rgba(86,101,115,1)'
          ],
          borderWidth: 2
        }
    ]
    },
    options:  {
    scales : { y: { beginAtZero: true } },
    responsive: true,
    plugins:{
        legend: {
            position: 'top',
          },
    },
    maintainAspectRatio: false
  }
  });


  getDataCircular();

  function getDataCircular(){

    let labelChart = [];
    let dataChart = [];

    $.ajax({
      url: 'controllers/CProveedor.php',
      type: 'GET',
      data: 'operacion=getProveedorDashboardcircular',
      success: function (result){
        debugger;
        let datos = JSON.parse(result);
        
        console.log(datos);

        datos.forEach(valor => {
          
          labelChart.push(valor["Nivel"]);
          dataChart.push(valor["Servicios"]);
        
        });

        console.log(dataChart);

        //Actualizando gráfico
        grafico3.data.labels = labelChart;
        grafico3.data.datasets[0].data = dataChart;
        grafico3.update();
      }
    });
  }

</script>
