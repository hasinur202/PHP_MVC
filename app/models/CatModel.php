<?php

class CatModel extends DModel{
	
	function __construct(){
		parent::__construct();
	}

	public function catList($table){
		$sql = "SELECT *from $table";
		return $this->db->select($sql);
	}

	public function catById($table, $id){
		$sql = "SELECT *from $table WHERE id=:id";
		$data = array(":id" => $id);
		return $this->db->select($sql, $data);
		
	}

	public function insertCat($table, $data){
		return $this->db->insert($table, $data);
	}

	public function catUpdate($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}

	public function delCatById($table, $cond){
		return $this->db->delete($table, $cond);
	}

	


}
?>