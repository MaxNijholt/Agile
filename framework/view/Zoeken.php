<?php 
	include 'inc/header.inc.php';
	include 'inc/nav.inc.php';
?>
<div class="container">
	
	<div class="row">
		&nbsp;
	</div>
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Zoeken</li>
			</ol>
		</div>
	</div>

	<?php

		if(count($pages) > 0) {

			foreach($pages as $page) {

				echo "<div class='row'>
						<div class='col-md-12'>";

						echo $page->getName();


				echo "</div>
					</div>";


			}


		} else {

			echo "<div class='row'>
						<div class='col-md-12'>";

			echo "<form method='post' action='/Zoeken/search'>";
			echo "<input type='text' id='word' class='form-control' placeholder='Zoekwoord' name='word' required autofocus>";
			echo "<button class='btn btn-lg btn-primary btn-block' type='submit'>Zoeken</button>";
			echo "</form>";

			echo "</div>
				</div>";

		}

		

	?>

</div>

<?php
	include 'inc/footer.inc.php';
?>