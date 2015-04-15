<?php include "components/dashboardtopnav.inc.php" ?>

<div id="wrapper">

	<?php 
include "/home/ralf/domains/ralf.tjosti.nl/components/menubar.inc.php";
?>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pagina Beheer</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<h2>Vul hieronder de gewenste gegevens in</h2>
		<br />
		<form action="/paginabeheer/created" class="form-inline" method="POST">
			<LABEL FOR=postcode ACCESSKEY=P>Naam</LABEL>
			<input type="text" class="form-control" name="page_name" id="naam">
				<br />
			<LABEL FOR=huisnummer ACCESSKEY=H>Titel</LABEL>
			<input type="text" class="form-control" name="page_title" id="titel">
			<br />
			<br />
			<input type="submit" class="btn btn-warning" value="Aanmaken" style="margin-right: 20px;">
			<input type="button" class="btn btn-success" value="Afbreken" onclick="location.href='/paginabeheer/list'" />
		</form>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->