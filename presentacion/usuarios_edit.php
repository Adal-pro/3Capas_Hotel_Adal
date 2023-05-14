<?php

ob_start();
include_once('includes/header.php');
include_once('../negocio/NUsuario.php');
$usuarios = new NUsuario;
foreach ($usuarios->modificar2($_GET['id_edit']) as $usuario) : ?>
<?php endforeach;

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">usuarios</h1>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    Editar
  </div>
  <div class="card-body">
    <!-- Page Heading -->
    <form action="../negocio/NUsuario.php?id_edit=<?php echo $_GET['id_edit']; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="uname">Nombre</label>
        <input type="text" class="form-control" id="uname" placeholder="ingrese dato" value="<?php echo $usuario->nombre ?>" name="nombre" required>
        <div class="valid-feedback">Valid.</div>
        
        <label for="uname">ci</label>
        <input type="text" class="form-control" id="ci" placeholder="ingrese dato"value="<?php echo $usuario->ci ?>"  name="ci" required>
        <div class="valid-feedback">Valid.</div>
        
        <label for="uname">telefono</label>
        <input type="text" class="form-control" id="telefono" placeholder="ingrese dato"value="<?php echo $usuario->telefono ?>"  name="telefono" required>
        <div class="valid-feedback">Valid.</div>
        
        
        <label for="uname">Correo</label>
        <input type="text" class="form-control" id="email" placeholder="ingrese correo" value="<?php echo $usuario->email ?>" name="email" required>
        <div class="valid-feedback">Valid.</div>
        

        <button type="submit" class="btn btn-primary" name="update">Actualizar</button>

      </div>

  </div>
</div>

<?php
include_once('includes/footer.php');

?>