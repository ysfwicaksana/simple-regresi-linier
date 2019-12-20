<?php

require ('config/Database.php');

session_start();

if(!isset($_SESSION['username'])) {
   header('Location:index.php');
}

$connect = openConnection();

$id = $_GET['id'];

if (mysqli_query($connect,"delete from pmb_fakultas where id='$id'")) {
   header('Location:create-pmb.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>
