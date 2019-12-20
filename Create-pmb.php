<?php

require ('config/Database.php');
require ('libraries/RegresiLinier.php');

session_start();

if(!isset($_SESSION['username'])) {
   header('Location:index.php');
}

$connect = openConnection();

// if($tahun = mysqli_query($connect,'select tahun_penerimaan,jumlah_pendaftar from pmb ')){
//   $arrayTahun = array();
//   $arrayJumlah = array();
//   while($obj = mysqli_fetch_object($tahun)){
//
//     array_push($arrayTahun,$obj->tahun_penerimaan);
//     array_push($arrayJumlah,$obj->jumlah_pendaftar);
//
//   }
// }
//
//
// $regresi = new RegresiLinier($arrayTahun, $arrayJumlah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forecasting PMB</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js" ></script>

</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Peramalan PMB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="dashboard.php">Dashboard </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create-pmb.php">Kelola Data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="forecast-pmb.php">Peramalan</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="logout.php">Logout</a>
    </span>
  </div>
</nav>
<div class="jumbotron">
  <h2>Kelola Data</h2>
<hr>
<!-- <p>Tambah Data Jumlah Penerimaan</p> -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Data
</button>

<?php if (isset($_GET['notify'])) {

    if($_GET['notify'] == 'error') {
      echo "<p class='text-danger'>Tahun Penerimaan dan fakultas sudah ada<p>";
    } else if($_GET['notify'] == 'error2'){
      echo "<p class='text-danger'>Tahun Penerimaan atau Jumlah Pendaftar </p>";
    }

} ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tahun Penerimaan</th>
      <th scope="col">Fakultas</th>
      <th scope="col">Jumlah Pendaftar</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $query = mysqli_query($connect,"select * from pmb_fakultas order by id desc");
        $i = 1;

        while($obj = mysqli_fetch_object($query)) {
          ?>

          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $obj->tahun_penerimaan ?></td>
            <td><?php echo $obj->fakultas ?></td>
            <td><?php echo $obj->jumlah_pendaftar ?></td>
            <td><a href="delete-pmb.php?id=<?php echo $obj->id ?>"> Hapus</a></td>
          </tr>

    <?php } ?>


    </tr>
  </tbody>
</table>
</div>

  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="post-pmb.php" method="post">
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Penerimaan</label>
          <div class="col-sm-10">
            <select name="tahun" class="form-control" required>
              <?php for ($i=2000; $i < 2100 ; $i++) { ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?>/<?php echo $i + 1; ?></option>
              <?php  } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas</label>
          <div class="col-sm-10">
            <select class="form-control" name="fakultas">

              <option value="FIKES">FIKES</option>
              <option value="FT">FT</option>
              <option value="FAPERTA">FAPERTA</option>
              <option value="FASILKOM">FASILKOM</option>
              <option value="FEB">FEB</option>
              <option value="FISIP">FISIP</option>
              <option value="FH">FH</option>
              <option value="FKIP">FKIP</option>
              <option value="FAI">FAI</option>
            </select>

          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah Pendaftar</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" name="jumlah" required>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Submit" class="btn btn-success">
      </div>
    </form>

    </div>
  </div>

</div>


</body>
</html>
