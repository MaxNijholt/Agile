<?php include "components/dashboardtopnav.inc.php" ?>

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
		<h1 class="page-header">Carousel Beheer</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">

	<?php

		$carouselCount = 1;
		
		
		foreach ($carousel as $value) {
			$imageurl = $value['carousel_img_url'];
			$imagetext = $value['carousel_text'];
			$carouselid = $value['carousel_id'];
			echo "<div class='container-fluid color' id='$carouselid'>
					<div class='col-lg-12'>
						<h4 class='page-header'>Carousel $carouselCount</h4>
					</div>
						<table>
						<tr class='spaceUnder'>
							<td align='middle'>
							    <img src='$imageurl' class='img-rounded carousel' alt='Cinque Terre'>
							</td>
						</tr>
						
						<tr class='spaceUnder'>
							<td align='middle'>
								<textarea id='carousel".$carouselCount."' rows='4' class='textarea simple'>$imagetext</textarea>	
							</td>
						</tr>
						<tr class='spaceUnder'>
						<td align='middle'>
											<table class='textarea' border='0px'>
												<tr class='spaceUnder'>
													<td >
													Geselecteerde afbeelding van computer: 
													</td>
													<td >
														<input type='file' class='filestyle' data-buttontext='Find file' id='filestyle-3' tabindex='-1' style='position: absolute; clip: rect(0px 0px 0px 0px);'>
														<div class='bootstrap-filestyle input-group '>
															<input type='text' class='form-control' style='display:table-cell; width:100%'' disabled=''> 
																<span class='group-span-filestyle input-group-btn' tabindex='0'>
																	<label for='filestyle-3' class='btn btn-success' >
																		<span class='glyphicon glyphicon-picture'></span> Kies afbeelding</label>
																</span>
														</div>
													</td>
												</tr>
												<tr class='spaceUnder'>
													<td >
														Use Image url :
													</td>
													<td >
														<input type='url' class='form-control' id='imageurl_not_local_".$carouselCount."' placeholder='image url' value='http://tjosti.nl//img/1.jpg'>
													</td>
												</tr>
												<tr>
													<td align='right'>
														<input type='button' class='btn btn-warning' value='Wijzigingen opslaan' id='bt_carousel_".$carouselCount."_save' style='margin-right: 20px;' disabled>
													</td>
													<td align='left'>
														<input type='button' class='btn btn-danger' value='Carousel verwijderen' id='bt_carousel".$carouselCount."_delete' style='margin-right: 20px;'>
													</td>
												</tr>
											</table>

						</td>
					</tr>
			</table>
			
			</div>
			<hr>
		<br/>";
		$carouselCount = $carouselCount + 1;
		}

	?>
			<!--<div class="container-fluid color">
					<div class="col-lg-12">
						<h4 class="page-header">Carousel 1</h4>
					</div>
				<table>
					<tr class="spaceUnder">
						<td align="middle">
						    <img src="http://tjosti.nl//img/1.jpg" class="img-rounded carousel" alt="Cinque Terre">
						</td>
					</tr>
					<tr class="spaceUnder">
						<td align="middle">
							<textarea id="countMe" rows="4" class="textarea">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>	
						</td>
					</tr>
					<tr class="spaceUnder">
						<td align="middle">
											<table class="textarea" border='0px'>
												<tr class="spaceUnder">
													<td >
													Geselecteerde afbeelding van computer: 
													</td>
													<td >
														<input type="file" class="filestyle" data-buttontext="Find file" id="filestyle-3" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
														<div class="bootstrap-filestyle input-group ">
															<input type="text" class="form-control" style="display:table-cell; width:100%" disabled=""> 
																<span class="group-span-filestyle input-group-btn" tabindex="0">
																	<label for="filestyle-3" class="btn btn-success" >
																		<span class="glyphicon glyphicon-picture"></span> Kies afbeelding</label>
																</span>
														</div>
													</td>
												</tr>
												<tr class="spaceUnder">
													<td >
														Use Image url :
													</td>
													<td >
														<input type="url" class="form-control" id="exampleInputPassword1" placeholder="image url" value="http://tjosti.nl//img/1.jpg">
													</td>
												</tr>
											</table>

						</td>
					</tr>
				</table>
			</div>
			<hr>
		<br/>-->


</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->