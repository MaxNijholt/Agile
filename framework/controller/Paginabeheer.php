<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;

class Paginabeheer extends core\Controller {

	public function edit($id) {

		if(false !== ($page = $this->_db->select("SELECT * FROM page WHERE pag_id = :id;", array(':id' => $id)))) {

			$notice = null;
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				if($this->_db->command('UPDATE page SET pag_title = :title AND pag_content = :content WHERE pag_id = :id;', array(
					':id' => $id,
					':title' => $_POST['title'],
					':content' => $_POST['content']
				))) {
					$notice = '<div class="alert alert-success" role="alert">De wijzigingen zijn met succes opgeslagen.</div>';
				} else {
					$notice = '<div class="alert alert-danger" role="alert">Er is iets misgegaan met opslaan, probeert u het later normaals.</div>';
				}
			}

			$this->load->view('paginabeheer/Edit', array(
					'page' => $page,
					'notice' => 
				), array(
				'css' => array(
					'bootstrap-wysihtml5.css'
				),
				'js' => array(
					'wysihtml5-0.3.0.min.js',
					'bootstrap-wysihtml5.js'
				)
			), 'admin');
		} else {
			$this->load->view('paginabeheer/Error', array());
		}
	}


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
			$message = "";
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
				$message = $_POST['pageid'];
				$Page->removePage($_POST['pageid']);
			}
			if(isset($_POST['accordion_id'])){
				$accordion = $_POST['accordion_id'];
			}
			$search = $Page->search('%%',$max);
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
				"message" => $message
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
				"message" => $_POST['pageid']
			));
			}
		}


	}
}

