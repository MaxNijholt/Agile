<?php include 'inc/header.inc.php'; ?>
	<?php include 'inc/nav.inc.php'; ?>
	<div class="container">
		<div class="row">
			<div class="page-header">
				<h1>Gebruikersprofiel van:  <?php echo var_dump($_SESSION['user']); ?></h1>
			</div>
			<div>
				<form class="form-userdata" action="/Login/validate" method="POST">
			        <h2 class="form-userdata-heading">Wijzigen gevens</h2>
			        <label for="inputPostalCode" class="sr-only">Postcode</label>
	        		<input type="text" id="inputPostalCode" class="form-control" placeholder="postcode" name="postalCode" required autofocus>
			        <label for="inputPassword" class="sr-only">Wachtwoord</label>
        			<input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" name="password" required>
	        	</form>
	        </div>
		</div>
		<footer>
			<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
		</footer>
	</div>
	<!-- /container -->

<?php include 'inc/footer.inc.php'; ?>