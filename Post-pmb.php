<?php

require ('config/Database.php');
require ('helpers/PreventInjectionSQL.php');

session_start();

if(!isset($_SESSION['username'])) {
   header('Location:index.php');
}

$connect = openConnection();

$tahun = preventInjection($_POST['tahun']);
$jumlah = preventInjection($_POST['jumlah']);



$check = mysqli_query($connect,"select * from pmb where tahun_penerimaan ='$tahun'");
if(mysqli_num_rows($check) > 0) {
  header("Location:create-pmb.php?notify=error");
} else {
  mysqli_query($connect,"insert into pmb (tahun_penerimaan,jumlah_pendaftar) values('$tahun','$jumlah')");
  header('Location:create-pmb.php');

}

// if($tahun = mysqli_query($connect,'select tahun_penerimaan,jumlah_pendaftar from pmb')){
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
