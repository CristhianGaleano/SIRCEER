<?php require 'cabecera-admin.php';
require_once '../admin/config.php'; ?>
<?php include_once 'template-parts/menu-sedes.php' ?>
      
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div class="wraper-charts">
        <div style="width:43%; height:226px; float: left;"  id="modelo"></div>
        <div style="width:43%; height:226px; float: left;"  id="jornadas"></div>
    </div>
    
    

<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('modelo', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "MODELO"
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'SAT PRESENCIAL',
            y: <?php echo $porceSMSP?>,
            sliced: true,
            selected: true
        }, {
            name: 'EDUCACIÓN TRADICIONAL',
            y: <?php echo $porceSMET ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'POST PRIMARIA',
            y: <?php echo $porceSMPP ?> ,
            sliced: true,
            selected: true
        }
        ]
    }]
});

    </script>

    <?php #require 'piedepagina-admin.php'; ?>