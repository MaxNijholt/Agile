<?php

session_start();

// TEMP
error_reporting(E_ALL);
ini_set("display_errors",1);
// TEMP

define('DEBUG_MODE', true);

$_SERVER['DOCUMENT_ROOT'] = '/home/ralf/domains/ralf.tjosti.nl/';

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
