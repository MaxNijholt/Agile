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

		if ($action === 'page') {
			$Page = $this->load->model('Page');
			$lastsearch = "";
			$accordion = "";
			$max = 0;
			$search = $Page->search('%%',$max);
			if(isset($_POST['row_count'])){
				$max = $_POST['row_count'];
				if($_POST['btchange'] === 'Volgende'){
					$max = $max + 20;
				}
				else{
					$max = $max - 20;
				}
				
			}
			if(isset($_POST['pageid'])){
				$Page->removePage($_POST['pageid']);
			}
			if(isset($_POST['accordion_id'])){
				$accordion = $_POST['accordion_id'];
			}
			if(isset($_POST['search_input'])){
				$lastsearch = $_POST['search_input'];
				$value = "%".$_POST['search_input']."%";
				$search = $Page->search($value,$max);
			}
			$this->load->view('Paginabeheer', array(
				"resultset" => $Page->getChildren(),
				"last" => $accordion,
				"lastsearch" => $lastsearch,
				"search" => $search,
				"currentrow" => $max,
				"message" => "page load"
			), array(
				"js" => array('/js/pagesort.js')
			));
		}

		if($action === 'updatenav'){
			$pagemodel = $this->load->model('Page');
			if( isset($_POST['pag_id']) ){

				if($_POST['pag_parent'] == '' or $_POST['pag_parent'] == '0')
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

				echo (string)$result;
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

