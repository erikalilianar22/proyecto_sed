<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $cliente = $_POST['cliente'];
  $pago = $_POST['tipo_pago'];
  $suscripcion = $_POST['tipo_suscripcion'];
  $query = "INSERT INTO pago(cliente, tipo_pago, tipo_suscripcion) VALUES ('$cliente', '$pago', '$suscripcion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'El pago se realizo correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
