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
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td> 
							<b>Titel</b>
						</td>
						<td>
							<form>
								<input type="button" class="btn btn-success" value="Pagina aanmaken" onclick="location.href='/paginabeheer/create'" />
							</form>
						</td>
					</tr>
					<?php
						foreach ($resultset as $value) {
							echo "
								<tr>
									<td>{$value['pag_title']}</td>
									<td>
										<form action='/paginabeheer/edit' method='POST'>
											<input type='hidden' name='page' value='{$value['postcode']}'/>
											<input type='hidden' name='pageid' value='{$value['huisnummer']}'/>
											<input type='submit' class='btn btn-warning' value='Aanpassen'/>
										</form>
									</td>
									<td>
										<form action='/paginabeheer/delete' method='POST'>
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