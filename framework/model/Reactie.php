<?php
/**
 * Created by PhpStorm.
 * User: toinebakkeren
 * Date: 28/05/15
 * Time: 11:13
 */

namespace model;
use core;

class Reactie extends core\Model {

    public function getComments($contentID) {
        $query = "SELECT comment_id, comment_body, comment_author_id, comment_timestamp FROM comments WHERE cont_id = {$contentID}";

        $comments = $this->_db->select($query, array(), true);

        return $comments;
    }

    public function postComment() {

    }
}