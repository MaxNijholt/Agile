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
		<h1 class="page-header">Postcode Beheer</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<h2>Vul hieronder de gewenste gegevens in.</h2>

		<h3>Bestaande gegevens:</h3>

		<?php echo "<h4>" . $postcodeedit . " - " . $huisnummeredit . "</h4>"; ?>

		<h3>Te vervangen door: </h3>

		<form action="/postcodebeheer/editconfirmed" class="form-inline" method="POST">
			<LABEL FOR=postcode ACCESSKEY=P>Postcode</LABEL>
			<input type="text" class="form-control" name="desiredPostcode" id="postcode" value="<?php echo $postcodeedit;?>">
			<LABEL FOR=huisnummer ACCESSKEY=H>Huisnummer</LABEL>
			<input type="text" class="form-control" name="desiredHuisnummer" id="huisnummer" value="<?php echo $huisnummeredit;?>">
			<input type="hidden" name="originalPostcode" value="<?php echo $postcodeedit;?>">
			<input type="hidden" name="originalHuisnummer" value="<?php echo $huisnummeredit;?>">
			<br />
			<br />
			<input type="submit" class="btn btn-warning" value="Aanpassen" style="margin-right: 20px;">
			<input type="button" class="btn btn-success" value="Afbreken" onclick="location.href='/postcodebeheer/list'" />
		</form>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
