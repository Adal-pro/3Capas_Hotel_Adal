<?php
ob_start();
include_once('includes/header.php');
include_once('../negocio/NHabitacion.php');
include_once('../negocio/NCategoria.php');
$habitaciones = new NHabitacion;
$categorias = new NCategoria;
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Habitaciones</h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    Agregar
  </div>
  <div class="card-body">
    <!-- Page Heading -->
    <form action="../negocio/NHabitacion.php" class="was-validated" method="POST" enctype="multipart/form-data">

      <div class="form-group">

        <label for="uname">Nro Habitacion</label>
        <input type="text" class="form-control" id="nro" placeholder="Enter date" name="nro" required>
        <div class="valid-feedback">Valid.</div>


        <label for="uname">Costo</label>
        <input type="text" class="form-control" id="descripcion" placeholder="Enter date" name="descripcion" required>
        <div class="valid-feedback">Valid.</div>

      </div>
      <div class="form-group">
        <label for="estado" class="col-sm-2 control-label">Estado</label>

        <div class="col-sm-8">
          <select class="form-control" name="estado" id="estado">
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
          <select class="form-control" name="categoria" id="categoria">
            <option value="">Elija una Categoria</option>
            <?php foreach ($categorias->getAll() as $categoria) : ?>
              <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombrec; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

  </div>
</div>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nro</th>
            <th>Estado</th>
            <th>Costo</th>
            <th>fecha</th>
            <th>Categoria</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($habitaciones->lista() as $habitacion) : ?>

            <tr>
              <td><?php echo $habitacion->nrohabitacion ?></td>
              <td><?php echo $habitacion->estado ?></td>
              <td><?php echo $habitacion->descripcion ?></td>
              <td><?php echo $habitacion->fecha_h?></td>
              <td><?php echo $habitacion->nombrec?></td>
  
              <td>

                <a href="../negocio/NHabitacion.php?delete_id=<?php echo $habitacion->id; ?>">Eliminar</a>
                <a href="habitacion_edit.php?id_edit=<?php echo $habitacion->id; ?>">Editar</a> 

              </td>
            </tr>
          <?php endforeach; ?>
          <tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- End of datatable -->

<?php
include_once('includes/footer.php');
?>