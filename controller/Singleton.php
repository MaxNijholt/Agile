<?php
namespace tool;
/**
 * Abstract class which can be inherited (extended) and it will prevent
 * the parent class from reinstantiating itself, so only one instance allowed.
 */
abstract class Singleton {
	protected static $instances = array();
	static function getInstance() {
		$class = get_called_class();
		if(!isset(self::$instances[$class]))
		{
			$r = new \ReflectionClass($class);
   			self::$instances[$class] = $r->newInstanceArgs(func_get_args());
		}
		return self::$instances[$class];
	}
	final protected function __clone() { }
}