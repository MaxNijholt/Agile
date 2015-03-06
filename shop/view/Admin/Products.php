<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="admin admin-products container">
	<div class="row">
		<div class="col-md-12">
			<h1>Admin - Producten <a class="btn btn-success pull-right" href="/admin/products/add">Toevoegen</a></h1>
			<hr />
		</div>
	</div>
	<div class="row">
		<?php include $_SERVER['DOCUMENT_ROOT'] . 'shop/view/Admin/menu.tpl.php'; ?>
		<div class="col-md-9">
			<?php foreach ($products as $product): ?>
				<div class="product col-sm-6 col-md-4" data-id="<?=$product->getID()?>">
					<div class="thumbnail">
						<div class="wrapper">
							<img src="/media/products/<?=$product->getID()?>.jpg" alt="<?=$product->getName()?>" class="productfoto" />
						</div>
						<div class="caption">
							<h3><?=$product->getName()?></h3>
							<p><a href="/admin/products/edit/<?=$product->getID()?>" class="btn btn-primary" role="button">Bewerken</a> <a href="javascript:void(0);" class="btn btn-default btn-remove-product" data-id="<?=$product->getID()?>" role="button">Verwijderen</a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</article>


<div class="modal fade" id="modalConfirm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Weet u zeker dat u dit product wilt verwijderen?</h4>
			</div>
			<div class="modal-body">
				<p>Deze actie kan niet ongedaan worden gemaakt.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
				<button type="button" class="btn btn-primary" data-loading-text="Verwijderen...">Verwijderen</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->