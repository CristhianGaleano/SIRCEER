<?php require 'cabecera-admin.php';
require_once '../admin/config.php'; ?>      
<?php include_once "template-parts/menu-institucion.php" ?>
      

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div class="wraper-charts">
        

        <div style="width:43%; height:226px; float: left;"  id="sector"></div>
        <div style="width:43%; height:226px; float: left;"  id="calendario"></div>
        <div style="width:43%; height:226px; float: left;"  id="zona"></div>
        <!--<div style="width:43%; height:226px; float: left;"  id="estudiantes_victimas_conflicto"></div>
        <div style="width:43%; height:222px; float: left;"  id="estudiantes_menores_mayores_edad"></div>-->
    </div>


<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('sector', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "SECTORES"
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
            name: 'OFICIAL',
            y: <?php echo $porceISO ?>
        }, {
            name: 'NO OFICIAL',
            y: <?php echo $porceISNO ?> ,
            sliced: true,
            selected: true
        }]
    }]
});



Highcharts.chart('calendario', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "CALENDARIO"
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
            name: 'A',
            y: <?php echo $porceIA ?>
        }, {
            name: 'B',
            y: <?php echo $porceIB ?> ,
            sliced: true,
            selected: true
        }
        ]
    }]
});






Highcharts.chart('zona', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: true,
        type: 'pie'
    },
    title: {
        text:  "ZONA"
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
            name: 'Rural',
            y: <?php echo $porceZR ?>
        }, {
            name: 'Urbana',
            y: <?php echo $porceZU ?> ,
            sliced: true,
            selected: true
        }
        ]
    }]
});

        </script>   
      <?php require("footer-menu.view.php") ?>


      

    <?php #require 'piedepagina-admin.php'; ?>

