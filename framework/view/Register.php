<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="register">
	<div class="container">
		
		<div class="row">
			<div class="col-md-12">
				<h2>Registreren</h2>
			</div>
		</div>

		<?php if($status != null): ?>
			<div class="row">
				<div class="col-md-12">
					<br /><div class="alert alert-<?=$status?>"><?=$message?></div>
				</div>
			</div>
		<?php endif;?>
		
		<?php if($status != 'success'): ?>
			<div class="row">
				<div class="col-md-12">
					<p>Gelieve alle velden met een * in te vullen om u te registreren.</p>
					<form action="<?=$post?>" method="post">
						
						<h3>Inloggegevens</h3>
						<div class="form-group">
							<label>E-mail adres *</label>
							<input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" class="form-control" id="email" placeholder="E-mail adres" />
						</div>
						<div class="form-group">
							<label>Wachtwoord *</label>
							<input type="password" name="password" class="form-control" id="password1" placeholder="Wachtwoord" />
						</div>
						<div class="form-group">
							<label>Herhaal wachtwoord *</label>
							<input type="password" name="password-repeat" class="form-control" id="password2" placeholder="Herhaal wachtwoord" />
						</div>

						<hr />

						<h3>Adresgegevens</h3>
						<div class="form-group">
							<label>Adres 1 *</label>
							<input type="text" name="street1" value="<?php echo isset($_POST['street1']) ? $_POST['street1'] : ''; ?>" class="form-control" placeholder="Adresregel 1" />
						</div>

						<div class="form-group">
							<label>Adres 2</label>
							<input type="text" name="street2" value="<?php echo isset($_POST['street2']) ? $_POST['street2'] : ''; ?>" class="form-control" placeholder="Adresregel 2" />
						</div>

						<div class="form-group">
							<label>Postcode *</label>
							<input type="text" name="zipcode" value="<?php echo isset($_POST['zipcode']) ? $_POST['zipcode'] : ''; ?>" class="form-control" placeholder="Postcode" />
						</div>

						<div class="form-group">
							<label>Woonplaats *</label>
							<input type="text" name="city" value="<?php echo isset($_POST['city']) ? $_POST['city'] : ''; ?>" class="form-control" placeholder="Woonplaats" />
						</div>

						<div class="form-group">
							<label>Provincie *</label>
							<input type="text" name="state" value="<?php echo isset($_POST['state']) ? $_POST['state'] : ''; ?>" class="form-control" placeholder="Provincie" />
						</div>

						<div class="form-group">
							<label>Land *</label>
							<select name="country" class="form-control">
								<option <?php echo (isset($_POST['country']) && $_POST['country'] == 'NL') ? $_POST['country'] : ''; ?> value="NL">Nederland</option>
								<option <?php echo (isset($_POST['country']) && $_POST['country'] == 'NL') ? $_POST['country'] : ''; ?> value="BE">Belgi&euml;</option>
							</select>
						</div>

						<hr />
						<h3>Contactgegevens</h3>

						<div class="form-group">
							<label>Telefoon Nummer *</label>
							<input type="text" name="tel" value="<?php echo isset($_POST['tel']) ? $_POST['tel'] : ''; ?>" class="form-control" placeholder="Telefoonnummer" />
						</div>

						<hr />

						<div class="form-group">
							<input type="submit" name="submit" value="Registreren" class="pull-right btn btn-lg btn-success" />
						</div>

					</form>
				</div>
			</div>
		<?php endif; ?>
	</div>
</article>