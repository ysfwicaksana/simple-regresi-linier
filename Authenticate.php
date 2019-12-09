<?php
require ('helpers/PreventInjectionSQL.php');
require ('config/Database.php');

session_start();

if(isset($_POST['do-login'])) {


   $username = preventInjection($_POST['username']);
   $password = preventInjection($_POST['password']);

   $hash = sha1($password);

   //call method open connection
   $connect = openConnection();

   $query = mysqli_query($connect,"select * from users where username = '$username' and password = '$hash'");
   if(mysqli_num_rows($query) == 1) {


     while($obj = mysqli_fetch_object($query)){

        $_SESSION['username'] = $obj->username;
        $_SESSION['isLogin'] = true;
     }

     header('Location:dashboard.php');

   } else {

     // echo "salah";
     $_SESSION['notify'] = 'Username atau Password Salah';
     header('Location:index.php?notify=error');
   }

}
