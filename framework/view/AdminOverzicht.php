
	<div class="container" style="padding-top: 50px">
	<table class="table">

	<caption><h3>Admin Gebruikers</h3></caption>
	<tr><th>Id</th><th>Email</th><th>Gebruikersnaam</th><th>Voornaam</th><th>Achternaam</th></tr>
	
	<a href="/Adminaccountbeheer/create" class="btn btn-primary">Nieuw</a>
	<?php
	foreach ($admins as $admin)
	{
		$id = $admin["adminId"];
		$email = $admin["email"];
		$voornaam = $admin["voornaam"];
		$achternaam = $admin["achternaam"];
		$gebruikersnaam = $admin["gebruikersnaam"];

		
	
		echo '

		<tr><td>'.$id.'</td><td>'.$email.'</td><td>'.$gebruikersnaam.'</td><td>'.$voornaam.'</td><td>'.$achternaam.'</td>

		<form action="/Adminaccountbeheer/update" method="POST">
		<input type="hidden" name="id" value='.$id.'>
		<td><input type="submit" class="btn btn-warning" value="Wijzig"/></td>
		</form>

		<form action="/Adminaccountbeheer/delete" method="POST">
		<input type="hidden" name="id" value='.$id.'>
		<td><input type="submit" class="btn btn-danger" value="Verwijder"/></td>
		</form>

		</tr>

		
		';
	
	}
	?>
	</table>
	</div>