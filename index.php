<?php

session_start();

// TEMP
error_reporting(E_ALL);
ini_set("display_errors",1);
// TEMP

define('DEBUG_MODE', true);

<<<<<<< HEAD
$_SERVER['DOCUMENT_ROOT'] = '/home/ralf/domains/ralf.tjosti.nl/';
=======
$_SERVER['DOCUMENT_ROOT'] = '/home/toine/domains/toine.tjosti.nl/';
>>>>>>> feature/Reactie-Module

include 'framework/autoload.php';

try {
	$p = new core\Page();
	$p->setURL(@$_GET['q']);
	$p->build();
} catch (Exception $e) {
	echo '<pre>';
	print_r($e);
	echo '</pre>';
}
