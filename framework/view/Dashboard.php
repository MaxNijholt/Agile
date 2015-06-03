<?php include '../includes/dashboard.header.inc.php' ?>
<div id="wrapper">
		<?php 
	        include '../includes/dashboard.navibar.inc.php';
	    ?>
	    <?php
	    	include '../includes/dashboard.menubar.inc.php';
	    ?>
		</div>
	</nav>
	
	<div class="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Dashboard van Henk
				</h1>
			</div>
		</div>
		
		<?php 
			foreach ($_DashboardItems as $DbI => $value) {
				# Counter for rows
				echo '	<div class="row">';
				# Every 3, 1 row
				echo '	<div class="col-lg-3 col-md-6">
						<div class="' . $DbI->_panel . '">
						<div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="' . $DbI->_icon . '"></i>
                                </div>
                                <div class="col-xs-9 text-right">
	                                <div class="huge">1</div>
	                                <div>' . $DbI->_text . '</div>
                                </div>
                            </div>
                        </div>
                        <a href="' . $DbI->_link . '">
                            <div class="panel-footer">
                                <span class="pull-left">Lees Meer</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				';
			}
		?>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <?php include '../include/dashboard.index.inc.php' ?>