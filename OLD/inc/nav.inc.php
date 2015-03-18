<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Open/sluit navigatie</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img height="100%" style="display: inline-block; margin-top: -2px;" alt="Wijkraad De Bunders" src="img/logo.png">&nbsp;&nbsp;Wijkraad De Bunders</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="index.php">Home</a></li>
		            <li><a href="artikel.php">Nieuws</a></li>
		            <li><a href="discussie.php">Discussies</a></li>
		            <li><a href="activiteiten.php">Activiteiten</a></li>
		            <li><a href="contact.php">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					session_start();
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