<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="admin admin-products container">
	<div class="row">
		<div class="col-md-12">
			<h1>Admin - Bestellingen</h1>
			<hr>
		</div>
	</div>
	<div id="dismis" class="alert alert-danger alert-dismissible fade in" role="alert" style="display: none;">
		<button class="close" aria-label="Close" onclick="removeOrderClose()" type="button">
			<span aria-hidden="true">×</span>
		</button>
		<h4>Weet u zeker dat u deze order wil verwijderen.</h4>
		<table class="table table-striped">
			<tr><th>Ordernummer</th><th>Datum</th><th>Status</th><th>Prijs</th><th>Gebruiker</th></tr>
			<tr id="removeOrder"></tr>
		</table>
		<p>
			<button id="accept" class="btn btn-danger" type="button">Ja</button>
			<button aria-label="Close" onclick="removeOrderClose()" class="btn btn-default" type="button">Nee</button>
		</p>
	</div>
	<div class="row">
		<?php include $_SERVER['DOCUMENT_ROOT'] . 'shop/view/Admin/menu.tpl.php'; ?>
		<div class="col-md-9">
			<table id="adminOrders" class="table table-striped">
				<tr>
					<th>Ordernummer</th>
					<th>Datum</th>
					<th>Status</th>
					<th>Prijs</th>
					<th>Gebruiker</th>
					<th></th>
				</tr>
				<?php foreach ($orders as $order): ?>
					<tr id="<?=$order->getId()?>">
						<td><a href="/admin/orders/edit/<?=$order->getId()?>"><?=$order->getId()?></a></td>
						<td><?=$order->getTimestamp()?></td>
						<td><?=$order->getStatus()?></td>
						<td><?=$formatter->formatCurrency($order->getTotalVAT(), 'EUR')?></td>
						<td><?=$order->getUser()->getMail()?></td>
						<td class="actions"><a class="btn btn-primary" role="button" href="/admin/orders/edit/<?=$order->getId()?>">Bewerken</a><a class="btn btn-default" onclick="removeOrder(<?=$order->getId()?>)">Verwijderen</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</article>