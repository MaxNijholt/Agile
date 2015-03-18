<div id="wrapper">

	<?php 
include "/home/toine/domains/toine.tjosti.nl/components/menubar.inc.php";
?>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administrator beheer</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<h2>Vul hieronder de gewenste gegevens in</h2>
		<br />
		<form action="/postcodebeheer/created" class="form-inline" method="POST">
			<LABEL FOR=voornaam ACCESSKEY=V>Voornaam</LABEL>
			<input type="text" class="form-control" name="creatingVoornaam" id="voornaam">
			<br />
			<br />
			<LABEL FOR=achternaam ACCESSKEY=A>Achternaam</LABEL>
			<input type="text" class="form-control" name="creatingAchternaam" id="achternaam">
			<br />
			<br />
			<LABEL FOR=achternaam ACCESSKEY=A>E-mail adres</LABEL>
			<input type="text" class="form-control" name="creatingEmail" id="email">
			<br />
			<br />
			<LABEL FOR=achternaam ACCESSKEY=A>Wachtwoord</LABEL>
			<input type="text" class="form-control" name="creatingWachtwoord" id="wachtwoord">
			<br />
			<br />
			<input type="submit" class="btn btn-warning" value="Aanmaken" style="margin-right: 20px;">
			<input type="button" class="btn btn-success" value="Afbreken" onclick="location.href='/adminbeheer/list'" />
		</form>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
