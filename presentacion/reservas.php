<?php
ob_start();
include_once('includes/header.php');
include_once('../negocio/NReserva.php');
include_once('../negocio/NHabitacion.php');
include_once('../negocio/NUsuario.php');
$reservas = new NReserva;
$habitaciones = new NHabitacion;
$usuarios = new NUsuario;
// print_r($reservas->lista())
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Reservas</h1>
</div>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    Agregar
  </div>
  <div class="card-body">
    <!-- Page Heading -->
    <form action="../negocio/NReserva.php" class="was-validated" method="POST" enctype="multipart/form-data">
      <div class="form-group">
      
        <label for="uname">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" placeholder="ingrese dato" name="descripcion" required>
        <div class="valid-feedback">Valid.</div>
        
        <div class="form-group">
        <label for="estado" class="col-sm-2 control-label">Cliente</label>
        <div class="col-sm-8">
          <select class="form-control" name="usuario" id="usuario">
            <option value="">Elija un Cliente</option>
            <?php foreach ($usuarios->getAll() as $usuario) : ?>
              <option value="<?php echo $usuario->id_u; ?>"><?php echo $usuario->nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
        <label for="estado" class="col-sm-2 control-label">Habitacion</label>
        <div class="col-sm-8">
          <select class="form-control" name="habitacion" id="habitacion">
            <option value="">Elija un Habitacion</option>
            <?php foreach ($habitaciones->getAll() as $habitacion) : ?>
              <option value="<?php echo $habitacion->id; ?>"><?php echo $habitacion->nrohabitacion; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label>Fecha Ingreso</label>
									<input pattern="[0-9+-/.]{1,15}" class="form-control" type="date" name="fechai" maxlength="15">
								</div>
			</div>
      <div class="col-xs-12 col-sm-6">
				<div class="form-group label-floating">
					<label>Fecha de Salida</label>
					<input pattern="[0-9+-/.]{1,15}" class="form-control" type="date" name="fechas" maxlength="15">
				</div>
			</div>
        

        <button type="submit" class="btn btn-primary">Guardar</button>

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
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Habitacion</th>
              <th>Huesped</th>
              <th>Fecha_ingreso</th>
              <th>Fecha_salida</th>
              <th>Fecha_reserva</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($reservas->lista() as $res) : ?>
              <tr>
                <td><?php echo $res->id_reserva?></td>
                <td><?php echo $res->descripcion_reserva?></td>
                <td><?php echo $res->nrohabitacion?></td>
                <td><?php echo $res->nombre?></td>
                <td><?php echo $res->fecha_ingreso?></td>
                <td><?php echo $res->fecha_salida?></td>
                <td><?php echo $res->fecha_reserva?></td>
                <td>

                  <a href="../negocio/NReserva.php?delete_id=<?php echo $res->id_reserva; ?>">Eliminar</a>
                  <a href="reservas_edit.php?id_edit=<?php echo $res->id_reserva; ?>">Editar</a>

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