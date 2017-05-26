<?php

class Part_mapping extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("admin") != "" && $this->session->userdata("pass_admin") != ""){
			return true;
		}else{
			redirect('user/admin', 'refresh');
		}
	}
	
	function add(){
		$this->load->model("shoe_model","",TRUE);
		$this->load->model("part_type_group_model","",TRUE);
		$this->load->model("part_group_model","",TRUE);
		
		$data["shoe"] = $this->shoe_model->select_all();
		$data["part_type_group"] = $this->part_type_group_model->select_all();
		$data["part_group"] = $this->part_group_model->select_all();
		
		$this->load->view("backend/add_part_mapping",$data);
	}
	
	function add_process(){
		$part_type_id = $this->input->post("part_type_id");
		$part_id = $this->input->post("part_id");
		
		$this->load->model("part_mapping_model","",TRUE);
		$this->part_mapping_model->add($part_type_id, $part_id);
	}
	
	function view_limit(){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("part_type_model","",TRUE);
		$this->load->model("part_mapping_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->part_type_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
		$data["part_mapping"] = $this->part_mapping_model->select_all();
		$data["part_type"] = $this->part_type_model->select_limit($start_with,$limit);
		
		$this->load->view("backend/list_part_mapping", $data);
	}
	
	function delete(){
		$part_type_id = $this->input->get("part_type_id");
		$part_id = $this->input->get("part_id");
		$this->load->model("part_mapping_model","",TRUE);
		
		$this->part_mapping_model->delete($part_type_id, $part_id);
		
		header("Location: ".base_url("shoe/view_all_data"));
	}
}	

	
