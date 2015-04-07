<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>




<div class="container">

    <?php 
        if (isset($error)) {
          if ($error === 'gebruikersnaam') {
            echo '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt de verkeerde gebruikersnaam ingevuld.
            </div>';
          }
          if ($error === 'wachtwoord') {
            echo '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt het verkeerde wachtwoord ingevuld.
            </div>';
          }
        }
      ?>

      <form class="form-signin" action="/Adminlogin/validateLogin" method="POST">
        <h2 class="form-signin-heading">Inloggen</h2>
        <label for="inputUsername" class="sr-only">Gebruikersnaam</label>
        <input type="text" name="inputUsername" id="inputUsername" class="form-control" placeholder="Gebruikersnaam" required autofocus>
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Onthoud me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
      </form>

</div> 


</body>
</html>