<?php
/**
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;
use controller;

final class Navigation extends Base {

        private $_firstItem = true;

        /**
         * Method to get the menu tree
         * @return [type] [description]
         */
        // public function getTree() {
        //      return $this->_getChildren();
        // }

        // public function getPrettyTree($array = null) {
        //      $ul = '<ul class="nav navbar-nav">';
        //      foreach ((($array == null) ? $this->_getChildren() : $array) as $key => $value) {
        //              $ul .= '<li><a href="' . $value['url'] . '">' . $value['title'] . '</a></li>';
        //              $ul .= $this->getPrettyTree($value['children']);
        //      }
        //      return $ul . '</ul>';
        // }

        /**
         * Method to get all pages and there children
         * @return Array All pages and there children
         */
        public function getNavigationTree($parentId = null, $parentName = ""){

                if ($parentId == null){
                        $where = "pag_parent IS NULL";
                        $params = array();
                } else {
                        $where = " pag_parent = :id";
                        $params = array(":id" => $parentId);
                }

                if($this->_firstItem)
                        $resp = '<ul class="nav navbar-nav">';
                else
                        $resp = '<ul class="dropdown-menu" role="menu">';

                $count = 0;
                foreach ($this->_db->select("SELECT pag_id, pag_name, pag_title FROM page WHERE ".$where." AND pag_enabled = 1 ORDER BY pag_order", $params, true) as $record) {
                        // $array[$record['pag_id']] = array();
                        // $array[$record['pag_id']]['id'] = $record['pag_id'];
                        // $array[$record['pag_id']]['url'] = $this->_domain . $parentName . "/" . $record['pag_name'];
                        // $array[$record['pag_id']]['title'] = $record['pag_title'];
                        // $array[$record['pag_id']]['active'] = ($record['pag_id'] == $this->_page->getId()) ? "active" : "";
                        
                        $test = $this->getNavigationTree($record['pag_id'], $parentName."/".$record['pag_name']);


                        if($this->_firstItem) {
                                $resp .= '<li>';
                                $resp .= '<a href="' . $parentName . "/" . $record['pag_name'] . '">' . $record['pag_title'] . '</a>';
                        } else {
                                if($test[0] > 0) {
                                    $resp .= '<li class="dropdown">';
				    $resp .= '<a href="' . $parentName . "/" . $record['pag_name'] . '" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $record['pag_title'] . ' <span class="caret"></span></a>';
                                } else {
                                    $resp .= '<li>';
				    $resp .= '<a href="' . $parentName . "/" . $record['pag_name'] . '">' . $record['pag_title'] . '</a>';
				}
                        }

                        
                        if($test[0] > 0) $resp .= $test[1];
                        
                        $resp .= '</li>';

                        $count++;
                }


                $this->_firstItem = false;
                $resp .= '</ul>';


                return array($count, $resp);
        }
}

