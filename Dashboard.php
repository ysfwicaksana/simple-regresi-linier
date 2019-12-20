<?php

require ('config/Database.php');
require ('libraries/RegresiLinier.php');

error_reporting(0);

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
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/Chart.min.js"></script>
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
  <h2>Dashboard</h2>
 <hr>
 <p>Grafik Regresi Linier PMB</p>
  <canvas id="graph" width=500 height="150"></canvas>
  <script>
      ctx = document.getElementById('graph');
      var chart = new Chart(ctx, {
          type : 'line',
          data: {
              labels: [<?=implode(",",$arrayTahun)?>],
              datasets: [
                  {
                  label: 'Realisasi Kehadiran',
                  data: [<?=implode(",", $arrayJumlah)?>],
                  backgroundColor: 'rgba(12, 199, 132, 0.2)',
                  borderWidth: 1
                  },
                  {
                  label: 'Regresi Linier',
                  data: [<?=implode(",", $regresi->all)?>],
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderWidth: 1
                  },
              ]
          }
      });
  </script>
</div>
  </div>
</body>
</html>
