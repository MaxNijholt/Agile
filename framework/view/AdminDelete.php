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

<div class="container" style="padding-top: 50px">
	<div class="alert alert-danger">			
		Weet u zeker dat u dit account wilt verwijderen?
	</div>
	<div style="padding-left: 15px">

	<form action="/Adminaccountbeheer/deleteConfirm" method="POST">
		<input type="hidden" name="id" value=<?php echo $id ?>>
		<input type="submit" class="btn btn-danger" value="Ja"/>
		<a href="../Adminaccountbeheer" class="btn btn-primary">Nee</a>
	</form>
		
	</div>
</div>

	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



