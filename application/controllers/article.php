<?php

class Article extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("admin") != "" && $this->session->userdata("pass_admin") != ""){
			return true;
		}else{
			redirect('user/admin', 'refresh');
		}
	}
	
	function view()
	{
		$this->load->model("shoe_model","",TRUE);
		$element["shoe"] = $this->shoe_model->select_all();
		
		$data["page"] = $this->load->view("backend/list_shoe",$element,TRUE);
		$data["active"] = "product";
		$this->load->view("backend/dashboard",$data);
		
	}

	function add()
	{
		$this->load->view("backend/add_shoe");
	}
	
	function add_process()
	{
		//$this->load->view("backend/tes");
		
		$article_title = $this->input->post("article_title");
		$for_page = $this->input->post("for_page");
		$for_related = $this->input->post("for_related");
		$pendahuluan = $this->input->post("pendahuluan");
		$content = $this->input->post("content");
		$article_file_name = str_shuffle($article_title).rand(rand(),rand().rand());
		
		$config["upload_path"] = "./uploads/article/";
		$config["allowed_types"] = "gif|png|jpg";
		$config["file_name"] = $article_file_name;
		
		$this->load->library("upload",$config);
		
		if(! $this->upload->do_upload("thumbnail_path"))
		{
			$this->upload->display_errors();
		}
		else
		{
			$upload_data = $this->upload->data();
			$thumbnail_path = $upload_data["file_name"];
			$this->load->model("article_model","",TRUE);
			$this->article_model->add($article_title, $for_page, $for_related, $pendahuluan, $content, $thumbnail_path);
			$this->load->view("backend/view_article");
		}
	}
	
	function delete()
	{
		$shoe_id = $this->input->get("shoe_id");
		
		$this->load->model("shoe_model","",TRUE);
		$this->shoe_model->delete($shoe_id);
		header("Location: ".base_url("shoe/view_all_data"));
	}
	
	function edit()
	{
		$shoe_id = $this->input->get("shoe_id");
		$this->load->model("shoe_model","",TRUE);
		$shoe = $this->shoe_model->select_by_id($shoe_id);
		$element["shoe"] = $shoe->row(1);
		
		$this->load->view("backend/edit_shoe",$element);
	}
	
	function edit_process()
	{
		$shoe_id = $this->input->post("shoe_id");
		$shoe_name = $this->input->post("shoe_name");
		$shoe_path_old = $this->input->post("shoe_path_old");
		$status_update_image = $this->input->post("status_update_image");
		
		$shoe_file_name = str_shuffle($shoe_name).rand(rand(),rand().rand());
		
		$this->load->model("shoe_model","",TRUE);
		
		if($status_update_image == "1")
		{
			unlink("./uploads/shoe/".$shoe_path_old);
			
			$config["upload_path"] = "./uploads/shoe/";
			$config["allowed_types"] = "gif|jpg|png";
			$config["file_name"] = $shoe_file_name;
			
			$this->load->library("upload",$config);
			
			if(! $this->upload->do_upload("shoe_path"))
			{
				$this->upload->display_errors();
			}
			else
			{
				$upload_data = $this->upload->data();
				$shoe_path = $upload_data["file_name"];
				$this->shoe_model->edit($shoe_id, $shoe_name, $shoe_path);
			}
		}
		else
		{
			$this->shoe_model->edit($shoe_id, $shoe_name, $shoe_path_old);
		}
	}
	
	function add_article()
	{
		$data["page"] = $this->load->view("backend/add_article","",TRUE);
		$data["active"] = "add article";
		$this->load->view("backend/dashboard",$data);
	}
	
	function view_article()
	{
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("article_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		$element["article"] = $this->article_model->select_all();

		$count = $this->article_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
	
		$data["article"] = $this->article_model->select_limit($start_with,$limit);
		$data["active"] = "article";
		$data["page"] = $this->load->view("backend/list_article",$element,TRUE);
		//$this->load->view("backend/list_customer",$data);
		$this->load->view("backend/dashboard",$data);
	}
	
	function view_all_data()
	{
		$data["page"] = $this->load->view("backend/list_all_data","",TRUE);
		$data["active"] = "product";
		$this->load->view("backend/dashboard",$data);
	}
	
	function view_transaction_all_data()
	{
		$data["page"] = $this->load->view("backend/list_transaction_all_data","",TRUE);
		$data["active"] = "shopping cart";
		$this->load->view("backend/dashboard",$data);
	}
	
	function view_limit()
	{
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("shoe_model","",TRUE);
		$this->load->model("part_type_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->shoe_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
		$data["shoe"] = $this->shoe_model->select_limit($start_with,$limit);
		$data["part_type"] = $this->part_type_model->select_all();
		
		$this->load->view("backend/list_shoe", $data);
	}
	
	function infophp(){
		echo phpinfo();
	}
	
}

/* End of file shoe.php */
/* Location: ./application/controllers/shoe.php */