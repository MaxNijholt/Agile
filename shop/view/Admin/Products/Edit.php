<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="admin admin-products">
	<div class="row">
		<div class="col-md-12">
			<h1><a class="btn btn-default" href="/admin/products/"><span class="glyphicon glyphicon-chevron-left"></span> Terug</a> Admin - Product</h1>
			<hr />
		</div>
	</div>

	<?php if($status != null): ?>
		<div class="row">
			<div class="col-md-12">
				<br /><div class="alert alert-<?=$status?>"><?=$message?></div>
			</div>
		</div>
	<?php endif;?>

	<div class="row">
		<?php include $_SERVER['DOCUMENT_ROOT'] . 'shop/view/Admin/menu.tpl.php'; ?>

		<div class="col-md-9">
			<form action="#" method="post" enctype="multipart/form-data">
				
				<h3>Product gegevens - #<?php echo $product->getID() != null ? $product->getID() : 'nieuw'?></h3>
				<div class="form-group">
					<label>Productnaam</label>
					<input type="text" name="name" value="<?php echo $product->getName() != null ? $product->getName() : @$_POST['name']?>" class="form-control" placeholder="Productnaam" />
				</div>

				<div class="form-group">
					<label>Korte beschrijving</label>
					<textarea class="form-control" name="desc_short" rows="3" placeholder="Korte beschrijving"><?php echo $product->getDesc() != null ? $product->getDesc() : @$_POST['desc_short']?></textarea>
				</div>

				<div class="form-group">
					<label>Lange beschrijving</label>
					<textarea class="form-control" name="desc_long" rows="6" placeholder="Lange beschrijving"><?php echo $product->getDesc('long') != null ? $product->getDesc('long') : @$_POST['desc_long']?></textarea>
				</div>

				<div class="form-group">
					<label>Prijs Exclusief</label>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">&euro;</span>
						<input type="text" name="price" value="<?php echo $product->getPrice() != null ? str_replace(".", ",", $product->getPrice()) : @$_POST['price']?>" class="form-control" placeholder="Prijs" />
					</div>
				</div>

				<div class="form-group">
					<label>BTW Percentage</label>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">%</span>
						<input type="number" name="vat" value="<?php echo $product->getVAT() != null ? $product->getVAT() : @$_POST['vat']?>" class="form-control" placeholder="BTW Percentage" />
					</div>
				</div>


				<hr />
				<h3>Product afbeelding</h3>

				<div class="form-group">				
					<img src="/media/products/<?=$product->getID()?>.jpg?r=<?=rand(0,100)?>" alt="<?=$product->getName()?>" class="img-thumbnail" width="250" />
				</div>

				<div class="form-group">
					<label>Selecteer afbeelding</label>
					<input type="file" name="image" />
				</div>


				<hr />
				<h3>Productcategorie</h3>
				<?php $cat = $product->getCat(); ?>

				<div class="form-group">
					<span id="cats-selected" class="lead" style="display:inline;"><?=$cat->getName()?></span>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCategory">Selecteer Categorie</button>
					<input type="hidden" name="category" id="cats-hidden" value="<?=$cat->getID()?>" />
				</div>


				<hr />
				<h3>Sleutelwoorden</h3>
				<p>Sleutelwoorden zijn woorden om producten binnen de webshop aan te duiden. Is dit bijvoorbeeld een graafmachine met rupsbanden dan zou u de sleutelwoorden 'ruspband', 'graafmachine' &amp; 'diesel' toe kunnen voegen. Dit bevordert aanbevelingen en vindbaarheid.
				<div class="form-group tags">
					<div class="labels">
						<?php $tagstring = ''; ?>
						<?php foreach($product->getTags() as $tag): ?>
							<?php $tagstring .= $tag->getName() . ','; ?>
							<span class="label label-primary label-lg"><span class="glyphicon glyphicon-tags"></span>&nbsp;<?=$tag->getName()?>&nbsp;<a data-tag="<?=$tag->getName()?>" href="javascript:void(0);"><span class="glyphicon glyphicon-remove"></span></a></span>
						<?php endforeach; ?>
					</div>
					<input type="hidden" name="tags" id="tags" value="<?=substr($tagstring, 0, -1)?>" />
				</div>
				<div class="form-group">
					<input type="text" placeholder="Type om een sleutelwoord toe te voegen" class="form-control" id="product-tags" />
					<div id="product-tags-completion" class="list-group"></div>
				</div>


				<hr />
				<div class="form-group">
					<input type="submit" name="submit" value="Opslaan" class="pull-right btn btn-lg btn-success" />
				</div>
			</form>
		</div>
	</div>
</article>



<!-- Modal -->
<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="modalCategoryLabel" aria-hidden="true">
	<div class="modal-dialog"> <!-- modal-lg -->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="modalCategoryLabel">Categorie selecteren</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="scat-txt" placeholder="Type de naam van een category" autofocus />
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Categorienaam</th>
						</tr>
					</thead>
					<tbody class="scat-results">
						<td class="noclick nohover"><i>Type hierboven de naam van een categorie en selecteer vervolgens de juiste categorie uit deze lijst...</i></td>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
			</div>
		</div>
	</div>
</div>