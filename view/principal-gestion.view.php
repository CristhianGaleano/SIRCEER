<?php require'cabecera-admin.php' ?>
<?php include_once 'template-parts/menu-dashboard.php' ?>
<div class="background">

    <div class="wraper_esta_pri wraper-estudiantes"> 
        <span class="icon icon-user"></span>
    	<p>Estudiantes</p> <br> <p style="color: #fff; font-size: 2.5em; font-weight: 800;" class="odometer" id="odometerE"></p> 
    </div>
    <div class="wraper_esta_pri wraper-programas">
       <span class="icon icon-books"></span>
        <p>Programas</p> <br> <p style="color: #fff; font-size: 2.5em; font-weight: 800;" class="odometer" id="odometerP"></p>
    </div>
    <div class="wraper_esta_pri wraper-sedes"> 
        <span class="icon icon-user"></span>
    	<p>Instituciones Edu. (sedes)</p> <br> <p style="color: #fff; font-size: 2.5em; font-weight: 800;" class="odometer" id="odometerI"></p> 
    </div>
    <div class="wraper_esta_pri wraper-alianzas"> 
        <span class="icon icon-bookmarks"></span>
    	<p>Alianzas</p> <br> <p style="color: #fff; font-size: 2.5em; font-weight: 800;" class="odometer" id="odometerA"></p> 
    </div>
    <div class="wraper_esta_pri wraper-IES"> 
        <span class="icon icon-library"></span>
        <p>Universidades</p> <br> <p style="color: #fff; font-size: 2.5em; font-weight: 800;" class="odometer" id="odometerU"></p> 
    </div>

</div>
<script>
setTimeout(function(){
 odometerE.innerHTML = <?php echo $totalE ?>;
 odometerP.innerHTML = <?php echo $totalP ?>;
 odometerI.innerHTML = <?php echo $totalI ?>;
 odometerA.innerHTML = <?php echo $totalA ?>;
 odometerU.innerHTML = <?php echo $totalU ?>;

}, 600);

</script>

<?php require 'piedepagina-admin.php' ?>

	