<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <?php include 'inc/header.inc.php'; ?>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="/../index.php" method="POST">
        <h2 class="form-signin-heading">Inloggen</h2>
        <label for="inputPostalCode" class="sr-only">Postcode</label>
        <input type="email" id="inputPostalCode" class="form-control" placeholder="Postcode" required autofocus>
        <label for="inputHomeNumber" class="sr-only">Huisnummer</label>
        <input type="email" id="inputHomeNumber" class="form-control" placeholder="Huisnummer" required autofocus>
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Onthoud me
          </label>
        </div>
        <a href="registreren.php?error=0" class="btn btn-lg btn-primary btn-block">Registreren</a>  
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

