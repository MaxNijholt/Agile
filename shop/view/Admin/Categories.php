<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="admin admin-products container">
	<div class="row">
		<div class="col-md-12">
			<h1>Admin - Categorie&euml;n <a class="btn btn-success pull-right" href="/admin/categories/add">Toevoegen</a></h1>
			<hr>
		</div>
	</div>
	<div id="dismis" class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none;">
		<button class="close" aria-label="Close" onclick="removeCategoryClose()" type="button">
			<span aria-hidden="true">×</span>
		</button>
		<h4>Weet u zeker dat u deze categorie wil verwijderen en alle onderlichtende categorie en alle onderlichtende producten.</h4>
		<p id="removeCategory"></p>
		<p>
			<button id="accept" class="btn btn-danger" type="button">Ja</button>
			<button aria-label="Close" onclick="removeCategoryClose()" class="btn btn-default" type="button">Nee</button>
		</p>
	</div>
	<div class="row">
		<?php include $_SERVER['DOCUMENT_ROOT'] . 'shop/view/Admin/menu.tpl.php'; ?>
		<div class="col-md-9">
			<ul class="list-group">
			  	<?php foreach ($categorys as $category): ?>
				  	<li id="<?=$category->getID()?>" class="list-group-item">
				  		<a class="btn btn-default pull-right" onclick="removeCategory(<?=$category->getID()?>)">Verwijderen</a>
				  		<a class="btn btn-primary pull-right" href="/admin/categories/edit/<?=$category->getID()?>">Bewerken</a>
				  		<span><?=$category->getName()?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</article>