<?php

echo '

<div class="container" style="padding-top: 50px">
	<form action="/Adminaccountbeheer/updateConfirm" method="POST">
	<input type="hidden" name="id" value='.$admin["adminId"].'>
	<div class="form-group">
	<label for="exampleInputEmail1">Email adres</label>
	<input type="email" class="form-control" id="InputEmail" name="inputEmail" value="'.$admin["email"].'"placeholder="Email">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Wachtwoord</label>
	<input type="password" class="form-control" id="InputWachtwoord" name="inputWachtwoord" value="'.$admin["wachtwoord"].'" placeholder="Wachtwoord">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Voornaam</label>
	<input type="text" class="form-control" id="InputVoornaam" name="inputVoornaam" value="'.$admin["voornaam"].'" placeholder="Voornaam">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Achternaam</label>
	<input type="text" class="form-control" id="InputAchternaam" name="inputAchternaam" value="'.$admin["achternaam"].'" placeholder="Achternaam">
	</div>
	<button type="submit" class="btn btn-primary">Wijzig</button>
	</form>
</div>

';

?>