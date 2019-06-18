<?php require 'cabecera-admin.php';?>
<?php include_once "template-parts/menu-programas.php" ?>  
      

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div class="wraper-charts">
        <div style="width:43%; height:226px; float: left;"  id="programas"></div>
        <div style="width:43%; height:226px; float: left;"  id="jornadas"></div>
    </div>
    
    

<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('programas', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "NIVEL ACADEMICO"
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
            name: 'CICLO PROFESIONAL',
            y: <?php echo $porcePI?>
        }, {
            name: 'TECNOLOGIA',
            y: <?php echo $porcePTE ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'TECNI PROFESIONAL',
            y: <?php echo $porcePT ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'NO REGISTRA',
            y: <?php echo $porcePNNR ?> ,
            sliced: true,
            selected: true
        }
        ]
    }]
});




Highcharts.chart('jornadas', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "JORNADA"
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
            name: 'MAÑANA',
            y: <?php echo $porcePJM?>
        }, {
            name: 'TARDE',
            y: <?php echo $porcePJT ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'NOCHE',
            y: <?php echo $porcePJN ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'NO REGISTRA',
            y: <?php echo $porcePJNR ?> ,
            sliced: true,
            selected: true
        }

        ]
    }]
});
        </script>   
      <?php require("footer-menu.view.php") ?>
    <?php #require 'piedepagina-admin.php'; ?>

