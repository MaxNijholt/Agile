<?php include '/var/www/tjosti.nl/components/dashboardtopnav.inc.php'; ?>
<link href="/css/paginabeheer.css" rel="stylesheet">
<div id="wrapper">
<?php
	include "components/menubar.inc.php";
?>
</div>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pagina Beheer</h1>
	</div>
</div>    
<div class="container">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Pagina navigatie </a>
            </h4>
          </div>
          <?php
          	if($last === '' || $last === 'collapse1'){
          		echo "<div id='collapse1' class='panel-collapse collapse in'";
          	}
          	else{
          		echo "<div id='collapse1' class='panel-collapse collapse'>";
          	} 

          ?>
          	<br/>
          		<div class="navbar-collapse collapse" align="center">
					<div id="container" class="navbar-collapse collapse">
						<table>
							<tr>
								<td class="tstyle">
									<div id="navigationEnabled" class="current-pages">
										<ul class="tree" id="top">
											<?php
												GenerateNavHTML($resultset);
											 	function GenerateNavHTML($nav)
												{
												    foreach($nav as $page)
												    {	
												    	if($page['enabled']){
												    		echo "<li id={$page['id']}><a href='#'>{$page['title']}</a><ul class='tree' style='display: block;'>";
													        echo GenerateNavHTML($page['children']);
													        echo "</ul></li>";
												    	}
												    }
												}
											?>
										</ul>
									</div>
								</td>
								<td>&nbsp;&nbsp;&nbsp;</td>
								<td class="tstyle">
									<div id="navigationDisabled" class="current-pages">
									<ul class="tree" id="bottem">
									<?php 
											foreach($resultset as $page)
										    {
										    	if(!$page['enabled']){
										    		echo "<li id={$page['id']}><a href='#'>{$page['title']}</a></li>";
												}
											}
									?>
									</ul>
									</div>
								</td>
							</tr>
						</table>
					</div>
				<br/>
					<div id="changeconfirm" role='alert'></div>
					<input type="button" id="btnSubmit" class="btn btn-success" value="Wijzigingen opslaan" onclick="location.href='#'" />
				<br/>
				<br/>

			</div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pagina toevoegen </a>
            </h4>
          </div>
                 <?php
          			if($last === 'collapse2'){
          				echo "<div id='collapse2' class='panel-collapse collapse in'>";
          			}
          			else{
          				echo "<div id='collapse2' class='panel-collapse collapse'>";
          			}
          		?>
		          		<h3>Vul hieronder de gewenste gegevens in</h3>
						<div id="comfirmmessage" role='alert'></div>
						  	  <div class="form-group ">
							    <label for="usr">Naam: </label>
							    <input type="text" class="form-control" id="pagename" placeholder="Gewenste pagina naam">
							  </div>
							  <div class="form-group">
							    <label for="usr">Titel: </label>
							    <input type="text" class="form-control" id="pagetitel" placeholder="Gewenste pagina titel">
							  </div>
							  <div class="form-group" align="center">
							 	<input type="submit" class="btn btn-success" value="Aanmaken" id="btcreatepage" style="margin-right: 20px;">
							  </div> 
				</div>
          </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Pagina's</a>
            </h4>
          </div>
                <?php
          			if($last === 'collapse3'){
          				echo "<div id='collapse3' class='panel-collapse collapse in'>";
          			}
          			else{
          				echo "<div id='collapse3' class='panel-collapse collapse'>";
          			}
          		?>
          	<br/>
          	<div class="row">
				<div class="col-md-12" >
					<div class="table-responsive">
						<table class="table table-striped ">
							<tbody>
								<tr>
									<td> 
										<b>Pagina naam</b>
									</td>
									<td> 
										<b>Pagina titel</b>
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
										<form class="navbar-form" role="search" method="POST" action="/paginabeheer" style="margin:0 !important; padding-left:0px !important;">
										  <div class="form-group">
										  	<input type='hidden' name='accordion_id' value='collapse3'/>
										    <input type="text" class="form-control" name="search_input" placeholder="Zoeken">
										  </div>
										</form>
									</td>
								</tr>
								<?php
									if (!isset($search['pag_name'])) {
											foreach ($search as $value) {
												echo "
														<tr>
															<td>{$value['pag_name']}</td>
															<td>{$value['pag_title']}</td>
															<td>
																<form action='/paginabeheer/edit' method='POST'>
																	<input type='hidden' name='page' value='{$value['pag_name']}'/>
																	<input type='hidden' name='pageid' value='{$value['pag_id']}'/>
																	<input type='submit' class='btn btn-warning' value='Aanpassen'/>
																</form>
															</td>
															<td>
																<form action='/contentbeheer/add' method='POST'>
																	<input type='hidden' name='page' value='{$value['pag_name']}'/>
																	<input type='hidden' name='pageid' value='{$value['pag_id']}'/>
																	<input type='submit' class='btn btn-warning' value='Content aanmaken'/>
																</form>
															</td>
															<td>
																<form action='/paginabeheer/delete' method='POST'>
																	<input type='hidden' name='page' value='{$value['pag_name']}'/>
																	<input type='hidden' name='pageid' value='{$value['pag_id']}'/>";
															if($value['pag_enabled']){
																echo"<fieldset disabled>
																	<input type='submit' class='btn btn-danger' value='Verwijderen'/>
																</fieldset>";
															}
															else
															{
																
																echo "<input type='submit' class='btn btn-danger' value='Verwijderen'/>";
															}
															echo"	 </form>
																	</td>
																</tr>";
											}
									}
									else{
																						echo "
														<tr>
															<td>{$search['pag_name']}</td>
															<td>{$search['pag_title']}</td>
															<td>
																<form action='/paginabeheer/edit' method='POST'>
																	<input type='hidden' name='page' value='{$search['pag_name']}'/>
																	<input type='hidden' name='pageid' value='{$search['pag_id']}'/>
																	<input type='submit' class='btn btn-warning' value='Aanpassen'/>
																</form>
															</td>
															<td>
																<form action='/contentbeheer/add' method='POST'>
																	<input type='hidden' name='page' value='{$search['pag_name']}'/>
																	<input type='hidden' name='pageid' value='{$search['pag_id']}'/>
																	<input type='submit' class='btn btn-warning' value='Content aanmaken'/>
																</form>
															</td>
															<td>
																<form action='/paginabeheer/delete' method='POST'>
																	<input type='hidden' name='page' value='{$search['pag_name']}'/>
																	<input type='hidden' name='pageid' value='{$search['pag_id']}'/>";
															if($search['pag_enabled']){
																echo"<fieldset disabled>
																	<input type='submit' class='btn btn-danger' value='Verwijderen'/>
																</fieldset>";
															}
															else
															{
																
																echo "<input type='submit' class='btn btn-danger' value='Verwijderen'/>";
															}
															echo"	 </form>
																	</td>
																</tr>";
									}
										/*GenerateItems($resultset);
										function GenerateItems($result){
											foreach ($result as $value) {
												echo "
													<tr>
														<td>{$value['name']}</td>
														<td>{$value['title']}</td>
														<td>
															<form action='/paginabeheer/edit' method='POST'>
																<input type='hidden' name='page' value='{$value['name']}'/>
																<input type='hidden' name='pageid' value='{$value['id']}'/>
																<input type='submit' class='btn btn-warning' value='Aanpassen'/>
															</form>
														</td>
														<td>
															<form action='/contentbeheer/add' method='POST'>
																<input type='hidden' name='page' value='{$value['name']}'/>
																<input type='hidden' name='pageid' value='{$value['id']}'/>
																<input type='submit' class='btn btn-warning' value='Content aanmaken'/>
															</form>
														</td>
														<td>
															<form action='/paginabeheer/delete' method='POST'>
																<input type='hidden' name='page' value='{$value['name']}'/>
																<input type='hidden' name='pageid' value='{$value['id']}'/>";
														if($value['enabled']){
															echo"<fieldset disabled>
																<input type='submit' class='btn btn-danger' value='Verwijderen'/>
															</fieldset>";
														}
														else
														{
															
															echo "<input type='submit' class='btn btn-danger' value='Verwijderen'/>";
														}
														echo"	 </form>
																</td>
															</tr>";
															echo GenerateItems($value['children']);
											}
										}*/
								?>
							</tbody>
						</table>
					</div>
					<?php
						echo "	<form id='naviform' action='/paginabeheer/' method='POST'>
											<input type='hidden' name='accordion_id' value='collapse3'/>
											<input type='hidden' name='search_input' value='$lastsearch'>
											<input type='hidden' name='row_count' value='$currentrow'>
								<nav>
									<ul class='pager'>";
						if($currentrow >= 20){
							echo "<li>
									<input type='submit' class='btn' name='btchange' value='Terug'/>
								 </li>";
						}

						if(count($search) > 19){
							echo "<li>
									<input type='submit' class='btn' name='btchange' value='Volgende'/>
								 </li>";
						}
						echo "</ul>
							</nav>
						</form>";
					?>
					<?php
						
						/*$output = "	<form id='naviform' action='/paginabeheer/' method='POST'>
										<input type='hidden' name='accordion_id' value='collapse3'/>
										<input type='hidden' name='search_input' value='$lastsearch'>
										<input type='hidden' name='row_count' value='$currentrow'>";
						if(count($search) > 19){
							$output = $output . "<input type='submit' class='btn' name='btnext' value='Volgende'/>";
						}
						if($currentrow > 19){
							$output = $output . "<input type='submit' class='btn' name='btback' value='Terug'/>";
						}
						$output = $output . "</form>";
						echo $output;*/
					?>
					</div>
				</div>
			</div>
          </div>
        </div>
      </div> 
</div>



</div>

</div>

<!-- /#wrapper -->
