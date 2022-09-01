@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Panel de administración')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Reportes abiertos  </p>
             
              @if(!is_null($reports)) 
              <h3 class="card-title">{{$reports->count()}}</h3>
              @else
              <h3 class="card-title">0</h3>
              @endif 
                <small class="card-category">Activos</small>
            </div>
           
            <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> Totales
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Proyectos Actuales</p>
              @if(!is_null($projects)) 
              <h3 class="card-title">{{$projects->count()}}</h3>
              @else
              <h3 class="card-title">0</h3>
              @endif 
          
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Este mes
              </div>
            </div>
          </div>
        </div>
        {{-- <a href="{{route('users.index')}}"> --}}
        <div class="col-lg-3 col-md-6 col-sm-6" >
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Tiempo excedido</p>
              <h3 class="card-title">10</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  <a href="#">Revisar</a>
                </div>
              </div>
          </div>
        </div>
      </a>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Sin asignar</p>
                <h3 class="card-title">10</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-warning">warning</i>
                  <a href="#">Revisar</a> 
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6" onclick="location.href='{{route('projects.yours')}}';" style="cursor: pointer;">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Tus Proyectos </p>
              @if(!is_null($yoursp)) 
              <h3 class="card-title">{{$yoursp->count()}}</h3>
              @else
              <h3 class="card-title">0</h3>
              @endif 
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a href="#">Revisar</a> 
              </div>
            </div>
          </div>
        </div>

    <div class="col-lg-3 col-md-6 col-sm-6" onclick="location.href='{{route('tasks.yours')}}';" style="cursor: pointer;">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Tus Tareas </p>
          @if(!is_null($yourst)) 
              <h3 class="card-title">{{$yourst->count()}}</h3>
              @else
              <h3 class="card-title">0</h3>
              @endif 
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-warning">warning</i>
            <a href="#">Revisar</a> 
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6" onclick="location.href='{{route('reports.yours')}}';" style="cursor: pointer;">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Tus Reportes </p>
          @if(!is_null($yoursr)) 
          <h3 class="card-title">{{$yoursr->count()}}</h3>
          @else
          <h3 class="card-title">0</h3>
          @endif 
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons text-warning">warning</i>
            <a href="#">Revisar</a> 
          </div>
        </div>
      </div>
    </div>

      </div>
       <div class="row">
       <div id ="chart-container"></div>
       <div id ="char"></div>
       <script src="https://code.highcharts.com/highcharts.js"></script>
       <script>
       var datas = <?php echo json_encode ($datas) ?>;

       Highcharts.chart('chart-container', {
         title: {
           text: 'Incremento de nuevos Usuarios '
         },
        
         xAxis: {
           categories: ['Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jun', 'Agt', 'Sep', 'Oct', 'Nov', 'Dic']
         },
         yAxis:{
           title: {
             text: 'Numero de nuevos usuarios'
           }
         },
         legend:{
           layout: 'vertical',
           align: 'right',
           verticalAlign: 'middle'
         },
         plotOptions:{
           series: {
             allowPointSelect: true
           }
         },
         series: [{
           name: 'Nuevo usuario',
           data: datas
         }],
         responsive:{
           rules: [
             {
               condition: {
                 maxwidth: 500
               },
               chartOptions:{
                 legend:{
                   layout: 'horizontal',
                   align: 'center',
                   verticalAlign: 'bottom'
                 }
               }
             }
           ]
         }
       })
 var data = <?php echo json_encode ($data) ?>;

Highcharts.chart('char', {
  title: {
    text: 'Incremento de nuevos Reportes '
  },
 
  xAxis: {
    categories: ['Ene', 'Feb', 'Mzo', 'Abr', 'May', 'Jun', 'Jun', 'Agt', 'Sep', 'Oct', 'Nov', 'Dic']
  },
  yAxis:{
    title: {
      text: 'Numero de nuevos usuarios'
    }
  },
  legend:{
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
  },
  plotOptions:{
    series: {
      allowPointSelect: true
    }
  },
  series: [{
    name: 'Nuevo usuario',
    data: data
  }],
  responsive:{
    rules: [
      {
        condition: {
          maxwidth: 500
        },
        chartOptions:{
          legend:{
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }
    ]
  }
})
       </script>
        {{--<div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Reportes Abiertos</h4>
              <p class="card-category">100 Abiertos este mes</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Actualizado hoy
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-success">
                <div class="ct-chart" id="completedTasksChart"></div>
              </div>
              <div class="card-body">
                <h4 class="card-title">Reportes por proyecto</h4>
                <p class="card-category">
                  <span class="text-success">Quintana Roo</span> Proyecto con más reportes</p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> Actualizado hoy
                </div>
              </div>
            </div>
          </div>--}}
      </div> 
{{--
      <div class="row">
        
        <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Reportes resueltos por técnico</h4>
                <p class="card-category">Histórico de reportes resueltos este mes</p>
              </div>
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-success">
                    <th>N. Empleado</th>
                    <th>Nombre</th>
                    <th>Reportes cerrados</th>
                    <th>Reportes aceptados</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>123</td>
                      <td>José Sandoval</td>
                      <td>10</td>
                      <td>10</td>
                    </tr>
                    <tr>
                      <td>124</td>
                      <td>Fernando Medina</td>
                      <td>8</td>
                      <td>7</td>
                    </tr>
                    <tr>
                      <td>125</td>
                      <td>Juan Alvarez</td>
                      <td>7</td>
                      <td>7</td>
                    </tr>
                    <tr>
                      <td>126</td>
                      <td>Enrique Segoviano</td>
                      <td>1</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Proyectos con mas reportes</h4>
              <p class="card-category">Histórico de reportes del mes</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Numero</th>
                  <th>Nombre</th>
                  <th>Abeirtos</th>
                  <th>Resueltos</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Quintana Roo</td>
                    <td>15</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Jalisco</td>
                    <td>10</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Los Cabos</td>
                    <td>5</td>
                    <td>0</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Querétaro</td>
                    <td>3</td>
                    <td>0</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        
      </div>
    </div>--}}
  </div>
@endsection

@push('js')

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });

   
  </script>
@endpush
