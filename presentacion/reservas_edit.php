<?php

ob_start();
include_once('includes/header.php');
include_once('../negocio/NReserva.php');
include_once('../negocio/NHabitacion.php');
include_once('../negocio/NUsuario.php');
$reservas = new NReserva;
$habitaciones = new NHabitacion;
$usuarios = new NUsuario;
foreach ($reservas->modificar2($_GET['id_edit']) as $reserva) : ?>
<?php endforeach;


?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Reservas</h1>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    Actulizar
  </div>
  <div class="card-body">
    <!-- Page Heading -->
    <form action="../negocio/NReserva.php?id_edit=<?php echo $_GET['id_edit']; ?>" class="was-validated" method="POST" enctype="multipart/form-data">
      <div class="form-group">

        <label for="uname">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" placeholder="ingrese dato" value="<?php echo $reserva->descripcion_reserva;?>"name="descripcion" required>
        <div class="valid-feedback">Valid.</div>

        <div class="form-group">
          <label for="estado" class="col-sm-2 control-label">Habitacion</label>
          <div class="col-sm-8">
            <select class="form-control" name="habitacion" id="habitacion" value="<?php echo $reserva->id_habitacion;?>>
              <option value="">Elija un Habitacion</option>
              <?php foreach ($habitaciones->getAll() as $habitacion) : ?>
                <option value="<?php echo $habitacion->id; ?>"><?php echo $habitacion->nrohabitacion;?></option>
              <?php endforeach; ?>
            </select>
          </div>


        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label>Fecha Ingreso</label>
            <input pattern="[0-9+-/.]{1,15}" class="form-control" type="date" value="<?php echo $reserva->fecha_ingreso?>"name="fechai" maxlength="15">
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group label-floating">
            <label>Fecha de Salida</label>
            <input pattern="[0-9+-/.]{1,15}" class="form-control" type="date" value="<?php echo $reserva->fecha_salida?>"name="fechas" maxlength="15">
          </div>
        </div>


        <button type="submit" class="btn btn-primary" name="update">Actualizar</button>


      </div>
  </div>
  </form>

  <?php
  include_once('includes/footer.php');

  ?>