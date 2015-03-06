<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="error error-404">
	<div class="row">
		<div class="col-md-12">
			<h1>Uh Oh! <small>404 - Pagina niet gevonden</small></h1>
		</div>
		<div class="col-md-12">
			<p>De pagina die u probeert te bezoeken bestaat niet (meer).<br /><br />Klik <a href="/home">hier</a> om terug te keren naar de hoofdpagina.</p>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12"><hr /></div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h3>Hieronder 3 producten, gewoon omdat het kan:</h3>
			<br />
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php foreach ($products as $product): ?>
				<div class="col-sm-6 col-md-4 card">
					<div class="thumbnail">
						<a href="/product/<?=$product->getID()?>"><img src="/media/products/<?=$product->getID()?>.jpg" alt="<?=$product->getName()?>" height="250"></a>
						<div class="caption">
							<div class="description">
								<a href="/product/<?=$product->getID()?>"><h3><?=$product->getName()?></h3></a>
								<p><?=$product->getDesc()?></p>
								<p>Prijs: <?=$formatter->formatCurrency($product->getPrice(), 'EUR')?></p>
							</div>
							<a onclick="addProduct(<?=$product->getID()?>, this);" class="btn btn-success btn-lg" data-loading-text="Toegevoegd"><span class="glyphicon glyphicon-shopping-cart"></span> Toevoegen</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</article>