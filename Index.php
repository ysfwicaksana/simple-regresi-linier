<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/signin.css">
  <title>Login</title>
</head>
<body class="text-center">
  <form class="form-signin" method="post" action="authenticate.php">
    <img class="mb-4" src="img/bar-chart.svg" alt="" width="72" height="72">
    <h3 class="h3 mb-3 font-weight-normal">Login Simple Regression</h3>
    <?php if (isset($_GET['notify'])) {

        if($_GET['notify'] == 'error') {
          echo "Username atau password salah";
        }

    } ?>

        <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus name="username">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

    <button class="btn btn-sm btn-success btn-block" type="submit" name="do-login">Sign in</button>
    <p class="mt-5 mb-3 text-muted">Copyright (c) <?php echo date('Y') ?> Copyright Holder All Rights Reserved.</p>
  </form>
</body>
</html>
