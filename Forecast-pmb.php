<?php

require ('config/Database.php');
require ('libraries/RegresiLinier.php');
require ('helpers/PreventInjectionSQL.php');

session_start();

if(!isset($_SESSION['username'])) {
   header('Location:index.php');
}

$connect = openConnection();

if($tahun = mysqli_query($connect,'select tahun_penerimaan,jumlah_pendaftar from pmb')){
  $arrayTahun = array();
  $arrayJumlah = array();
  while($obj = mysqli_fetch_object($tahun)){

    array_push($arrayTahun,$obj->tahun_penerimaan);
    array_push($arrayJumlah,$obj->jumlah_pendaftar);

  }
}


$regresi = new RegresiLinier($arrayTahun, $arrayJumlah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forecasting PMB</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >

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
        <a class="nav-link" href="create-pmb.php">Tambah Data</a>
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
  <h2>Peramalan</h2>
 <hr>
 <p>Lakukan Peramalan PMB</p>
 <form class="form-inline" action="forecasting.php" method="post">
   <label class="sr-only" for="inlineFormInputName2">Name</label>
   <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="tahun" placeholder="Masukkan Tahun Peramalan" required>

   <button type="submit" class="btn btn-primary mb-2">Submit</button>
 </form>


</div>
  </div>
</body>
</html>
