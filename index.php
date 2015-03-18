<?php

session_start();

// TEMP
error_reporting(E_ALL);
ini_set("display_errors",1);
// TEMP

$_SERVER['DOCUMENT_ROOT'] = '/home/toine/domains/toine.tjosti.nl/';
//print_r($_GET);

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