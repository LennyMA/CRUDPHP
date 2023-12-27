<?php
if ($_POST) {
  $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
  $telefono = (isset($_POST["telefono"]) ? $_POST["telefono"] : "");
  $fecha = (isset($_POST["fecha"]) ? $_POST["fecha"] : "");

  $stm = $conexion->prepare("INSERT INTO usuarios(nombre, telefono, fecha)
  VALUES(:nombre, :telefono, :fecha)");

  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":telefono", $telefono);
  $stm->bindParam(":fecha", $fecha);

  $stm->execute();

  header("location:index.php");
}
?>
<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <label for="">Nombre:</label>
          <input type="text" name="nombre" id="" class="form-control" placeholder="Ej: Pedro..."><br />
          <label for="">Teléfono:</label>
          <input type="text" name="telefono" id="" class="form-control" placeholder="Ej: 0987654321"><br />
          <label for="">Fecha:</label>
          <input type="date" name="fecha" id="" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>