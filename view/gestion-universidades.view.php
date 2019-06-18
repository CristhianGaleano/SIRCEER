<?php require 'cabecera-admin.php';?>
<?php include_once 'template-parts/menu-ies.php' ?>          
      

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <div class="wraper-charts">
        

        <div style="width:80%; height:250px;"  id="tipo_universidad"></div>
    </div>


<!--CODIGOS-->
<script type="text/javascript">

Highcharts.chart('tipo_universidad', {
    chart: {
        plotBackgroundColor: "#009E35",
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text:  "Tipo de IES"
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
            name: 'Fundación Universitaria',
            y: <?php echo $porceTUFU ?>,
            sliced: true,
            selected: true
        }, {
            name: 'Centro de Investigación',
            y: <?php echo $porceTUCI ?> ,
            sliced: true,
            selected: true
        },
         {
            name: 'Universidad',
            y: <?php echo $porceTUU ?> ,
            sliced: true,
            selected: true
        },
         {
            name: 'Otra',
            y: <?php echo $porceTUO ?> ,
            sliced: true,
            selected: true
        }

        ]
    }]
});
        </script>   
      <?php require("footer-menu.view.php") ?>


      

    <?php #require 'piedepagina-admin.php'; ?>

