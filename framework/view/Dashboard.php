<div id="page-wrapper">
    <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Dashboard
			</h1>
		</div>
	</div>
	<?php 
		foreach ($_DashboardItems as $DbI) {
			# Every 4, 1 row
			echo '<div class="row">';
			# Show the dashboard Items
				echo '	<div class="col-xs-6 col-sm-3 ">
					<div class="' . $DbI->getPanel() . '">
						<div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="' . $DbI->getIcon() . '"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                                <div class="huge">1</div>
	                                <div>' . $DbI->getText() . '</div>
	                            </div>
	                        </div>
	                    </div>
	                    <a href="' . $DbI->getLink() . '">
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
</div>
<!-- /#page-wrapper -->