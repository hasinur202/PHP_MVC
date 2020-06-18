<?php

class UserModel extends DModel{
	
	function __construct(){
		parent::__construct();
	}

	public function userList($table){
		$sql = "SELECT *from $table";
		return $this->db->select($sql);
	}

	public function addUser($tableUser, $data){
		return $this->db->insert($tableUser, $data);
	}




	public function userById($table, $id){
		$sql = "SELECT *from $table WHERE id=:id";
		$data = array(":id" => $id);
		return $this->db->select($sql, $data);
		
	}

	public function userUpdate($table, $data, $cond){
		return $this->db->update($table, $data, $cond);
	}

	public function delUserById($table, $cond){
		return $this->db->delete($table, $cond);
	}

	


}
?>