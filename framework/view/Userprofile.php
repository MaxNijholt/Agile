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
	<div class="row">
		<div class="page-header">
			<h1>Gebruikersprofiel van: <?php echo $user->firstname." ".$user->lastname; ?></h1>
		</div>
		<div>
			<form class="form-userdata" action="/Userprofile/update" method="POST">
    			<label for="inputVoornaam" class="sr-only">Voornaam</label>
				<input type="text" name="" placeholder=<?php echo $user->firstname; ?> id="inputVoornaam" class="form-control" required="required" title="">

				<label for="inputAchternaam" class="sr-only">Achternaam</label>
				<input type="text" name="" placeholder=<?php echo $user->lastname; ?> id="inputVoornaam" class="form-control" required="required" title="">

				<label for="inputEmail" class="sr-only">E-Mail adres</label>
				<input type="email" name="" placeholder=<?php echo $user->email; ?> id="inputEmail" class="form-control" value="" required="required" title="">

    			<label for="inputPassword" class="sr-only">Wachtwoord</label>
				<input type="password" name="" placeholder="Wachtwoord" id="inputPassword" class="form-control" required="required" title="">
        	</form>
        </div>
	</div>
	<footer>
		<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
	</footer>
</div>