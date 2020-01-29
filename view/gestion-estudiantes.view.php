<?php require 'cabecera-admin.php';
require_once '../admin/config.php'; ?>      

      

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <div class="wraper-charts">
        

        <div style="width:50%; height:240px; float: left;"  id="genero"></div>
        <div style="width:50%; height:240px; float: left;"  id="adultos"></div>
        <div style="width:50%; height:240px; float: left;"  id="estudiantes_zona"></div>
        <div style="width:50%; height:240px; float: left;"  id="estrategias"></div>
        <div style="width:50%; height:280px; float: left;"  id="poblacion_prioritaria"></div>
        <!--<div style="width:43%; height:280px; float: left;"  id="desercion"></div> -->
    </div>


<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('genero', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Género"
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
            name: 'Masculino',
            y: <?php echo $porceM ?>
        }, {
            name: 'Femenino',
            y: <?php echo $porceF ?> ,
            sliced: true,
            selected: true
        }]
    }]
});


Highcharts.chart('adultos', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: true,
        type: 'pie'
    },
    title: {
        text:  "Adultos"
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
            name: 'Adultos',
            y: <?php echo $porceMayores ?>
        }, {
            name: 'Menores',
            y: <?php echo $porceMenores ?> ,
            sliced: true,
            selected: true
        }
        ]
    }]
});


Highcharts.chart('estudiantes_zona', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Zona"
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
            name: 'Urbana',
            y: <?php echo $porceZU ?>
        }, {
            name: 'Rural',
            y: <?php echo $porceZR ?> ,
            sliced: true,
            selected: true
        }
        ]
    }]
});


Highcharts.chart('estrategias', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Estrategias"
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
            name: 'Articulados',
            y: <?php echo $porceTEA ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'Ciclo profesional',
            y: <?php echo $porceTETCP ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'Egresados',
            y: <?php echo $porceTEE ?> ,
            sliced: true
        }, {
            name: 'Otro',
            y: <?php echo $porceTEO ?> ,
            sliced: true
        }
        ]
    }]
});

Highcharts.chart('poblacion_prioritaria', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Población prioritaria"
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
            name: 'DISCAPACITADO',
            y: <?php echo $totalSSDIS ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'VICTIMA',
            y: <?php echo $totalSSVIC ?> ,
            sliced: true,
            selected: true
        }, {
            name: 'INDIGENA',
            y: <?php echo $totalSSIND ?> ,
            sliced: true
        },{
            name: 'AFROCOLOMBIANO',
            y: <?php echo $totalSSAFRO ?>,
            sliced: true
        }
        ,{
            name: 'RAIZALES',
            y: <?php echo $totalSSRAI ?>,
            sliced: true
        }
        ,{
            name: 'ROM',
            y: <?php echo $totalSSROM ?>,
            sliced: true
        }
        ,{
            name: 'MUJER CABEZA DE HOGAR',
            y: <?php echo $totalSSMCH ?>,
            sliced: true
        }
        ,{
            name: 'LGTBI',
            y: <?php echo $totalSSLGTBI ?>,
            sliced: true
        }
        ,{
            name: 'REINTEGRADOS',
            y: <?php echo $totalSSREI ?>,
            sliced: true
        }
        ,{
            name: 'MIGRANTES',
            y: <?php echo $totalSSMIG ?>,
            sliced: true
        }
        ,{
            name: 'OTRA',
            y: <?php echo $totalSSOTR ?>,
            sliced: true
        }
        ]
    }]
});


        </script>   
      <?php require("footer-menu.view.php") ?>


      

    <?php #require 'piedepagina-admin.php'; ?>

