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
			<div id="navbar" vbar-top" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<?php echo $navigation; ?>
					<!-- <li><a href="?q=Home">Home</a></li>
					<li><a href="?q=Wijkraad">Wijkraad</a></li>
					<li><a href="?q=Deelwijken">Deelwijken</a></li>
		            <li><a href="?q=Nieuws">Nieuws</a></li>
		            <li><a href="?q=Activiteit">Activiteiten</a></li>
		            <li><a href="?q=Contact">Contact</a></li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="?q=Zoek"><span class="glyphicon glyphicon-search"></span> Zoeken</a></li>
					<?php 
					if (!isset($_SESSION['user']))
					{
						echo "<li><a href=\"?q=Login\"><span class=\"glyphicon glyphicon-user\"></span> Inloggen</a></li>";
					}
					else
					{	
						echo "<li><a href=\"Userprofile\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['user']->firstname."</a></li>";

						echo "<li><a href=\"logout\"><span class=\"glyphicon glyphicon-user\"></span> Uitloggen</a></li>";
					}

					?>
				</ul>
				<!--
				<form class="navbar-form navbar-right" role="search">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" placeholder="Zoeken..." aria-describedby="inputSuccess2Status">
  						<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
  						<span id="inputSuccess2Status" class="sr-only">(zoeken)</span>
					</div>
				</form>
			-->
			</div>
			<!--/.navbar-collapse -->
		</div>
	</nav>
