<div id="wrapper">

<?php 
include "components/menubar.inc.php";
?>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Admin Beheer</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">

	<form action="createConfirm" method="POST">
		<div class="form-group">
		<label for="inputEmail">Email adres</label>
		<input type="email" class="form-control" id="InputEmail" name="inputEmail" value="<?php if (isset($input["email"])){ echo $input["email"];} ?>" placeholder="Email">
			<?php 
			if (isset($errors["email"])) 
			{
				echo '<div style="color: red">'.$errors["email"].'</div>';
			}      
			?>
		</div>
		<div class="form-group">
		<label for="inputGebruikersnaam">Gebruikersnaam</label>
		<input type="name" class="form-control" id="inputGebruikersnaam" name="inputGebruikersnaam" value="<?php if (isset($input["gebruikersnaam"])){ echo $input["gebruikersnaam"];} ?>" placeholder="Gebruikersnaam">
			<?php 
			if (isset($errors["gebruikersnaam"])) 
			{
				echo '<div style="color: red">'.$errors["gebruikersnaam"].'</div>';
			}      
			?>
		</div>
		<div class="form-group">
		<label for="inputWachtwoord">Wachtwoord</label>
		<input type="password" class="form-control" id="InputWachtwoord" name="inputWachtwoord" placeholder="Wachtwoord">
			<?php 
			if (isset($errors["wachtwoord"])) 
			{
				echo '<div style="color: red">'.$errors["wachtwoord"].'</div>';
			}      
			?>
		</div>
		<div class="form-group">
		<label for="inputVoornaam">Voornaam</label>
		<input type="text" class="form-control" id="InputVoornaam" name="inputVoornaam" value="<?php if (isset($input["voornaam"])){ echo $input["voornaam"];} ?>" placeholder="Voornaam">
			<?php 
			if (isset($errors["voornaam"])) 
			{
				echo '<div style="color: red">'.$errors["voornaam"].'</div>';
			}      
			?>
		</div>
		<div class="form-group">
		<label for="inputAchternaam">Achternaam</label>
		<input type="text" class="form-control" id="InputAchternaam" name="inputAchternaam" value="<?php if (isset($input["achternaam"])){ echo $input["achternaam"];} ?>" placeholder="Achternaam">
			<?php 
			if (isset($errors["achternaam"])) 
			{
				echo '<div style="color: red">'.$errors["achternaam"].'</div>';
			}      
			?>
		</div>
		<button type="submit" class="btn btn-primary">Maak</button>
	</form>



	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
