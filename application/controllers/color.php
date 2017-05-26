<?php

class Color extends CI_Controller {

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
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("color_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->color_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
	
		$data["color"] = $this->color_model->select_limit($start_with,$limit);
		$this->load->view("backend/list_color",$data);
	}

	function add()
	{
		$this->load->view("backend/add_color");
	}
	
	function add_process()
	{
		$color_name = $this->input->post("color_name");
		$this->load->model("color_model","",TRUE);
		
		for($i=0; $i<count($color_name); $i++)
		{
			$this->color_model->add($color_name[$i]);
		}
	}
	
	function delete()
	{
		$color_id = $this->input->get("color_id");
		
		$this->load->model("color_model","",TRUE);
		$this->color_model->delete($color_id);
		
		header("Location: ".base_url("shoe/add_primary_all_data"));
	}
	
	function edit()
	{
		$color_id = $this->input->get("color_id");
		$this->load->model("color_model","",TRUE);
		$color = $this->color_model->select_by_id($color_id);
		$element["color"] = $color->row(1);
		
		$this->load->view("backend/edit_color",$element);
		
	}
	
	function edit_process()
	{
		$color_id = $this->input->post("color_id");
		$color_name = $this->input->post("color_name");
		
		$this->load->model("color_model","",TRUE);
		$this->color_model->edit($color_id, $color_name);
	}
}

/* End of file part.php */
/* Location: ./application/controllers/part.php */