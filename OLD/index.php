<?php include 'inc/header.inc.php'; ?>
	<?php include 'inc/nav.inc.php'; ?>

	<style>
	.carousel, .carousel-inner, .carousel-inner .item {
		height: 200px;
	}
	</style>

	<div id="#carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->	
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->	
		<div class="carousel-inner" role="listbox">
			<div class="item active" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(img/1.jpg);">	
				<div class="carousel-caption">Eerste afbeelding</div>
			</div>
			<div class="item" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(img/2.jpg);">	
				<div class="carousel-caption">Tweede afbeelding</div>
			</div>
			<div class="item" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(img/3.jpg);">	
				<div class="carousel-caption">Derde afbeelding</div>
			</div>
			...
		</div>

		<!-- Controls -->	
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Vorige</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
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
		</div>

		<hr>

		<footer>
			<p>&copy; 2015 - De Bunders - Alle rechten voorbehouden.</p>
		</footer>
	</div>
	<!-- /container -->

<?php include 'inc/footer.inc.php'; ?>