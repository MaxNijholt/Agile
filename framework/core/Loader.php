<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;
use model;

class Loader extends Base {

	/* Private Variables */
	private $_model = null;
	private $_view = null;

	/**
	 * Method to add a modal to the loader
	 * @param  String $name  The name of the model
	 * @param  Array  $param The array of params to be given to the modal
	 * @return Modal         The modal generated
	 */
	public function model($name, $param = null) {
		$name = "model\\".ucfirst($name);
		return ($param!=null) ? new $name($param) : new $name();
	}

	/**
	 * Method to render a view
	 * @param  String $view   The name of the view
	 * @param  Array  $params The array of params to be sent alongside the view
	 */
	public function view($view, $params = null) {
		// Basic variables
		$settings = $this->_settings;
		$user = $this->_settings->getUser();
		if($params != null) extract($params);

		if (!isset($breadcrumb) && isset($_GET['q'])) {
			$_GET['q'] = str_ireplace("home", "", $_GET['q']);
			if ($_GET['q'] != "") {
				foreach (explode("/", $_GET['q']) as $value) {
					$breadcrumb[] = array(strtolower($value), ucfirst($value));
				}
			}
		}

		include $_SERVER['DOCUMENT_ROOT'] . 'template/header/header.inc.php';
		include $_SERVER['DOCUMENT_ROOT'] . 'shop/view/' . ucfirst($view) . ".php";
		include $_SERVER['DOCUMENT_ROOT'] . 'template/footer/footer.inc.php';
	}
}