<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Webshop Webshop</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/home">The Webshop Webshop</a>
			</div>

	    	<!-- Collect the nav links, forms, and other content for toggling -->
	    	<div class="collapse navbar-collapse">
	    		<ul class="nav navbar-nav">
	        		<li><a href="/home">Home</a></li>
	        		<li><a href="/about">About</a></li>
	    		</ul>
	      		<ul class="nav navbar-nav navbar-right">
	        		<li><a class="cart" href="/cart"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> <span id="cartAmount"><?=(isset($_SESSION['cart'])) ? unserialize($_SESSION['cart'])->countItems() : 0 ?></span> Product(en)</a></li>
	        		<?php if ($user != false) { ?>
	        		<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				        	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?=$user->getMail()?><span class="caret"></span>
				        </a>
				        <ul class="dropdown-menu" role="menu">
				            <li><a href="/order">Orders</a></li>
				            <li><a href="/account">Account</a></li>
				             <?php if ($user->isAdmin()): ?><li><a href="/admin">Admin</a></li><?php endif; ?>
				            <li><a href="/logout">Uitloggen</a></li>
				        </ul>
				    </li>
	        		<?php } else { ?>
	        			<li><a href="/login">Inloggen</a></li>
	        		<?php } ?>
	      		</ul>
	    	</div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
	<div id="search">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form action="/search" method="get">
						<input type="text" class="form-control" name="query" placeholder="Zoeken..." />
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/home">Home</a></li>
		  	<?php if (isset($breadcrumb)): ?>
		  		<?php foreach ($breadcrumb as $value): ?>
			  		<li><a href="<?=$value[0]?>"><?=$value[1]?></a></li>
			  	<?php endforeach; ?>
		  	<?php endif; ?>
		</ol>