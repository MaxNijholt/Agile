<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <?php
	if(isset($refs['css']))
		foreach ($$refs['css'] as $file)
			echo '<link rel="stylesheet" type="text/css" href="/css/' . $file . '">';
	?>
	<title>Wijkraad De Bunders - Het discussie platform voor wijk!</title>
	<link rel="shortcut icon" href="http://www.debunders-veghel.nl/favicon.ico">

	<!-- Bootstrap core CSS -->
	<link href="/css/stylesheet.css" rel="stylesheet">
	<link href="/css/calendar.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/css/metisMenu.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>


 

