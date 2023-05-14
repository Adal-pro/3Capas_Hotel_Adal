<?php

ob_start();
include_once('includes/header.php');
include_once('../negocio/NHabitacion.php');
include_once('../negocio/NCategoria.php');
$habitaciones = new NHabitacion;
$categorias = new NCategoria;
foreach ($habitaciones->modificar2($_GET['id_edit']) as $habitacion) : ?>
<?php endforeach;
echo $_GET['id_edit'];

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Habitaciones</h1>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    Actualizar
  </div>
  <div class="card-body">
    <!-- Page Heading -->
    <form action="../negocio/NHabitacion.php?id_edit=<?php echo $_GET['id_edit']; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
      <div class="form-group">

        <label for="uname">Nro habitacion</label>
        <input type="text" class="form-control" id="nroh" placeholder="ingrese dato" value="<?php echo $habitacion->nrohabitacion;?>"name="nroh" required>
        <div class="valid-feedback">Valid.</div>

        <label for="uname">Costo</label>
        <input type="text" class="form-control" id="descripcione" placeholder="ingrese dato" value="<?php echo $habitacion->descripcion;?>"name="descripcione" required>
        <div class="valid-feedback">Valid.</div>
        
        <div class="form-group">
        <label for="estado" class="col-sm-2 control-label">Estado</label>

        <div class="col-sm-8">
          <select class="form-control" name="estadoe" id="estadoe" value="<?php echo $habitacion->estado;?>>
            <option value="">Elija una Estado</option>
            <option value="Disponible">Disponible</option>
            <option value="Ocupado">Ocupado</option>
            <option value="mantenimiento">En mantenimiento</option>
          </select>
        </div>
      </div>

        <div class="form-group">
        <label for="estado" class="col-sm-2 control-label">Categorias</label>

        <div class="col-sm-8">
          <select class="form-control" name="categoriae" id="categoriae" value="<?php echo $habitacion->id_categoria;?>>
            <option value="">Elija una Categoria</option>
            <?php foreach ($categorias->getAll() as $categoria) : ?>
              <option value="<?php echo $categoria->id;?>"><?php echo $categoria->nombrec; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>


        </div>

        <button type="submit" class="btn btn-primary" name="update">Actualizar</button>


      </div>
  </div>
  </form>

  <?php
  include_once('includes/footer.php');

  ?>