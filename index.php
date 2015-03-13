<?php
// TEMP
session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);
// Before removing
// -	check all TODO
// -	check all TEMP
// /TEMP

$_SERVER['DOCUMENT_ROOT'] = '/home/stephan/domains/stephan.tjosti.nl/';

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
