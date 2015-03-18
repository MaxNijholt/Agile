<?php
include 'database.class.inc.php';

if( isset($_POST['pag_id']) ){
		$_id = $_POST["pag_id"];
		$_pag_order = $_POST["pag_order"];
		$_pag_parent = $_POST["pag_parent"];
		$_pag_enabled = $_POST["pag_enabled"];
		$navigation = new Navigation;
		$navigation->updateNavigation($_id,$_pag_order,$_pag_parent,$_pag_enabled);
}

class Navigation
{
	private $_id = null;
	private $_name = null;
	private $_title = null;
	private $_parentid = null;
	private $_sort = null;
	private $_children = array();
	private $_enabled = null;

	public function getID() {
		return $this->_id;
	} 

	public function getName() {
		return $this->_name;
	}

	public function setName($value){
		$this->_name = $value;
	}

	public function getTitle() {
		return $this->_title;
	}  

	public function getParent() {
		return $this->_parentid;
	} 

	public function getSortOrder() {
		return $this->_sort;
	} 

	public function getEnabled() {
		return $this->_enabled;
	} 

	public function getChilds(){
		return $this->_children;
	}

	public function getEnabledNavigation()
	{
		$db = new Database("tjostilocal");
		$result = $db->doSql("select * from page WHERE pag_enabled = 1 AND pag_parent = 0 ORDER BY pag_sort");
		$navigation = array();
		while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
			$navigationitem = new Navigation();
			$navigationitem->_id = $row['pag_id'];
			$navigationitem->_name = $row['pag_name'];
			$navigationitem->_title = $row['pag_title'];
			$navigationitem->_parentid = $row['pag_parent'];
			$navigationitem->_sort = $row['pag_sort'];
			$navigationitem->_enabled = $row['pag_enabled'];
			$navigationitem->_children = $this->getChildren($navigationitem->getID());
			array_push($navigation,$navigationitem);
		}
		return $navigation;

	}

	public function getDisabledNavigation(){
		$db = new Database("tjostilocal");
		$result = $db->doSql("select * from page WHERE pag_enabled = 0");
		$navigation = array();
		while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
			$navigationitem = new Navigation();
			$navigationitem->_id = $row['pag_id'];
			$navigationitem->_name = $row['pag_name'];
			$navigationitem->_title = $row['pag_title'];
			$navigationitem->_parentid = $row['pag_parent'];
			$navigationitem->_sort = $row['pag_sort'];
			$navigationitem->_enabled = $row['pag_enabled'];
			$navigationitem->_children = "";
			array_push($navigation,$navigationitem);
		}
		return $navigation;
	}

	public function getChildren($parentId = null){
		$array = array();
		if ($parentId == null){
			$where = "pag_parent IS NULL";
			$params = array();
		} else {
			$where = " pag_parent = :id";
			$params = array(":id" => $parentId);
		}
		$db = new Database("tjostilocal");
		$result = $db->doSql("SELECT * FROM page WHERE pag_parent = $parentId ORDER BY pag_sort");
		while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
			$navigationitem = new Navigation();
			$navigationitem->_id = $row['pag_id'];
			$navigationitem->_name = $row['pag_name'];
			$navigationitem->_title = $row['pag_title'];
			$navigationitem->_parentid = $row['pag_parent'];
			$navigationitem->_sort = $row['pag_sort'];
			$navigationitem->_enabled = $row['pag_enabled'];
			$navigationitem->_children = $this->getChildren($navigationitem->getID());
			array_push($array,$navigationitem);
		}
		/*foreach ($db->doSql("SELECT * FROM page WHERE "+$where+" ORDER BY pag_order", $params, true) as $record) {
			$array[$record['pag_id']] = array();
			$array[$record['pag_id']]['name'] = $record['pag_name'];
			$array[$record['pag_id']]['title'] = $record['pag_title'];
			$array[$record['pag_id']]['children'] = $this->get_children($record['pag_id']);
		}*/
		return $array;
	}

	public function updateNavigation($_id,$_pag_order,$_pag_parent,$_pag_enabled){
		$db = new Database("tjostilocal");
		$db->doSql("UPDATE `page` SET pag_sort ='".$_pag_order."', pag_parent ='".$_pag_parent."', pag_enabled ='".$_pag_enabled."' WHERE pag_id = ".$_id);
	}
}

?>