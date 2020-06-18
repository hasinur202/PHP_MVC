<?php

class PostModel extends DModel{
	
	function __construct(){
		parent::__construct();
	}

	public function getAllPost($tablePost, $tableCat){
		//$sql = "SELECT *from $tablePost order by id desc limit 3 in";

		$sql = "SELECT p.*, c.name
		FROM $tablePost as p, $tableCat as c 
		WHERE p.cat = c.id ORDER BY p.id desc limit 3";

		return $this->db->select($sql);
	}

	public function getPostList($tablePost, $tableCat){
		$sql = "SELECT p.*, c.name
		FROM $tablePost as p, $tableCat as c 
		WHERE p.cat = c.id ORDER BY p.id desc";

		return $this->db->select($sql);
	}

	public function getPostById($tablePost, $tableCat, $id){
		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost INNER JOIN $tableCat
		ON $tableCat.id = $tablePost.cat WHERE $tablePost.id=$id";
		return $this->db->select($sql);
	}

	public function geAllPostById($tablePost, $id){
		$sql = "SELECT *from $tablePost WHERE id=$id";
		return $this->db->select($sql);
	}

	public function getPostBycat($tablePost, $tableCat, $id){

		$sql = "SELECT $tablePost.*, $tableCat.name FROM $tablePost 
		INNER JOIN $tableCat
		ON $tableCat.id = $tablePost.cat 
		WHERE $tableCat.id=$id";

		return $this->db->select($sql);
	}

	public function getLatestPost($tablePost){
		$sql = "SELECT *from $tablePost ORDER BY id DESC LIMIT 5";
		return $this->db->select($sql);
	}

	public function getPostBySearch($tablePost, $keyword, $cat){
		if(empty($keyword) && $cat == 0){
			header("Location: ".BASE_URL."/Index/home");
		}

		if(isset($keyword) && !empty($keyword)){
			$sql = "SELECT *FROM $tablePost WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
		}elseif(isset($cat)){
			$sql = "SELECT *FROM $tablePost WHERE cat=$cat";
		}
		return $this->db->select($sql);
	}


	public function insertArticle($tablePost, $data){
		return $this->db->insert($tablePost, $data);
	}
	
	public function postUpdate($tablePost, $data, $cond){
		return $this->db->update($tablePost, $data, $cond);
	}

	public function delPostById($tablePost, $cond){
		return $this->db->delete($tablePost, $cond);
	}








}
?>