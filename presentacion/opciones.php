<?php
ob_start();
include_once('includes/header.php');
include_once('../negocio/NOpcion.php');
$opciones = new NOpcion;
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Opciones</h1>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    Agregar
  </div>
  <div class="card-body">
    <!-- Page Heading -->
    <form action="../negocio/NOpcion.php" class="was-validated" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="uname">Nombre Opcion</label>
        <input type="text" class="form-control" id="nombre" placeholder="Enter Date" name="nombre" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>

        
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
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($opciones->getAll() as $opc) : ?>
            <tr>
              <td><?php echo $opc->id?></td>
              <td><?php echo $opc->nombre?></td>
              <td><?php echo $opc->fecha?></td>
              <td>
                
                <a href="../negocio/NOpcion.php?delete_id=<?php echo $opc->id; ?>">Eliminar</a>
                <a href="opciones_edit.php?id_edit=<?php echo $opc->id; ?>">Editar</a> 
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