<?php
/**
 * Created by PhpStorm.
 * User: toinebakkeren
 * Date: 28/05/15
 * Time: 11:11
 */

namespace controller;
use core;

class Reacties extends core\Controller {

    public function index(){

    }

    public function postComment() {
        $reactieModel = $this->load->model('Reactie');

        $data = array();

        if ($reactieModel->postComment(nl2br($_POST['comment_body']), $_POST['comment_author'], $_POST['content_id'])) {
            //Geef een success melding weer
            $data['success'] = true;
            $data['message'] = 'De reactie is geplaatst! <br /> Herlaad de pagina om hem te kunnen bekijken.';
        }
        else {
            //Geef een error melding terug
            $data['success'] = false;
            $data['message'] = 'Er is iets fout gegaan tijdens het versturen!';
        }

        //Geef de JSON data terug aan het Javascript

        echo json_encode($data);
    }

}