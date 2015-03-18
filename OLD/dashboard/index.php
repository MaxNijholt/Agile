<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <?php include '../inc/header.inc.php'; ?>

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

    <?php 
        if (isset($_GET['error'])) {
          if ($_GET['error'] === 'email') {
            echo '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt het verkeerde e-mail adres ingevuld.
            </div>';
          }
          if ($_GET['error'] === 'wachtwoord') {
            echo '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt het verkeerde wachtwoord ingevuld.
            </div>';
          }
        }
      ?>

      <form class="form-signin" action="./validate-admin-login.php" method="POST">
        <h2 class="form-signin-heading">Inloggen</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="inputEmail" id="inputUsername" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Onthoud me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

