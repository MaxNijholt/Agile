<?php include '/var/www/tjosti.nl/components/dashboardtopnav.inc.php'; ?>
	<div id="wrapper">
		<?php
			include "components/menubar.inc.php";
		?>
	</div>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php
                echo "<h2 class='page-header'>Wijzigings geschiedenis ".$pagName."</h2>";
            ?>

		</div>
</div>

	<div class="row">
		<div class="col-lg-12">
			<?php 
				if ($message === 'hoi') {
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
							<td style="vertical-align:middle;" width="65%">
							Content inhoud 
							</td>
							<td style="vertical-align:middle;">
							Laatste wijziging 
							</td>
							<td style="vertical-align:middle;">
							Gewijzigd door
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
							    <form class="formright" action='/contentbeheer'>
        <input type='submit' class='btn btn-warning' value='Terug'/>
    </form>
							</td>
						</tr>
						<?php
						$size = sizeof($pageContent);
						$count = 1;
						if (isset($pageContent['cont_text'])) {
															echo "
									<tr>
										<td style='vertical-align:middle;'>{$pageContent['cont_title']}</td>
										<td style='vertical-align:middle;'>{$pageContent['cont_text']}</td>
										<td style='vertical-align:middle;'>{$pageContent['cont_change_date']}</td>
										<td style='vertical-align:middle;'>{$pageContent['author']}</td>
										<td>
										</td>
									<td>

									</td>
										</td>

										<td>
											<fieldset disabled> <input type='submit' class='btn btn-danger' value='Versie terugzetten'/></fieldset>
										</td>
									</tr>
									";
						}
						else{
							foreach ($pageContent as $value) {
								echo "
									<tr>
										<td style='vertical-align:middle;'>{$value['cont_title']}</td>
										<td style='vertical-align:middle;'>{$value['cont_text']}</td>
										<td style='vertical-align:middle;'>{$value['cont_change_date']}</td>
										<td style='vertical-align:middle;'>{$value['author']}</td>
										<td>
										</td>
									<td>

									</td>
										</td>

										<td>";
										if($count === $size){
											echo "<fieldset disabled> <input type='submit' class='btn btn-danger' value='Versie terugzetten'/></fieldset>";
										}
										else{
											echo "<input type='submit' class='btn btn-danger' value='Versie terugzetten'/>";
										}
											
											echo "
										</td>
									</tr>
									";
									$count++;
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</div>