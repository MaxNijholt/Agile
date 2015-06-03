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

    public function postComment($comment_body, $comment_author_id, $cont_id) {
        $query = "INSERT INTO comments (comment_body, comment_author_id, cont_id) VALUES ('{$comment_body}', '{$comment_author_id}', '{$cont_id}')";

        try {
            $this->_db->command($query, array(), true);
            return 'done';
        }
        catch (\Exception $e) {
            return $e;
        }

    }
}