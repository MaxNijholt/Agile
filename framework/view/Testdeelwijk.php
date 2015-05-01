<div class="container">
<h2>Test Deelwijk</h2>

<?php

//getdeelwijk()
// echo $deelwijk['deelwijkId']."<br>";
// echo $deelwijk['deelwijkNaam']."<br>";
// echo $deelwijk['beschrijving']."<br>";


//getdeelwijken()
foreach ($deelwijken as $deelwijk)
{
	echo $deelwijk['beschrijving']."<br>";
}



?>
</div>