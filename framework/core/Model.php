<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;

abstract class Model extends Base {

	/**
	 * Method to check a field value
	 * @param  String  $value The value to be checked
	 * @param  String  $type  Optional: the type to be checked against
	 * @param  Integer $min   Optional: the minimum value or length
	 * @param  Integer $max   Optional: the maximum value or length
	 * @return Boolean        True: if check, False: otherwise
	 */
	final public function checkField($value, $type = 'string', $min = null, $max = null) {
		$value = htmlspecialchars(addslashes($value));

		switch ($type) {
			case 'int':
				if(!is_int($value)) 
					return false;
				if($min != null && $value < $min)
					return false;
				if($max != null && $value > $max)
					return false;
				break;
			case 'float':
				if(!is_numeric($value))
					return false;
				if($min != null && $value < $min)
					return false;
				if($max != null && $value > $max)
					return false;
				break;
			case 'string':
				if(!is_string($value)) 
					return false;
				if($min != null && strlen($value) < $min)
					return false;
				if($max != null && strlen($value) > $max)
					return false;
			break;
		}

		return $value;
	}
}