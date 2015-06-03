
	<div class="row">
		<div class="col-md-12">
			<h1>Pagina Aanpassen</h1>
		</div>
	</div>
	
	<?php if($notice != null): ?>
		<div class="row">
			<div class="col-md-12">
				<?php echo $notice; ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<form action="#">
			<div class="form-group">
				<label for="exampleInputEmail1">Paginatitel</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="De paginatitel" value="<?=$page["pag_title"]?>">
			</div>
			
			<div class="form-group">
				<label for="exampleInputPassword1">Content</label>
				<textarea id="content" name="content" class="form-control" rows="10"><?=$page["pag_content"]?></textarea>
			</div>

			<button type="submit" class="btn btn-success">Opslaan</button>
		</form>
	</div>



	<script>
		
	window.onload = function() {

		$(document).ready(function() {

			$("#content").wysihtml5();

		});

	}

	</script>