<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="cliente" class="form-control" placeholder="Nombre Cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="number" name="tipo_pago" class="form-control" placeholder="cantidad">
          </div>
          <div class="form-group">
            <textarea name="tipo_suscripcion" rows="2" class="form-control" placeholder="Descripcion"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Pagar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Cliente</th>
            <th>Pago</th>
            <th>Suscripcion</th>
            <th>Fecha</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM pago";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['cliente']; ?></td>
            <td><?php echo $row['tipo_pago']; ?></td>
            <td><?php echo $row['tipo_suscripcion']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
