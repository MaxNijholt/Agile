<!--
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 -->
<aside class="col-md-3">
	<ul class="nav nav-pills nav-stacked">
		<li class="<?php echo strstr($view, "admin/Products") ? 'active' : ''; ?>" role="presentation"><a href="/admin/products">Producten</a></li>
		<li class="<?php echo strstr($view, "admin/Orders") ? 'active' : ''; ?>"  role="presentation"><a href="/admin/orders">Bestellingen</a></li>
		<li class="<?php echo strstr($view, "admin/Categories") ? 'active' : ''; ?>"  role="presentation"><a href="/admin/categories">Categorie&euml;n</a></li>
	</ul>
</aside>