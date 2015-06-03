<?php include '/var/www/tjosti.nl/components/dashboardtopnav.inc.php'; ?>
	<div id="wrapper">
		<?php
			include "components/menubar.inc.php";
		?>
	</div>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Content Beheer</h1>
		</div>
</div>
	<div class="row">
		<div class="col-lg-12">
			<?php 
				if ($message === 'Het adres is succesvol verwijdert.') {
					echo "<div class='alert alert-success' role='alert'>{$message}</div>";
				}
			?>
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td style="vertical-align:middle;"> 
							Content titel
							</td>
							<td style="vertical-align:middle;">
							Laatste wijziging 
							</td>
							<td style="vertical-align:middle;">
							Auteur
							</td>
							<td style="vertical-align:middle;">
							Pagina
							</td>

							<td>
							</td>
							<td>
																<form>
								<input type="button" class="btn btn-success" value="Aanmaken" onclick="location.href='/contentbeheer/add'" />
							</form>
							</td>
							<td>
								<form class="navbar-form" role="search" method="POST" action="#" style="margin:0 !important; padding-left:0px !important;">
								  <div class="form-group">
								    <input type="text" class="form-control" name="search" placeholder="Zoeken">
								  </div>
								</form>
							</td>
						</tr>
						<?php
							foreach ($pageContent as $value) {
								echo "
									<tr>
										<td style='vertical-align:middle;'>{$value['cont_title']}</td>
										<td style='vertical-align:middle;'>{$value['cont_change_date']}</td>
										<td style='vertical-align:middle;'>{$value['author']}</td>
										<td style='vertical-align:middle;'>{$value['pag_title']}</td>
										<td>
										</td>
									<td>
										<form id='contentform' action='/contentbeheer/edit' method='POST'>
											<input type='hidden' name='cont_id' value='{$value['cont_id']}'/>
											<input type='hidden' name='content_title' value='{$value['cont_title']}'/>
											<input type='hidden' name='pag_title' value='{$value['pag_title']}'/>
											<input type='submit' class='btn btn-warning' name='btsubmit' value='Bewerken'/>
										</form>
									</td>
										</td>

										<td>
											<form id='contentform' action='/contentbeheer/history' method='POST'>
												<input type='hidden' name='cont_id' value='{$value['cont_id']}'/>
												<input type='hidden' name='pag_title' value='{$value['pag_title']}'/>
											</form>
										</td>
									</tr>
									";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>