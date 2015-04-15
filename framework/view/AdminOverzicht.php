<?php include "components/dashboardtopnav.inc.php" ?>

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
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
