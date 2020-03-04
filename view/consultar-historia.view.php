<?php require("cabecera-admin.php") ?>








<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
 
   <li class="nav-item ">
    <a class="nav-link active" href="../gestion/consultar-historia-aca.php">Historial <span class="badge badge-light">4</span></a>
  </li>
  
</ul>

  
 
      <div class="row main_wraper">
        <div class="col-12">
          <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST" >
              <div class="form-row align-items-center">
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInput">Documento</label>
                  <input type="text" class="form-control mb-2" name="documento" id="inlineFormInput" placeholder="Documento">
                </div>

                 <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                </div>
              </div>
          </form>

        </div>
      

      <div class="row main_wraper">
          <div class="col-4">
              <p>Documento</p>
              <p>1088264375</p>
          </div>
          <div class="col-4">
              <p>Nombre</p>
              <p>Cristhian Alexis </p>
          </div>
      </div>
      <div class="row main_wraper">
          <div class="col-12">
            <a href="#" class="btn btn-info">Descargar</a>
          </div>
      </div>
    </div>
</div><!---End tabs-->










<?php require 'piedepagina-admin.php' ?>



