<?php include 'inc/header.inc.php'; ?>
	<?php include 'inc/nav.inc.php'; ?>

	<style>

	.carousel, .carousel-inner, .carousel-inner .item {
		height: 200px;
	}

	.carousel-inner p {
		padding-left: 25px;
		padding-top: 14%;
	}
	
	</style>



	<div id="#carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->	
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->	
		<div class="carousel-inner" role="listbox">
			<div class="item active" style="background-size: 70%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/1.jpg);">	
				<div style="width: 30%; float: right"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
				<div class="carousel-caption">Eerste afbeelding</div>

			</div>
			<div class="item" style="background-size: 70%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/2.jpg);">
				<div style="width: 30%; float: right"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>	
				<div class="carousel-caption">Tweede afbeelding</div>
			</div>
			<div class="item" style="background-size: 70%; background-repeat: no-repeat; background-position: left center; background-image: url(http://tjosti.nl//img/3.jpg);">
				<div style="width: 30%; float: right"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
				<div class="carousel-caption">Derde afbeelding</div>
			</div>
			...
		</div>

		<!-- Controls -->	
		<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Vorige</span>
		</a>
		<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Volgende</span>
		</a>
	</div>
<!-- 
	<div class="jumbotron"> -->
		<div class="container">
			<div class="col-md-8">
				<h1>Welkom!</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<p><a class="btn btn-primary btn-lg" href="#" role="button">Lees meer &raquo;</a></p>
			</div>
			<div class="col-md-4">
				<h2>Twitter</h2>
				<p><i style="display: block; margin-bottom: 5px;">Zaterdag 28 maart 10.00 - 11.30 uur</i>Zwerfafvalopruimactie!!! De Bunders op z'n paasbest. Verzamelen in het... <a href="http://fb.me/7p7bDnoxk">http://fb.me/7p7bDnoxk</a> </p>
				<hr />
				<p><i style="display: block; margin-bottom: 5px;">Zaterdag 28 maart 10.00 - 11.30 uur</i>Zwerfafvalopruimactie!!! De Bunders op z'n paasbest. Verzamelen in het... <a href="http://fb.me/7p7bDnoxk">http://fb.me/7p7bDnoxk</a> </p>
			
			</div>
		</div>
	<!-- </div> -->

	<div class="container">
		<!-- Example row of columns -->
		<div class="row">
			<div class="col-md-4">
				<h2>Laatste Nieuws</h2>
				<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
				<p><a class="btn btn-default" href="#" role="button">Lees meer &raquo;</a></p>
			</div>
			
			<div class="col-md-4">
				<h2>Recent gewijzigd</h2>
				<div class="list-group">
					<a href="#" class="list-group-item active">Nieuw Plantsoen <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">Bushalte De Bunders <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">De Courant <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">Oud papier data <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
					<a href="#" class="list-group-item">Kaas is koning <span style="font-size: 12px; color: #CCC;" class="pull-right">01-01-2015</span></a>
				</div>
				<p><a class="btn btn-default" href="#" role="button">Meer &raquo;</a></p>
			</div>
			<div class="col-md-4">
			<?php
				setlocale(LC_TIME, "nl_NL.utf8");
				$kalender_datum = time();
				$kalender_maand_dagen = date("t", $kalender_datum);
				$kalender_timestamp = mktime(0,0,0,date("n",$kalender_datum),1,date("Y",$kalender_datum));
				$kalender_begin_dag = date("N", $kalender_timestamp);
				$kalender_eind_dag = date("N", mktime(0,0,0,date("n",$kalender_datum),$kalender_maand_dagen,date("Y",$kalender_datum)));
				?>
				<h2>Kalender</h2>
				<div>
				<style>

					.tableheader{
						width: 23px;
						font-weight: bold;
						text-align: center !important;
					}

					.kalender_vandaag {
						clear: both;
						padding: 2px 2px 1px;
						font-weight: bold;
						width: 23px;
					}

					.kalender_vorige_maand {
						width: 23px;
						padding: 2px 2px 1px;
						opacity: 0.3;
						filter: alpha(opacity=30); /* for IE */
						/* opacity with small font can sometimes look too faded
				  		might want to set the 'color' property instead
					   	making day-numbers bold also fixes the problem */
					}

					.kalender_standaarddag {
						width: 23px;
						clear: both;
						padding: 2px 2px 1px;
					}
				
				</style>
					<table class="kalender">
						<caption><?php echo strftime("%B %Y", $kalender_datum); ?></caption>
						<thead>
							<th class="tableheader">Ma </th>
							<th class="tableheader">Di </th>
							<th class="tableheader">Wo </th>
							<th class="tableheader">Do </th>
							<th class="tableheader">Vr </th>
							<th class="tableheader">Za </th>
							<th class="tableheader">Zo </th>
						</thead>
						<tbody>
							<?php
							  for($i = 1; $i <= $kalender_maand_dagen+($kalender_begin_dag-1)+(7-$kalender_eind_dag); $i++){
							    $kalender_vandaag = $i - $kalender_begin_dag;
							    $kalender_vandaag_timestamp = strtotime($kalender_vandaag." day", $kalender_timestamp);
							    $kalender_dagwaarde = date("j", $kalender_vandaag_timestamp);
							    if(date("N",$kalender_vandaag_timestamp) == 1)
							      echo "<tr>\n";
								    if(date("dmY", $kalender_datum) == date("dmY", $kalender_vandaag_timestamp))
								      echo "      <td class=\"kalender_vandaag\">",$kalender_dagwaarde,"</td>\n";
								    elseif($kalender_vandaag >= 0 AND $kalender_vandaag < $kalender_maand_dagen)
								      echo "      <td class=\"kalender_standaarddag\">",$kalender_dagwaarde,"</td>\n";
								    else
								      echo "      <td class=\"kalender_vorige_maand\">",$kalender_dagwaarde,"</td>\n";
							    if(date("N",$kalender_vandaag_timestamp) == 7)
							      echo "    </tr>\n";
							  }
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<hr>

		<footer>
			<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
		</footer>
	</div>
	<!-- /container -->

<?php include 'inc/footer.inc.php'; ?>
