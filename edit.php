<?php
include("db.php");
$cliente = '';
$pago = ' ';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM pago WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $cliente = $row['cliente'];
    $pago = $row['tipo_pago'];
    $descripcion = $row['tipo_suscripcion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $cliente= $_POST['cliente'];
  $pago= $_POST['tipo_pago'];
  $descripcion = $_POST['tipo_suscripcion'];

  $query = "UPDATE pago set cliente = '$cliente', tipo_pago = '$pago', tipo_suscripcion = '$descripcion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'El pago fue actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="cliente" type="text" class="form-control" value="<?php echo $cliente; ?>" placeholder="Actualizar CLiente">
        </div>
        <div class="form-group">
          <input type="number" name="tipo_pago" class="form-control" value="<?php echo $pago; ?>" placeholder="Actualizar Cantidad">
        </div>
        <div class="form-group">
        <textarea name="tipo_suscripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
