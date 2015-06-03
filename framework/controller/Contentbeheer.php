<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;

class Contentbeheer extends core\Controller {
	public function index($action = 'content',$name = "") {

		if (!isset($_SESSION["adminUsername"]))
                {
                        header("location: /Adminlogin");
                }

		if ($action === 'content') {
			$Content = $this->load->model('Content');
			$this->load->view('Contentbeheer', array(
				"pageContent" => $Content->getContent(),
				"message" => "page load"
			));
		}

		if($action === 'add'){
			if( isset($_POST['page']) && isset($_POST['pageid'])){
				$Content = $this->load->model('Content');
				$this->load->view('CreateContent', array(
					"pageContent" => "",
					"pages" => "",
					"pagName" => $_POST['page'],
					"pagID" => $_POST['pageid'],
					"cont_title" => "",
					"message" => "page load"
				), array(
				"js" => array('/js/tinymce/tinymce.min.js','/js/tinymce-load.js')
				));
			}
			else{
				$pages = $this->load->model('Page');
				$this->load->view('CreateContent', array(
					"pageContent" => "",
					"pages" => $pages->getPages(),
					"pagName" => "(Word aan gewerkt.)",
					"pagID" => "",
					"cont_title" => "",
					"message" => "Page load"
				), array(
				"js" => array('/js/tinymce/tinymce.min.js','/js/tinymce-load.js')
				));
			}
		}

		if($action === 'edit'){
			$Content = $this->load->model('Content');
			if( isset($_POST['pagecontent']) && isset($_POST['pageid']) && isset($_POST['content_title'])){
				if(isset($_POST['cont_id'])){
					$cont_id = $_POST['cont_id'];
				}
				
				if($_POST['btsubmit'] === "Aanmaken"){
					$result = $Content->insertContent($_POST['pageid'],$_POST['content_title'],$_POST['pagecontent'],$_SESSION["adminUsername"]);
					$cont_id = $result;
					$message = $_POST['content_title'] . " is succesvol opgeslagen.";
				}
				else{
					$result = $Content->updateContent($_POST['cont_id'],$_POST['content_title'],$_POST['pagecontent'],$_SESSION["adminUsername"]);
					$message = $_POST['content_title'] . " is succesvol bewerkt.";
				}

				if($result === "Title already exsists" || $result === "Content already exsists"){
					$message = $result;
				}
				//$content = $Content->getContentByID($_POST['cont_id']);
				$this->load->view('CreateContent', array(
					"pageContent" => $_POST['pagecontent'],
					"pagName" => $_POST['pagname'],
					"pagID" => $_POST['pageid'],
					"contentID" => $cont_id,
					"cont_title" => $_POST['content_title'],
					"pages" => "",
					"message" => $message
					), array(
				"js" => array('/js/tinymce/tinymce.min.js','/js/tinymce-load.js')
				));

			}
			else{
				$result = $Content->getContentByID($_POST['cont_id']);
				$this->load->view('CreateContent', array(
					"pageContent" => $result['cont_text'],
					"pagName" => $_POST['pag_title'],
					"pagID" => $_POST['cont_id'],
					"cont_title" => $_POST['content_title'],
					"contentID" => $_POST['cont_id'],
					"pages" => "",
					"message" => ""
					), array(
				"js" => array('/js/tinymce/tinymce.min.js','/js/tinymce-load.js')
				));
			}
		}

		if($action === 'history'){
			$Content = $this->load->model('Content');
			$this->load->view('Contenthistory', array(
					"pageContent" => $Content->getContentbyPage($_POST['cont_id']),
					"pagName" => $_POST['pag_title'],
					"message" => $Content->getContentbyPage($_POST['cont_id'])
					));
		}
	}
}