<?php include '/var/www/tjosti.nl/components/dashboardtopnav.inc.php'; ?>
<link href="/css/paginabeheer.css" rel="stylesheet">
<div id="wrapper">
<?php
include "/var/www/tjosti.nl/components/menubar.inc.php";
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
          <div id="collapse1" class="panel-collapse collapse in">
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
		          <div id="collapse2" class="panel-collapse collapse sideoff">
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
          <div id="collapse3" class="panel-collapse collapse">
          	<br/>
          	<div class="row">
				<div class="col-md-6" >
					<div class="table-responsive">
						<table class="table table-striped ">
							<tbody>
								<tr>
									<td> 
										<b>Pagina titel</b>
									</td>
									<td> 
										<b>Pagina parent</b>
									</td>
									<td>
									</td>
									<td>
									</td>
								</tr>
								<?php
									GenerateItems($resultset);
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
								}
								?>
							</tbody>
						</table>
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
