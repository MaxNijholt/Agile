<?php include '/var/www/tjosti.nl/components/dashboardtopnav.inc.php'; ?>
<div id="wrapper">
<?php
include "/var/www/tjosti.nl/components/menubar.inc.php";
?>
</div>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pagina verwijdering</h1>
	</div>
</div>  
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<?php 
			echo "<h2>Weet u zeker dat u de volgende pagina wilt verwijderen: ".$page."</h2>"
		?>

		<form action="/paginabeheer" method="POST">
			<input type="hidden" name="pageid" value='<?php echo $pageID;?>'>
			<br />
			<input type="submit" class="btn btn-warning" value="Ja" style="margin-right: 20px;">
			<input type="button" class="btn btn-success" value="Nee" onclick="location.href='/paginabeheer'" />
		</form>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>