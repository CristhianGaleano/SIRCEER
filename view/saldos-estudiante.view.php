<?php require "cabecera-admin.php" ?>



<!--Fila para +-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo URL ?>">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Saldos Estudiante</li>
  </ol>
</nav>


<div class="row main_wraper">
    <div class="col-md-10 mt-3">
        <form class="form-inline" id="form-saldo-estudiante">
            <div class="form-group mb-2">
                <label for="docu" class="sr-only">Documento</label>
                <input type="text" readonly class="form-control-plaintext" id="labeldocu" value="Ingrese documento">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="documento" class="sr-only">Documento</label>
                <input type="text" class="form-control" name="documento" id="documento" placeholder="Ingrese documento">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Mostrar saldos</button>
          </form>
          <!--  -->
          <div class="row" id="respuesta">
          <div class="col-md-3 mt-3">
                <label class="form-gorup" for="documento">Documento</label>
                <input class="form-control" type="text" value="1088264375" name="documento" readonly="">
             </div>
             <div class="col-md-4 mt-3">
                <label class="form-gorup" for="nombre">Nombre</label>
                <input class="form-control" type="text" value="Cristhian Alexis Galeano Ruiz" name="nombre" readonly="">
             </div>
             <div class="col-md-3 mt-3">
                <label class="form-gorup" for="saldo">Saldo</label>
                <input class="form-control" type="text" value="1.250.000" name="saldo" readonly="">
             </div>
             <div class="col-md-2 mt-3">
                <label class="form-gorup" for="saldo">Pagar</label>
                <input class="form-control" type="checkbox" value="" name="saldo">
             </div>
          </div>
          <div class="row" id="respuesta">
          <div class="col-md-3 mt-3">
                <label class="form-gorup" for="documento">Documento</label>
                <input class="form-control" type="text" value="1088264375" name="documento" readonly="">
             </div>
             <div class="col-md-4 mt-3">
                <label class="form-gorup" for="nombre">Nombre</label>
                <input class="form-control" type="text" value="Cristhian Alexis Galeano Ruiz" name="nombre" readonly="">
             </div>
             <div class="col-md-3 mt-3">
                <label class="form-gorup" for="saldo">Saldo</label>
                <input class="form-control" type="text" value="1.250.000" name="saldo" readonly="">
             </div>
             <div class="col-md-2 mt-3">
                <label class="form-gorup" for="saldo">Pagar</label>
                <input class="form-control" type="checkbox" value="" name="saldo">
             </div>
          </div>
    </div>
</div><!--row -->

<div class="row main_wraper" id="contenido-saldo">
    
</div>
<!--
</div>-->


<?php require 'piedepagina-admin.php' ?>
<script src="<?php echo URL; ?>js/appsaldos.js"></script>





