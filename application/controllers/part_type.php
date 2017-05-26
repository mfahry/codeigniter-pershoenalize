<?php

class Part_type extends CI_Controller {

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
	
	function index()
	{	
		$this->load->model("part_type_model","",TRUE);		
		$data["part_type"] = $this->part_type_model->select_all();
		$this->load->view('index',$data);
	}
	
	function view()
	{
		$this->load->model("part_type_model","",TRUE);
		$element["part_type"] = $this->part_type_model->select_all();
		
		$data["page"] = $this->load->view("backend/list_part_type",$element,TRUE);
		$data["active"] = "product";
		$this->load->view("backend/dashboard",$data);
		
	}

	function add()
	{
		$this->load->model("part_type_group_model","",TRUE);
		$this->load->model("shoe_model","",TRUE);
		
		$element["shoe"] = $this->shoe_model->select_all();
		$element["part_type_group"] = $this->part_type_group_model->select_all();
		//echo "HALLO";
		$this->load->view("backend/add_part_type",$element);
		
	}
	
	function add_process()
	{
		//$this->load->view("backend/tes");
		$part_type_name = $this->input->post("part_type_name");
		$shoe_id = $this->input->post("shoe_id");
		$part_type_group_id = $this->input->post("part_type_group_id");
		$part_type_file_name = str_shuffle($part_type_name).rand(rand(),rand().rand());
		
		$config["upload_path"] = "./uploads/part_type/";
		$config["allowed_types"] = "gif|jpg|png";
		$config["file_name"] = $part_type_file_name;
		
		$this->load->library("upload",$config);
		
		if(! $this->upload->do_upload("part_type_path"))
		{
			$this->upload->display_errors();
		}
		else
		{
			$upload_data = $this->upload->data();
			$part_type_path = $upload_data["file_name"];
			$this->load->model("part_type_model","",TRUE);
			$this->part_type_model->add($part_type_name, $part_type_group_id, $part_type_path, $shoe_id);
		}
	}
	
	function delete()
	{
		$part_type_id = $this->input->get("part_type_id");
		
		$this->load->model("part_type_model","",TRUE);
		$this->part_type_model->delete($part_type_id);
		header("Location: ".base_url("shoe/view_all_data"));
	}
	
	function edit()
	{
		$this->load->model("part_type_model","",TRUE);
		$this->load->model("part_type_group_model","",TRUE);
		$this->load->model("shoe_model","",TRUE);
		
		$part_type_id = $this->input->get("part_type_id");
		
		$part_type = $this->part_type_model->select_by_id($part_type_id); 
		$part_type_group = $this->part_type_group_model->select_all();
		$shoe = $this->shoe_model->select_all();
		
		$element["part_type"] = $part_type->row(1);
		$element["part_type_group"] = $part_type_group;
		$element["shoe"] = $shoe;
		
		$this->load->view("backend/edit_part_type",$element);
	}
	
	function edit_process()
	{
		$part_type_id = $this->input->post("part_type_id");
		$part_type_name = $this->input->post("part_type_name");
		$part_type_group_id = $this->input->post("part_type_group_id");
		$part_type_path_old = $this->input->post("part_type_path_old");
		$status_update_image = $this->input->post("status_update_image");
		$shoe_id = $this->input->post("shoe_id");
		
		$part_type_file_name = str_shuffle($part_type_name).rand(rand(),rand().rand());
		
		$this->load->model("part_type_model","",TRUE);
		
		if($status_update_image == "1")
		{
			unlink("./uploads/part_type/".$part_type_path_old);
			
			$config["upload_path"] = "./uploads/part_type/";
			$config["allowed_types"] = "gif|jpg|png";
			$config["file_name"] = $part_type_file_name;
			
			$this->load->library("upload",$config);
			
			if(! $this->upload->do_upload("part_type_path"))
			{
				$this->upload->display_errors();
			}
			else
			{
				$upload_data = $this->upload->data();
				$part_type_path = $upload_data["file_name"];
				$this->part_type_model->edit($part_type_id, $part_type_name, $part_type_group_id, $part_type_path, $shoe_id);
			}
		}
		else
		{
			$this->part_type_model->edit($part_type_id, $part_type_name, $part_type_group_id, $part_type_path_old, $shoe_id);
		}
	}
	
	function view_filter()
	{
		$part_type_group_id = $this->input->post("part_type_group_id");
		$shoe_id = $this->input->post("shoe_id");
		
		$this->load->model("part_type_model","",TRUE);
		$data["part_type"] = $this->part_type_model->select_filter($shoe_id, $part_type_group_id);
		
		$this->load->view("backend/filter_part_type",$data);
		
	}
	
	function view_limit(){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("part_type_model","",TRUE);
		$this->load->model("part_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->part_type_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
		$data["part_type"] = $this->part_type_model->select_limit($start_with,$limit);
		
		$this->load->view("backend/list_part_type", $data);
	}
	function infophp(){
		echo phpinfo();
	}
	
}

/* End of file part_type.php */
/* Location: ./application/controllers/part_type.php */