<?php

ob_start();
include_once('includes/header.php');
include_once('../negocio/NOpcion.php');
$opciones = new NOpcion;
foreach($opciones->modificar2($_GET['id_edit']) as $opc): ?>
<?php endforeach;

?>  
    <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Editar Opciones</h1>
          </div>
          <div class="card shadow mb-4">
        <div class="card-header py-3">
        Editar
        </div>
        <div class="card-body">
             <!-- Page Heading -->
          <form action="../negocio/NOpcion.php?id_edit=<?php echo $_GET['id_edit']; ?>" class="was-validated" method = "POST" enctype="multipart/form-data" >

          <div class="form-group">
                <label for="uname">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder= "Enter nombre" value="<?php echo $opc->nombre;?>" name="nombre" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            
            </div>
           

  <button type="submit" class="btn btn-primary" name="update">Actualizar</button>

</div>
</div>

<?php
include_once('includes/footer.php');

?>
