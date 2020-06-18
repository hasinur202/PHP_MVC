<?php

class UIModel extends DModel{
	
	function __construct(){
		parent::__construct();
	}

	public function getColor($table){
		$sql = "SELECT *from $table";
		return $this->db->select($sql);
	}


	public function updateBackground($tableUI, $data, $cond){
		return $this->db->update($tableUI, $data, $cond);
	}




}

?>