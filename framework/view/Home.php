<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="home">
	<a  id="compareLink" class="pull-right btn btn-success" href="/vergelijk" disabled>Vergelijk (0)</a>
	<div class="row">
		<div class="col-md-2">
			<aside>
				<ul class="menu">
					<?php foreach ($categorys as $category): ?>
						<li>
							<a href="/category/<?=$category->getID()?>"><?=$category->getName()?><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
							<ul>
								<?php foreach ($category->getChildren() as $sub): ?>
									<li><a href="/category/<?=$sub->getID()?>"><?=$sub->getName()?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ul>
			</aside>
		</div>
		<div class="col-md-10">
			<div class="row">
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
								<div class="checkbox">
							    	<label><input id="<?=$product->getID()?>" type="checkbox" class="vergelijk" value="<?=$product->getID()?>" onchange="addCompare(this)">Vergelijk</label>
							  	</div>
								<a onclick="addProduct(<?=$product->getID()?>, this);" class="btn btn-success btn-lg" data-loading-text="Toegevoegd"><span class="glyphicon glyphicon-shopping-cart"></span> Toevoegen</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</article>
