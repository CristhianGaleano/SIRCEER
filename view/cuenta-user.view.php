<?php require 'header.view.php' ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container wrap-form-acount-user">
    <h1 class="display-4">Configurando cuenta</h1>
    <p class="lead">Diligencie el formulario</p>

	<form name="form-edit-cuenta-user" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id ?>">
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" name="codigo" id="codigo" aria-describedby="emailHelp" value="<?php echo $_SESSION['usuario']['codigo']?>">
    <small id="emailHelp" class="form-text text-muted">Ingrese su nuevo codigo de identificacion de usuario</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Clave</label>
    <input type="text" class="form-control" name="clave" id="exampleInputPassword1" value="<?php echo $_SESSION['usuario']['clave']?>">
  </div>
  <div class="form-group">
    <label for="imgagen">Imagen de cuenta</label>
    <input type="file" class="form-control" name="imagen" id="imgagen">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div class="form-group">
   <?php if ($success) {
    echo '<div class="alert alert-success" role="alert">
  Success! </div>';
  }?>
</div>

  </div>
</div>
<?php require 'pie.view.php' ?>