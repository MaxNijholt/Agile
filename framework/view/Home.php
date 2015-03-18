<!--
 * @author Stephan Römer
 * @author Toine Bakkeren	
 -->
<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Open/sluit navigatie</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img height="100%" style="display: inline-block; margin-top: -2px;" alt="Wijkraad De Bunders" src="OLD/img/logo.png">&nbsp;&nbsp;Wijkraad De Bunders</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="/">Home</a></li>
		            <li><a href="artikel.php">Nieuws</a></li>
		            <li><a href="discussie.php">Discussies</a></li>
		            <li><a href="activiteiten.php">Activiteiten</a></li>
		            <li><a href="contact.php">Contact</a></li>
		            <li><a href="/postcodebeheer/list">Postcode Manager</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if (!isset($_SESSION['postalCode']))
					{
						echo "<li><a href=\"inloggen.php\"><span class=\"glyphicon glyphicon-user\"></span> Inloggen</a></li>";
					}
					else
					{
						echo "<li><a href=\"validateLogin.php?mode=logout\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['postalCode']."</a></li>";
						echo "<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-user\"></span> Uitloggen</a></li>";
					}

					?>
				</ul>
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Zoeken..." aria-describedby="inputSuccess2Status">
  						<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
  						<span id="inputSuccess2Status" class="sr-only">(zoeken)</span>
					</div>
				</form>
			</div>
			<!--/.navbar-collapse -->
		</div>
	</nav>
 
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
			<div class="item active" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(OLD/img/1.jpg);">	
				<div class="carousel-caption">Eerste afbeelding</div>
			</div>
			<div class="item" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(OLD/img/2.jpg);">	
				<div class="carousel-caption">Tweede afbeelding</div>
			</div>
			<div class="item" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(OLD/img/3.jpg);">	
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