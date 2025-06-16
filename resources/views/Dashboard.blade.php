@extends('layouts.main')

@section('title', 'Histórico')

@section('content')

<div class="dashboard">
  <aside class="sidebar">
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    <nav>
      <ul>
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Home</span></a></li>
        <li><a href="{{ route('historico') }}"><i class="fas fa-history"></i><span>Histórico</span></a></li>        
        <li><a href="{{ route('configuracao') }}"><i class="fas fa-cog"></i><span>Configuração</span></a></li>  
        <li><a href="{{ route('dashboard') }}"><i class="fas fa-chart-bar"></i><span>Relatórios</span></a></li>   
        <li><a href="{{ route('saibamais') }}"><i class="fas fa-info-circle"></i><span>Saiba mais</span></a></li>         
      </ul>
      <div class="logout">
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i><span>Sair</span></a>
      </div>
    </nav>
  </aside>

  <main class="main-content">
    <div class="chart-container" style="padding: 20px;">
      <h2>Gastos mensais</h2>
      <div id="chart"></div>
    </div>
  </main>
</div>

<!-- Script ApexCharts CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  var options = {
    series: [{
      name: 'Inflação',
      data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
    }],
    chart: {
      height: 350,
      type: 'bar'
    },
    plotOptions: {
      bar: {
        borderRadius: 10,
        dataLabels: {
          position: 'top',
        },
      }
    },
    dataLabels: {
      enabled: true,
      formatter: function (val) {
        return val + "%";
      },
      offsetY: -20,
      style: {
        fontSize: '12px',
        colors: ["#304758"]
      }
    },
    xaxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      position: 'top',
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      crosshairs: {
        fill: {
          type: 'gradient',
          gradient: {
            colorFrom: '#D8E3F0',
            colorTo: '#BED1E6',
            stops: [0, 100],
            opacityFrom: 0.4,
            opacityTo: 0.5,
          }
        }
      },
      tooltip: {
        enabled: true,
      }
    },
    yaxis: {
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false,
      },
      labels: {
        show: false,
        formatter: function (val) {
          return val + "%";
        }
      }
    },
    
    
  };

  var chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>

@endsection
