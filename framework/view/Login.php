<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="login">
	<div class="container">
		<div class="col-md-6">
			<h2>Inloggen</h2>
			<hr />
			<div class="alert alert-<?=$status?>"><?=$message?></div>

			<form action="<?=$post?>" method="post">
				<div class="form-group">
					<label>E-mail</label>
					<input type="text" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="E-mail" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" <?php echo isset($_POST['email']) ? 'autofocus' : ''; ?> placeholder="Wachtwoord" />
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Inloggen" class="btn btn-success" />
				</div>
			</form>
		</div>

		<div class="col-md-6">
			<h2>Heeft u nog geen account?</h2>
			<hr />
			<a href="<?=$register?>">Registreer!</a>
		</div>
	</div>
</article>