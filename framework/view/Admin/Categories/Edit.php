<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="admin admin-products container">
	<div class="row">
		<div class="col-md-12">
			<h1>Admin - Categorie&euml;</h1>
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
			<form action="#" method="post">
				<input name="name" class="form-control" type="text" value="<?=(isset($name)) ? $name : "" ?>">
				<hr>
				<?php if (count($children) > 0): ?>
				<ul class="list-group">
				  	<?php foreach ($children as $category): ?>
					  	<li id="<?=$category->getID()?>" class="list-group-item">
					  		<a class="btn btn-default pull-right" onclick="removeCategory(<?=$category->getID()?>)">Verwijderen</a>
					  		<a class="btn btn-primary pull-right" href="/admin/categories/edit/<?=$category->getID()?>">Bewerken</a>
					  		<span><?=$category->getName()?></span>
						</li>
						<?php endforeach; ?>
				</ul>
				<hr>
				<?php endif; ?>
				<?php if (count($children) <= 0 && count($parents) > 0 && !(count($parents) == 1 && isset($id) && $parents[0]->getID() == $id)): ?>
				<ul class="list-group">	
					<?php foreach ($parents as $category): ?>
						<?php if (!isset($id) || $category->getID() != $id): ?>
						<li id="<?=$category->getID()?>" onclick="changeParent(<?=$category->getID()?>)" class="categoryItem list-group-item <?=(isset($parent) && $parent == $category->getID()) ? "active" : "" ?>" style="cursor:pointer">
							<?=$category->getName()?>
						</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<input id="hiddenCategory" type="hidden" name="parentCategory" <?=(isset($parent)) ? 'value="'.$parent.'"' : '' ?>>
				<hr>
				<?php endif; ?>
				<input class="pull-right btn btn-lg btn-success" type="submit" value="Opslaan" name="submit">
			</form>
		</div>
	</div>
</article>