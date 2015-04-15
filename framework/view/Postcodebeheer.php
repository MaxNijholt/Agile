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
	<div class="col-md-6">
		<?php 
			if ($message === 'Het adres is succesvol verwijdert.') {
				echo "<div class='alert alert-success' role='alert'>{$message}</div>";
			}
			if ($message === 'Er is iets fout gegaan tijdens het verwijderen.') {
				echo "<div class='alert alert-danger' role='alert'>{$message}</div>";
			}
			if ($message === 'Het adres is succesvol aangepast.') {
				echo "<div class='alert alert-success' role='alert'>{$message}</div>";
			}
			if ($message === 'Er is iets fout gegaan tijdens het aanpassen.') {
				echo "<div class='alert alert-danger' role='alert'>{$message}</div>";
			}
			if ($message === 'Het adres is succesvol aangemaakt.') {
				echo "<div class='alert alert-success' role='alert'>{$message}</div>";
			}
			if ($message === 'Er is iets fout gegaan tijdens het aanmaken.') {
				echo "<div class='alert alert-danger' role='alert'>{$message}</div>";
			}
			if ($message === 'Het adres dat je wilt aanmaken bestaat al.') {
				echo "<div class='alert alert-danger' role='alert'>{$message}</div>";
			}
		?>
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td> 
							<b>Postcode</b>
						</td>
						<td> 
							<b>Huisnummer</b>
						</td>
						<td>
							<form>
								<input type="button" class="btn btn-success" value="Aanmaken" onclick="location.href='/postcodebeheer/create'" />
							</form>
						</td>
					</tr>
					<?php
						foreach ($resultset as $value) {
							echo "
								<tr>
									<td>{$value['postcode']}</td>
									<td>{$value['huisnummer']}</td>
									<td>
										<form action='/postcodebeheer/edit' method='POST'>
											<input type='hidden' name='postcode' value='{$value['postcode']}'/>
											<input type='hidden' name='huisnummer' value='{$value['huisnummer']}'/>
											<input type='submit' class='btn btn-warning' value='Aanpassen'/>
										</form>
									</td>
									<td>
										<form action='/postcodebeheer/delete' method='POST'>
											<input type='hidden' name='postcode' value='{$value['postcode']}'/>
											<input type='hidden' name='huisnummer' value='{$value['huisnummer']}'/>
											<input type='submit' class='btn btn-danger' value='Verwijderen'/>
										</form>
									</td>
								</tr>
								";
						}
					?>
				</tbody>
			</table>
			<nav>
				<ul class="pager">
					<li>
					<?php if ($next -1 > 0) { ?>
						<a href="/postcodebeheer/list/<?php echo $next -2; ?>">Vorige</a>
					<?php }; ?>
					</li>
					<li>
						<a href="/postcodebeheer/list/<?php echo (count($resultset) < 20) ? $next -1 : $next; ?>">Volgende</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
