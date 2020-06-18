<?php

class Login extends DController{
	
	public function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->login();
	}

	public function login(){
		Session::checkLogin();
		$this->load->view("login/login");
	}

	public function loginAuth(){
		$table = "tbl_user";
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$loginModel = $this->load->model("LoginModel");
		$count = $loginModel->userControl($table, $username, $password);
		if($count > 0){
			$result = $loginModel->getUserData($table, $username, $password);
			Session::init();
			Session::set("login", true);
			Session::set("username", $result[0]['username']);
			Session::set("userId", $result[0]['id']);
			header("Location:".BASE_URL."/Admin");

		}else{
			header("Location:".BASE_URL."/Login");
		}
		
	}


	public function logout(){
		Session::init();
		Session::destroy();
		header("Location:".BASE_URL."/Login");

	}





}

?>