<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <?php
	if(isset($refs['css']))
		foreach ($$refs['css'] as $file)
			echo '<link rel="stylesheet" type="text/css" href="/css/' . $file . '">';
	?>
</head>
<body>

<nav>
    <?php echo $navigation; ?>
</nav>