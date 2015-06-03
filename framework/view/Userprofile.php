<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript">
		function checkPass()
		{	
			var password = $("#inputPassword").val();
    		var confirmPassword = $("#inputPasswordConfirm").val();

			if (password != confirmPassword)
        		$("#passerror").removeAttr("style");
    		else
        		$("#passerror").css('display', 'none');
			}
		}  
	</script>
<div class="container">
	<?php 
      	if ($error === 'mail') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Er klopt iets niet met de mailadressen.
            </div>';
      	}
      	if ($error === 'pass') {
            echo '<div class="alert alert-warning" style="margin-top:-50px;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error!</strong> Er is iets fout met de wachtwoorden.
        	</div>';
      	}
  	?>
	<div class="row">
		<div>
			<form class="form-userdata" action="/Userprofile/update" method="POST">
				<h2 class="form-signin-heading">Gebruikersprofiel van: <?php echo $user->firstname." ".$user->lastname; ?></h2>
				<h3 class="form-signin-heading"><?php echo $user->postalcode." op ".$user->housenumber; ?></h3>
    			<label for="inputVoornaam" class="sr-only">Voornaam</label>
				<input type="text" name="inputFirstName" placeholder="<?php echo $user->firstname; ?>" id="inputFirstname" class="form-control" required="required" title="">

				<label for="inputAchternaam" class="sr-only">Achternaam</label>
				<input type="text" name="inputLastName" placeholder="<?php echo $user->lastname; ?>" id="inputLastname" class="form-control" required="required" title="">

				<label for="inputEmail" class="sr-only">E-Mail adres</label>
				<input type="email" name="inputEMail" placeholder="<?php echo $user->email; ?>" id="inputEmail" class="form-control" value="" required="required" title="">
				<label for="inputEmailConfirm" class="sr-only">E-Mail adres bevestiging</label>
				<input type="email" name="inputEMailConfirm" placeholder="E-Mail bevestiging" id="inputEmailConfirm" class="form-control" value="" required="required" title="">

    			<label for="inputPassword" class="sr-only">Wachtwoord</label>
				<input type="password" name="inputPassword" placeholder="Wachtwoord" id="inputPassword" class="form-control" required="required" title="">
        		<label for="inputPasswordConfirm" class="sr-only">Bevestig wachtwoord</label>
				<input type="password" name="inputPasswordConfirm" placeholder="Wachtwoord bevestiging" id="inputPasswordConfirm" class="form-control" required="required" title="" onchange="checkPass();">
        		<div id="passerror" class="alert alert-warning" style="display:none;">
            	<a href="#" class="close" data-dismiss="alert">&times;</a>
            	<strong>Error!</strong> Wachtwoorden komen niet overeen.
        	</div>
        	<button type="submit" class="btn btn-default">Wijzigingen opslaan</button>
        	</form>
        </div>
	</div>
	<footer>
		<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
	</footer>
</div>