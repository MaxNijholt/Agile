<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<article class="admin admin-products container">
	<div class="row">
		<div class="col-md-12">
			<h1>Admin - Bestellingen</h1>
		</div>
	</div>
	<div class="row">
		<?php include $_SERVER['DOCUMENT_ROOT'] . 'shop/view/Admin/menu.tpl.php'; ?>
		<div class="col-md-9">
			<h3>Order - <?=$id?></h3>
			<hr>
			<form method="post" action="#">
				<div class="form-group">
					<label>Datum:</label>
					<span><?=$date?></span>
				</div>
				<div class="form-group">
					<label>Status:</label>
					<select name="status">
						<option <?php echo ($status == "Geplaatst") ? "selected" : "" ; ?>>Geplaatst</option>
						<option <?php echo ($status == "Inpakken") ? "selected" : "" ; ?>>Inpakken</option>
						<option <?php echo ($status == "Kaar voor verzenden") ? "selected" : "" ; ?>>Kaar voor verzenden</option>
						<option <?php echo ($status == "Verzonden") ? "selected" : "" ; ?>>Verzonden</option>
					</select>
				</div>
				<div class="form-group">
					<label>Prijs:</label>
					<span><?=$formatter->formatCurrency($price, 'EUR')?></span>
				</div>
				<div class="form-group">
					<label>Gebruiker:</label>
					<span><?=$usr?></span>
				</div>
				<hr>
				<h3>Adres</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Adres 1:</label>
							<span><?=$adres->getStreet1()?></span>
						</div>
						<div class="form-group">
							<label>Adres 2:</label>
							<span><?=$adres->getStreet2()?></span>
						</div>
						<div class="form-group">
							<label>Postcode:</label>
							<span><?=$adres->getZipcode()?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Woonplaats:</label>
							<span><?=$adres->getCity()?></span>
						</div>
						<div class="form-group">
							<label>Procincie:</label>
							<span><?=$adres->getState()?></span>
						</div>
						<div class="form-group">
							<label>Land:</label>
							<span><?=$adres->getCountry()?></span>
						</div>
					</div>
				</div>
				<hr>
				<table id="cart" class="table table-striped">
					<tr>
						<th>Artikel</th>
						<th>Prijs</th>
						<th>Aantal</th>
						<th>Totaal</th>
					</tr>
					<?php foreach ($products as $id => $product): ?>
					<tr id="<?=$id?>" class="product">
						<td><?=$product[1]->getName()?></td>
						<td class="productPrice"><?=$formatter->formatCurrency($product[1]->getPrice(), 'EUR')?></td>
						<td class="productAmount"><?=$product[0]?></td>
						<td class="productTotal"><?=$formatter->formatCurrency($product[1]->getPrice()*$product[0], 'EUR')?></td>
					</tr>
					<?php endforeach; ?>
					<tr class="cartTotal">
						<td colspan="3" class="right">Totaal excl.</td>
						<td id="totalExcl"><?=$formatter->formatCurrency($excl, 'EUR')?></td>
					</tr>
					<tr class="cartTotal">
						<td colspan="3" class="right">BTW</td>
						<td id="totalVat"><?=$formatter->formatCurrency($btw, 'EUR')?></td>
					</tr>
					<tr class="cartTotal">
						<td colspan="3" class="right">Totaal</td>
						<td id="total"><?=$formatter->formatCurrency($total, 'EUR')?></td>
					</tr>
				</table>
				<hr>
				<input class="pull-right btn btn-lg btn-success" type="submit" value="Opslaan" name="submit">
			</form>
		</div>
	</div>
</article>