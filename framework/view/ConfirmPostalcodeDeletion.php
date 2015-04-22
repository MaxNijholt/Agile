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
		<h2>Weet u zeker dat u de volgende postcode(s) wilt verwijderen:</h2>

		<?php 
			foreach ($postcodedelete as $delete => $val) {
    			$postcodehuisnummer = explode('-', $delete);
    			echo "{$postcodehuisnummer[0]} - {$postcodehuisnummer[1]} <br />";
    		}
    		$arrayPass = serialize($postcodedelete);
    	?>

		<form action="/postcodebeheer/confirmed" method="POST">
			<input type="hidden" name="confirmedPostcodes" value='<?php echo $arrayPass;?>'>
			<br />
			<input type="submit" class="btn btn-warning" value="Ja" style="margin-right: 20px;">
			<input type="button" class="btn btn-success" value="Nee" onclick="location.href='/postcodebeheer/listing'" />
		</form>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../bower_components/raphael/raphael-min.js"></script>
<script src="../bower_components/morrisjs/morris.min.js"></script>
<script src="../js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>