<?php
include("../../conexion.php");
include("../../template/header.php");

if (isset($_GET["id"])) {
  $txtid = (isset($_GET["id"]) ? $_GET["id"] : "");
  $stm = $conexion->prepare("SELECT * FROM usuarios WHERE id=:$txtid");
  $stm->bindParam(":$txtid", $txtid);
  $stm->execute();
  $registro = $stm->fetch(PDO::FETCH_LAZY);
  $nombre = $registro["nombre"];
  $telefono = $registro["telefono"];
  $fecha = $registro["fecha"];
}

if ($_POST) {
  $txtid = (isset($_POST["txtid"]) ? $_POST["txtid"] : "");
  $nombre = (isset($_POST["nombre"]) ? $_POST["nombre"] : "");
  $telefono = (isset($_POST["telefono"]) ? $_POST["telefono"] : "");
  $fecha = (isset($_POST["fecha"]) ? $_POST["fecha"] : "");

  $stm = $conexion->prepare("UPDATE usuarios SET nombre=:nombre, telefono=:telefono, fecha=:fecha WHERE id=:txtid");

  $stm->bindParam(":nombre", $nombre);
  $stm->bindParam(":telefono", $telefono);
  $stm->bindParam(":fecha", $fecha);
  $stm->bindParam(":txtid", $txtid);

  $stm->execute();

  header("location:index.php");
}

?>

<form action="" method="post">
  <div>
    <input type="hidden" name="txtid" id="" class="form-control" value="<?php echo $txtid; ?>">
    <label for="">Nombre:</label>
    <input type="text" name="nombre" id="" class="form-control" placeholder="Ej: Pedro..." value="<?php echo $nombre; ?>"><br />
    <label for="">Teléfono:</label>
    <input type="text" name="telefono" id="" class="form-control" placeholder="Ej: 0987654321" value="<?php echo $telefono; ?>"><br />
    <label for="">Fecha:</label>
    <input type="date" name="fecha" id="" class="form-control" value="<?php echo $fecha; ?>">
  </div>
  <div class="modal-footer">
    <a href="index.php" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</form>
<?php
include("../../template/footer.php");
?>