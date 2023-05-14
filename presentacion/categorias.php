<?php
include_once('includes/header.php');
include_once('../negocio/NCategoria.php');
include_once('../negocio/NOpcion.php');
$categorias = new NCategoria;
$opciones = new NOpcion;
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    Agregar
  </div>
  <div class="card-body">
    <!-- Page Heading -->

    <form action="../negocio/NCategoria.php" class="was-validated" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="uname">Nombre</label>
        <input type="text" class="form-control" id="uname" placeholder="Ingrese Dato" name="nombrec" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
        <label for="uname">Descripcion</label>
        <input type="text" class="form-control" id="uname" placeholder="Ingrese Dato" name="descripcion" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="table-rep-plugin">
        <div class="table-responsive" data-pattern="priority-columns">
          <table id="tech-companies-1" class="table  table-striped">
            <thead>
              <tr>
                <th data-priority="1">check</th>
                <th data-priority="3">Opciones Categoria</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($opciones->getAll() as $opc) : ?>
                <tr>
                  <td>
                    <input class="form-check-input" type="checkbox" name="opciones[]" id="[]" value="<?php echo $opc->id; ?>">
                  </td>

                  <td><?php echo $opc->nombre; ?></td>
                </tr> 

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
</div>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTable</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Opcion</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($categorias->Lista() as $categoria) : ?>
            <tr>
              <td><?php echo $categoria->id ?></td>
              <td><?php echo $categoria->nombrec ?></td>
              <td><?php echo $categoria->descripcion ?></td>
              <td><?php echo $categoria->nombre ?></td>
              <td>

                <a href="../negocio/NCategoria.php?delete_idc=<?php echo $categoria->id; ?>">Eliminar</a>
                <a href="usuarios_edit.php?usuario=<?php echo $categoria->id; ?>">Editar</a>

              </td>
            </tr>
          <?php endforeach; ?>
          <tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
include_once('includes/footer.php');
?>