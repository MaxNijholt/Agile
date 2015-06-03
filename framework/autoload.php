<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

function __autoload($class) {
	// TEMP
	// var_dump(__DIR__ . '/' . str_replace("\\", "/", $class) . '.php');
	// echo '<br />';
	// TEMP
	if(!include_once(__DIR__ . '/' . str_replace("\\", "/", $class) . '.php')) {
		throw new \Exception("Can not load '{$class}'", 01);
	}
}