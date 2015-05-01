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
		<form action="/postcodebeheer/created" class="form-inline" method="POST">
			<LABEL FOR=postcode ACCESSKEY=P>Pagina titel</LABEL><br/>
			<input type="text" class="form-control" name="creatingPostcode" id="postcode"><br/>
			<LABEL FOR=huisnummer ACCESSKEY=H>beschrijving</LABEL><br/>
			<textarea rows="4" class="form-control" cols="50" name="comment" id="pagedescription" form="usrform">
Enter text here...</textarea>
			<br />
			<br />
			<input type="submit" class="btn btn-warning" value="Aanmaken" style="margin-right: 20px;">
			<input type="button" class="btn btn-success" value="Afbreken" onclick="location.href='/postcodebeheer/list'" />
		</form>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->