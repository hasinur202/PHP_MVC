<?php

class Admin extends DController{
	
	public function __construct(){
		parent::__construct();
		Session::checkSession();
		$data = array();
	}

	public function Index(){
		$this->home();
	}

	public function home(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}


	public function addCategory(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view("admin/addcategory");
		$this->load->view('admin/footer');
	}

	public function categoryList(){
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			
			$data = array();
			$table = "category";
			$catModel = $this->load->model("CatModel");
			$data['cat']= $catModel->catList($table);
			$this->load->view("admin/categorylist", $data);

			$this->load->view('admin/footer');
		}


	public function insertCategory(){
		$table = "category";

		$name = $_POST['name'];
		$title = $_POST['title'];
		

		$data = array(
			'name' => $name, 'title' => $title
		);
		$catModel = $this->load->model("CatModel");
		$result = $catModel->insertCat($table, $data);

		$mdata = array();
		if($result ==1){
			$mdata['msg'] = "Category added Successfully....";
		}else{
			$mdata['msg'] = "Category Not Added";
		}
		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}


	public function editCategory($id=NULL){
		//$data = array();
		$table = "category";
		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$catModel = $this->load->model("CatModel");
	 	$data['catById'] = $catModel->catById($table, $id);	
		$this->load->view("admin/editcat", $data);

		$this->load->view('admin/footer');
	}


	public function updateCat($id=NULL){
		$table = "category";
		$name=$_POST['name'];
		$title = $_POST['title'];

		$cond = "id=$id";
		$data = array(
			'name' => $name,
			'title' => $title
		);

		$catModel = $this->load->model('CatModel');
		$result = $catModel->catUpdate($table, $data, $cond);

		$mdata = array();
		if($result == 1){
			$mdata['msg'] = "Category Updated Successfully...";
		}else{
			$mdata['msg'] = "Category Not Updated";
		}

		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}

	public function deleteCategory($id=NULL){
		$table = "category";
		$cond = "id=$id";
		$catModel = $this->load->model("CatModel");
		$result = $catModel->delCatById($table, $cond);

		$mdata = array();
		if($result == 1){
			$mdata['msg'] = "Category Deleted Successfully...";
		}else{
			$mdata['msg'] = "Category Not Deleted";
		}

		$url = BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($mdata));
		header("Location: $url");

	}


	public function addArticle(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		//$data = array();
		$table = "category";
		$catModel = $this->load->model("CatModel");
		$data['cat']= $catModel->catList($table);
		$this->load->view("admin/addpost", $data);

		$this->load->view('admin/footer');
	}

	public function articleList(){
		$tableCat = "category";
		$tablePost = "tbl_post";
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$postModel = $this->load->model("PostModel");
		$data['listPost'] = $postModel->getPostList($tablePost, $tableCat);

		$this->load->view("admin/postlist", $data);
		$this->load->view('admin/footer');
	}


	public function insertPost(){
		if(!($_POST)){
			header("Location: ".BASE_URL."/Admin/addArticle");
		}

		$input = $this->load->validation('DForm');
		$input->post('title')
			->isEmpty()
			->length(10, 500);

		$input->post('content')
			->isEmpty();

		$input->post('cat')
			->isCatEmpty();

		if($input->submit()){
			$tablePost = "tbl_post";
			$title 		= $input->values['title'];
			$content 	= $input->values['content'];
			$cat 		= $input->values['cat'];

			$data = array(
				'title' => $title, 'content' => $content, 'cat' => $cat
			);
			$postModel = $this->load->model("PostModel");
			$result = $postModel->insertArticle($tablePost, $data);

			$mdata = array();
			if($result ==1){
				$mdata['msg'] = "Article added Successfully....";
			}else{
				$mdata['msg'] = "Article Not Added";
			}
			$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
			header("Location: $url");
		}else{
			$data['postErrors'] = $input->errors;
			
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');

			$table = "category";
			$catModel = $this->load->model("CatModel");
			$data['cat']= $catModel->catList($table);

			$this->load->view("admin/addpost", $data);
			$this->load->view('admin/footer');
		}

		
	}


	public function editPost($id=NULL){
		//$data = array();
		$tablePost = "tbl_post";
		$tableCat = "category";
		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');

		$postModel = $this->load->model("PostModel");
	 	$data['postById'] = $postModel->geAllPostById($tablePost, $id);

	 	$catModel = $this->load->model("CatModel");
		$data['cat']= $catModel->catList($tableCat);

		$this->load->view("admin/editpost", $data);

		$this->load->view('admin/footer');
	}


	public function updatePost($id=NULL){
		$tablePost = "tbl_post";

		$title = $_POST['title'];
		$content = $_POST['content'];
		$cat = $_POST['cat'];

		$cond = "id=$id";
		$data = array(
			'title' => $title,
			'content' => $content,
			'cat' => $cat
		);

		$postModel = $this->load->model('PostModel');
		$result = $postModel->postUpdate($tablePost, $data, $cond);

		$mdata = array();
		if($result == 1){
			$mdata['msg'] = "Article Updated Successfully...";
		}else{
			$mdata['msg'] = "Article Not Updated";
		}

		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}


	public function deletePost($id=NULL){
		$tablePost = "tbl_post";
		$cond = "id=$id";
		$postModel = $this->load->model("PostModel");
		$result = $postModel->delPostById($tablePost, $cond);

		$mdata = array();
		if($result == 1){
			$mdata['msg'] = "Article Deleted Successfully...";
		}else{
			$mdata['msg'] = "Article Not Deleted";
		}

		$url = BASE_URL."/Admin/articleList?msg=".urlencode(serialize($mdata));
		header("Location: $url");

	}



	public function uioption(){
		$tableUI = "tbl_ui";
		$uiModel = $this->load->model('UIModel');
		$data['color'] = $uiModel->getColor($tableUI);
		$this->load->view('admin/header', $data);
		
		$this->load->view('admin/sidebar');
		$this->load->view("admin/ui");
		$this->load->view('admin/footer');
	}

	public function changeUI($id=NULL){
		$tableUI = "tbl_ui";

		$color = $_POST['color'];
		
		$id = 1;
		$cond = "id=$id";
		$data = array(
			'color' => $color
		);

		$uiModel = $this->load->model('UIModel');
		$result = $uiModel->updateBackground($tableUI, $data, $cond);

		$mdata = array();
		if($result == 1){
			$mdata['msg'] = "Background Color Updated Successfully...";
		}else{
			$mdata['msg'] = "Background Color Not Updated";
		}

		$url = BASE_URL."/Admin/uioption?msg=".urlencode(serialize($mdata));
		header("Location: $url");
	}












	
}

?>