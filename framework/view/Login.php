<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<?=$status?>
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">

    <div class="container">
      <?php 
          if ($error === 'posthuis') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt de verkeerde postcode/huisnummer combinatie ingevuld.
            </div>';
          }
          if ($error === 'wachtwoord') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt het verkeerde wachtwoord ingevuld.
            </div>';
          }
      ?>

      <form class="form-signin" action="/Login/validate" method="POST">
        <h2 class="form-signin-heading">Inloggen</h2>
        <label for="inputPostalCode" class="sr-only">Postcode</label>
        <input type="text" id="inputPostalCode" class="form-control" placeholder="Postcode" name="postalCode" required autofocus>
        <label for="inputHomeNumber" class="sr-only">Huisnummer</label>
        <input type="text" id="inputHomeNumber" class="form-control" placeholder="Huisnummer" name="houseNumber" required autofocus>
        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Onthoud me
          </label>
        </div>
        <a href="?q=Register&error=0" class="btn btn-lg btn-primary btn-block">Registreren</a>  
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
      </form>

    </div> <!-- /container -->
