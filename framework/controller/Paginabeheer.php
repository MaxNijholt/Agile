<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;

class Paginabeheer extends core\Controller {
	public function index($action = 'page',$pageid = 0) {

		if (!isset($_SESSION["adminUsername"]))
                {
                        header("location: /Adminlogin");
                }

		/*
		Sectie voor het weergeven van de verschillende pagina's met postcodes
		 */
		if ($action === 'page') {
			$Page = $this->load->model('Page');
			if(isset($_POST['pageid'])){
				$Page->removePage($_POST['pageid']);
			}
			$this->load->view('Paginabeheer', array(
				"resultset" => $Page->getChildren(),
				"message" => "page load"
			), array(
				"js" => array('/js/pagesort.js')
			));
		}

		if($action === 'updatenav'){
			$pagemodel = $this->load->model('Page');
			if( isset($_POST['pag_id']) ){

				if($_POST['pag_parent'] == '')
					$parent = 'NULL';
				else
					$parent = $_POST['pag_parent'];
 

				$result = $pagemodel->update($_POST["pag_id"], $_POST["pag_order"], $parent, $_POST["pag_enabled"]);
				echo $result;
			}
			else{
				echo "Ooops something went wrong";
			}

		}

		if($action === 'insertpage'){
			$pagemodel = $this->load->model('Page');
			if(isset($_POST['pag_name'])){
				$result = $pagemodel->insert($_POST["pag_name"],$_POST["pag_title"]);
				echo $result;
			}
			else{
				echo "Page already exists";
			}

		}
		if($action === 'delete'){
			$pagemodel = $this->load->model('Page');
			if( isset($_POST['page']) && isset($_POST['pageid'])){
				$this->load->view('Deletepage', array(
				"resultset" => "",
				"page" => $_POST['page'],
				"pageID" => $_POST['pageid'],
				"message" => "page load"
			));
			}
		}


	}
}
/*
$this->load->view('artikel', array(
   'artikel' => ""), array(
   'js' => array(
    './locatie/van/js/bestand.js',
    'nog/locatie/van/het/tweede.bestand.js'
   ),
   'css' => array(
    '/css/locatie/van/css/bestand.css',
   )
  ));*/
