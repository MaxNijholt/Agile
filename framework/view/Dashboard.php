<?php //include 'framework/includes/dashboard.header.inc.php' ?>
<!-- <div id="wrapper"> -->
		<?php 
	        //include 'framework/includes/dashboard.navibar.inc.php';
	    	//include 'framework/includes/dashboard.menubar.inc.php';
	    ?>
<!-- 		</div>
	</nav> -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<div class="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Dashboard
				</h1>
			</div>
		</div>
		
		<?php 
			foreach ($_DashboardItems as $DbI) {
				# Counter for rows
				echo '	<div class="row">';
				# Every 3, 1 row
					echo '	<div class="col-lg-3 col-md-6">
						<div class="' . $DbI->getPanel . '">
							<div class="panel-heading">
	                            <div class="row">
	                                <div class="col-xs-3">
	                                    <i class="' . $DbI->getIcon . '"></i>
	                                </div>
	                                <div class="col-xs-9 text-right">
		                                <div class="huge">1</div>
		                                <div>' . $DbI->getText . '</div>
	                                </div>
	                            </div>
	                        </div>
	                        <a href="' . $DbI->getLink . '">
	                            <div class="panel-footer">
	                                <span class="pull-left">Lees Meer</span>
	                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                                <div class="clearfix"></div>
	                            </div>
	                        </a>
                    	</div>
                	</div>
                </div>
				';
			}
		?>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php //include 'framework/include/dashboard.footer.inc.php' ?>