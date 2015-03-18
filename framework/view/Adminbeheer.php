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
							<b>Voornaam</b>
						</td>
						<td> 
							<b>Achternaam</b>
						</td>
						<td> 
							<b>E-mail adres</b>
						</td>
						<td>
							<form>
								<input type="button" class="btn btn-success" value="Aanmaken" onclick="location.href='/adminbeheer/create'" />
							</form>
						</td>
					</tr>
					<?php
						foreach ($resultset as $value) {
							echo "
								<tr>
									<td>{$value['voornaam']}</td>
									<td>{$value['achternaam']}</td>
									<td>{$value['email']}</td>
									<td>
										<form action='/adminbeheer/edit' method='POST'>
											<input type='hidden' name='voornaam' value='{$value['voornaam']}'/>
											<input type='hidden' name='achternaam' value='{$value['achternaam']}'/>
											<input type='submit' class='btn btn-warning' value='Aanpassen'/>
										</form>
									</td>
									<td>
										<form action='/adminbeheer/delete' method='POST'>
											<input type='hidden' name='voornaam' value='{$value['voornaam']}'/>
											<input type='hidden' name='achternaam' value='{$value['achternaam']}'/>
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
