<?php


function showAdmins($admins)
{
	echo "<table cellpadding=\"2\" border=\"1\">";
	echo "<caption><h3>Gebruikers</h3></caption>";
	echo "<tr class=\"table-header\"><th>Id</th><th>Email</th><th>Voornaam</th><th>Achternaam</th>";
	
	echo '<a href="../controller/adminAccountController.php?mode=create">Nieuw</a>';
	
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
	
	echo "</table>";
}

function showAdminsFancy($admins)
{
	echo '
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>index</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>

	<div class="container" style="padding-top: 50px">
	<table class="table">

	<caption><h3>Gebruikers</h3></caption>
	<tr><th>Id</th><th>Email</th><th>Voornaam</th><th>Achternaam</th>
	
	<a href="../controller/adminAccountController.php?mode=create">Nieuw</a>
	';
	
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

	echo '
	</table>
	</div>
					
	<script src="scripts/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>
	';
}


function showCreateAdmin()
{
	echo '
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>index</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
	<div class="container" style="padding-top: 50px">
	<form action="../controller/adminAccountController.php?mode=createConfirm" method="POST">
	<div class="form-group">
	<label for="exampleInputEmail1">Email adres</label>
	<input type="email" class="form-control" id="InputEmail" name="inputEmail" placeholder="Email">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Wachtwoord</label>
	<input type="password" class="form-control" id="InputWachtwoord" name="inputWachtwoord" placeholder="Wachtwoord">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Voornaam</label>
	<input type="text" class="form-control" id="InputVoornaam" name="inputVoornaam" placeholder="Voornaam">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Achternaam</label>
	<input type="text" class="form-control" id="InputAchternaam" name="inputAchternaam" placeholder="Achternaam">
	</div>
	<button type="submit" class="btn btn-default">Maak</button>
	</form>
	</div>
			
	<script src="scripts/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>
	';
}

function showUpdateAdmin($admin)
{
	echo '
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>index</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
	<div class="container" style="padding-top: 50px">
	<form action="../controller/adminAccountController.php?mode=updateConfirm&id='.$admin->adminId.'" method="POST">
	<div class="form-group">
	<label for="exampleInputEmail1">Email adres</label>
	<input type="email" class="form-control" id="InputEmail" name="inputEmail" value="'.$admin->email.'"placeholder="Email">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Wachtwoord</label>
	<input type="password" class="form-control" id="InputWachtwoord" name="inputWachtwoord" value="'.$admin->wachtwoord.'" placeholder="Wachtwoord">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Voornaam</label>
	<input type="text" class="form-control" id="InputVoornaam" name="inputVoornaam" value="'.$admin->voornaam.'" placeholder="Voornaam">
	</div>
	<div class="form-group">
	<label for="exampleInputPassword1">Achternaam</label>
	<input type="text" class="form-control" id="InputAchternaam" name="inputAchternaam" value="'.$admin->achternaam.'" placeholder="Achternaam">
	</div>
	<button type="submit" class="btn btn-default">Wijzig</button>
	</form>
	</div>
	
	<script src="scripts/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>
	';
}

function showDelete($id)
{
	echo '
	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>index</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
			
	<div class="container" style="padding-top: 50px">
	<div class="alert alert-danger">			
		Weet u zeker dat u dit account wilt verwijderen?
	</div>
	<div style="padding-left: 15px">
		<a href="../controller/adminAccountController.php?mode=deleteConfirm&id='.$id.'" class="btn btn-danger">Ja</a>
		<a href="../controller/adminAccountController.php?mode=deleteConfirm" class="btn btn-primary">Nee</a>
	</div>
	</div>

	<script src="scripts/jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
	</html>
	';
}

?>