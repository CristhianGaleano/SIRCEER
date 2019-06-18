<?php require 'cabecera-admin.php'; ?>
<?php include_once 'template-parts/menu-alianzas.php' ?> 

      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>

      

      <!--<div id="container" style="min-width: 310px; height: 400px; max-width: 800px; margin: 0 auto"></div>-->							
      <?php require("footer-menu.view.php") ?>


      <script type="text/javascript">

        Highcharts.chart('container', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'Historico y estimacion estudiantes por genero'
            },
            subtitle: {
                text: 'Source: Gobernacion de Risaralda'
            },
            xAxis: {
                categories: ['2011', '2012', '2013', '2014', '2015', '2016', '2017'],
                tickmarkPlacement: 'on',
                title: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'Percent'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Miles)<br/>',
                split: true
            },
            plotOptions: {
                area: {
                    stacking: 'percent',
                    lineColor: '#ffffff',
                    lineWidth: 1,
                    marker: {
                        lineWidth: 1,
                        lineColor: '#ffffff'
                    }
                }
            },
            series: [{
                name: 'Men',
                data: [502, 635, 809, 947, 1402, 3634, <?php #echo $numMen ?> ]
            }, {
                name: 'Women',
                data: [106, 107, 111, 133, 221, 767, <?php #echo $numWomen ?> ]
            }]
        });
    </script>

    <?php #require 'piedepagina-admin.php'; ?>