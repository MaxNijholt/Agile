<?php include 'inc/header.inc.php'; ?>
	<?php include 'inc/nav.inc.php'; ?>
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
				<h1>Gebruikersprofiel van:  <?php echo var_dump($_SESSION['user']); ?></h1>
			</div>
			<div>
				<form class="form-userdata" action="/Userprofile/update" method="POST">
        			<label for="inputEmail" class="sr-only">E-Mail adres</label>
					<input type="email" name="" placeholder="e-mail" id="inputEmail" class="form-control" value="" required="required" title="">

        			<label for="inputUsername" class="sr-only">Gebruikersnaam</label>
					<input type="text" name="" placeholder="username" id="inputUsername" class="form-control" required="required" title="">

        			<label for="inputPassword" class="sr-only">Wachtwoord</label>
					<input type="password" name="" placeholder="Wachtwoord" id="inputPassword" class="form-control" required="required" title="">
			        
	        	</form>
	        </div>
		</div>
		<footer>
			<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
		</footer>
	</div>
	<!-- /container -->

<?php include 'inc/footer.inc.php'; ?>