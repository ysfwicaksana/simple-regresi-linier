<?php

require ('config/Database.php');
require ('helpers/PreventInjectionSQL.php');

session_start();

if(!isset($_SESSION['username'])) {
   header('Location:index.php');
}

$connect = openConnection();

$tahun = preventInjection($_POST['tahun']);
$fakultas = preventInjection($_POST['fakultas']);
$jumlah = preventInjection($_POST['jumlah']);

$check = mysqli_query($connect,"select * from pmb_fakultas where tahun_penerimaan ='$tahun' and fakultas ='$fakultas'");
if(mysqli_num_rows($check) > 0) {
  header("Location:create-pmb.php?notify=error");
} else {

  mysqli_query($connect,"insert into pmb_fakultas (tahun_penerimaan,fakultas,jumlah_pendaftar) values('$tahun','$fakultas','$jumlah')");

  $checkTahun = mysqli_query($connect,"select * from pmb where tahun_penerimaan='$tahun'");

  if(mysqli_num_rows($checkTahun) == 1){

    $jumlaha = mysqli_query($connect,"select jumlah_pendaftar from pmb where tahun_penerimaan ='$tahun'");

    while($jumlah0 = mysqli_fetch_object($jumlaha)){
      $jumlah_asli = $jumlah0->jumlah_pendaftar;
    }

    $rawJumlah = $jumlah + $jumlah_asli;

    mysqli_query($connect,"update pmb set jumlah_pendaftar='$rawJumlah' where tahun_penerimaan='$tahun'");

    // print_r($rawJumlah);

  } else {

    mysqli_query($connect,"insert into pmb (tahun_penerimaan,jumlah_pendaftar) values ('$tahun','$jumlah')");

  }

  header('Location:create-pmb.php');
}
