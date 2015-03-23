<div class="container" style="padding-top: 50px">
	<div class="alert alert-danger">			
		Weet u zeker dat u dit account wilt verwijderen?
	</div>
	<div style="padding-left: 15px">

	<form action="/Adminaccountbeheer/deleteConfirm" method="POST">
		<input type="hidden" name="id" value=<?php echo $id ?>>
		<input type="submit" class="btn btn-danger" value="Ja"/>
		<a href="" class="btn btn-primary">Nee</a>
	</form>
		
	</div>
</div>