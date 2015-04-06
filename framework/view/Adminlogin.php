<div class="container" style="width: 20%">

    <?php 
        if (isset($_GET['error'])) {
          if ($_GET['error'] === 'gebruikersnaam') {
            echo '<div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Je hebt de verkeerde gebruikersnaam ingevuld.
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