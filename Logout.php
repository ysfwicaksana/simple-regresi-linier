<?php

session_destroy();
unset($_SESSION['username']);
unset($_SESSION['isLogin']);
header('Location:index.php');
 ?>
