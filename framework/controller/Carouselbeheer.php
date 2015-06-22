<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;

class Carouselbeheer extends core\Controller {
	public function index($action = 'carousel') {

		if (!isset($_SESSION["adminUsername"]))
                {
                        header("location: /Adminlogin");
                }

                if ($action === 'carousel') {
                        $result = "Page load";
                        $carousel = $this->load->model("Carousel");
                	if(isset($_FILES['photo'])){
                		        $target_dir = 'img/';
                                $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                                $uploadOk = 1;
                                if($_FILES["photo"]["size"] !== 0){
                                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                                    $check = getimagesize($_FILES["photo"]["tmp_name"]);
                                    if($check === false) {
                                            $uploadOk = 0;
                                            $result = 'file upload error';
                                    }
                                    if (file_exists($target_file)) {
                                            $uploadOk = 0;
                                            $result = 'Afbeelding bestaat al';
                                    }
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
                                        $uploadOk = 0;
                                        $result = "Geselecteerd bestand is geen afbeelding";
                                    }
                                    if ($uploadOk === 1) {
                                            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                                                    $carousel->updateImageUpload($_POST['carousel'],$_FILES["photo"]["name"]);
                                                    $result = 'Het bestand is succesvol geüpload ';
                                            }
                                    }
                		          }
                	}
                	$this->load->view('Carouselbeheer', array(
                		"carousel" => $carousel->getCarousel(),
        				"message" => $result
        			), array(
        				'js' => array('/js/tinymce/tinymce.min.js','/js/tinymce-load.js','/js/file_upload.js'),
        				'css' => array('/css/carouselbeheer.css')
        			));
                }

                if($action === 'updatecarousel'){
                	$carousel = $this->load->model("Carousel");
                	$result = $carousel->updateCarousel($_POST['carousel_id'],$_POST['carousel_img_url'],$_POST['carousel_text']);
                	return $result;
                }

                if($action === 'updatesort'){
                        $carousel = $this->load->model("Carousel");
                        $result = $carousel->updateSort($_POST['carousel_id'],$_POST['carousel_order']);
                        return $result;
                }
                if($action == 'removecarousel'){
                        $carousel = $this->load->model("Carousel");
                        $result = $carousel->removeCarousel($_POST['carousel_id']);
                         return $result;
                }
        }
}
