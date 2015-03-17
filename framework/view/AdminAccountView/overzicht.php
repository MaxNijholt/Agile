
	<div class="container" style="padding-top: 50px">
	<table class="table">

	<caption><h3>Gebruikers</h3></caption>
	<tr><th>Id</th><th>Email</th><th>Voornaam</th><th>Achternaam</th></tr>
	
	<a href="../controller/adminAccountController.php?mode=create">Nieuw</a>
	<?php
	foreach ($admins as $admin)
	{
		$id = $admin->adminId;
		$email = $admin->email;
		$voornaam = $admin->voornaam;
		$achternaam = $admin->achternaam;
	
		//echo $id." ".$voornaam." ".$achternaam;
		echo '
		<tr><td>'.$id.'</td><td>'.$email.'</td><td>'.$voornaam.'</td><td>'.$achternaam.'</td>
		<td><a href="../controller/adminAccountController.php?mode=update&id='.$admin->adminId.'">Wijzig</a></td>
		<td><a href="../controller/adminAccountController.php?mode=delete&id='.$admin->adminId.'">Verwijder</a></td>
		</tr>
		';
	
	}
	?>
	</table>
	</div>