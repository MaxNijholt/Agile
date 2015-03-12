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
    <?php
        if ($_GET['error'] === 'postcode') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt een postcode ingevuld die niet in ons systeem voorkomt
            </div>';            
        }
        if ($_GET['error'] === 'huisnummer') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt een huisnummer ingevoerd wat niet bij de postcode hoort
            </div>';            
        }
        if ($_GET['error'] === 'email') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> De 2 ingevoerde email adressen komen niet overeen
            </div>';            
        }

     ?>

      <form class="form-signin" action="controller/registratiecontroller.php" method="POST">
        <h2 class="form-signin-heading">Registratie</h2>
        <label for="inputPostalCode" class="sr-only">Postcode</label>
        <input type="text" name="inputPostalCode" id="inputPostalCode" class="form-control" placeholder="Postcode" required autofocus>
        <label for="inputHomeNumber" class="sr-only">Huisnummer</label>
        <input type="text" name="inputHomeNumber" id="inputHomeNumber" class="form-control" placeholder="Huisnummer" required autofocus>
        <br />
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
        <br />
        <label for="inputEmail" class="sr-only">E-mail adres</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="E-mail adres" required autofocus>
        <label for="inputEmailConfirm" class="sr-only">Bevestig E-mail adres</label>
        <input type="email" name="inputEmailConfirm"  id="inputEmailConfirm" class="form-control" placeholder="E-mail adres bevestigen" required autofocus>
        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registreren</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
