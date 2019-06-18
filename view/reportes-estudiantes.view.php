<?php require("cabecera-admin.php") ?>
<?php include_once "template-parts/menu-estudiantes.php" ?>      
<!--CONTENIDO-->

  <div class="wraper">

   <div class="wra_titulo">
    <h1>AREA DE REPORTES</h1>
  </div>

<!--GENERO-->
    <div class="wraper-contenido">

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<table>
  <tr>
    <td>
      <label for="genero">Genero</label>
    </td>
    <td>
      <select style="width: 200px" name="genero" id="">
            <option value="">Seleccione una opción</option>
            <option value="FEMENINO">FEMENINO</option>
            <option value="MASCULINO">MASCULINO</option>
        </select>
    </td>
    <td>
      <label for="institucion">Institucion</label>
    </td>
    <td>
      <select style="width: 200px" name="institucion" id="">
            <option value="">Seleccione una opción</option>
          <?php foreach ($sedes as $value): ?>
          <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
        <?php endforeach ?>
        </select>
    </td>
      
      <td>
        <input type="submit" name="genero_post" value="Generar">
      </td>
    </tr>

</table>

      </form>

  </div>


<!--ZONAS-->
<div class="wraper-contenido">

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<table>
  <tr>
    <td>
      <label for="zona">Zona</label>
    </td>
    <td>
      <select style="width: 200px" name="zona" id="">
            <option value="">Seleccione una opción</option>
          <?php foreach ($zonas as $value): ?>
          <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
        <?php endforeach ?>
        </select>
    </td>
    <td>
      <label for="institucion">Institucion</label>
    </td>
    <td>
      <select style="width: 200px" name="institucion" id="">
            <option value="">Seleccione una opción</option>
          <?php foreach ($sedes as $value): ?>
          <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
        <?php endforeach ?>
        </select>
    </td>
      <td></td>
      <td>
        <input type="submit" name="zona_post" value="Generar">
      </td>
    </tr>

</table>

      </form>

  </div>



<!--EDADES-->
<div class="wraper-contenido">

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<table>
  <tr>
    <td>
      <label for="edad">Edades</label>
    </td>
    <td>
      <input type="number" min="10" max="28" name="desde" placeholder="Minima">
      <input type="number" min="10" max="28" name="hasta" placeholder="Maxima">
    </td>
    <td>
      <label for="institucion">Institucion</label>
    </td>
    <td>
      <select style="width: 200px" name="institucion" id="">
            <option value="">Seleccione una opción</option>
          <?php foreach ($sedes as $value): ?>
          <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
        <?php endforeach ?>
        </select>
    </td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <input type="submit" name="edad_post" value="Generar">
      </td>
    </tr>

</table>

      </form>

  </div>


  <div class="wraper-contenido">

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<table>
  <tr>
    <td>
      <label for="genero">Saldo estudiante</label>
    </td>
    <td>
      <input type="text" name="documento" placeholder="Documento del estudiante">
    </td>
    <td>
      <label for="institucion">Institucion</label>
    </td>
    <td>
      <select style="width: 200px" name="institucion" id="">
            <option value="">Seleccione una opción</option>
          <?php foreach ($sedes as $value): ?>
          <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?></option>
        <?php endforeach ?>
        </select>
    </td>
      
      <td>
        <input type="submit" name="genero_post" value="Generar">
      </td>
    </tr>

</table>

      </form>

  </div>


</div><!---->
              
  <!--END CONTENIDO-->
<?php require("footer-menu.view.php") ?>          
<?php require("piedepagina-admin.php") ?>
<?php

?>