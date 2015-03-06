<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;

abstract class Controller extends Base {
	protected $load;

	/**
	 * Constructs a new Controller
	 */
	final public function __construct() {
		parent::__construct();
		
		$this->load = new Loader();
	}

	abstract public function index();
 }