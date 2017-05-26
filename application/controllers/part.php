<?php

class Part extends CI_Controller {

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

		$this->load->model("part_model","",TRUE);

		$element["part"] = $this->part_model->select_all();

		$data["page"] = $this->load->view("backend/list_part",$element,TRUE);
		$data["active"] = "product";
		$this->load->view("backend/dashboard",$data);

	}



	function add()

	{
		$this->load->model("part_group_model","", TRUE);
		$part_group = $this->part_group_model->select_all();
		
		$element["part_group"] = $part_group;
		
		$this->load->view("backend/add_part",$element);	
	}

	

	function add_process()

	{
		$part_group_id = $this->input->post("part_group_id");
		$part_name = $this->input->post("part_name");
		
		$this->load->model("part_model","",TRUE);
		
		for($i=0; $i<count($part_name); $i++)
		{
			$this->part_model->add($part_name[$i], $part_group_id);
		}
	}
	function delete()

	{

		$part_id = $this->input->get("part_id");

		$this->load->model("part_model","",TRUE);

		$this->part_model->delete($part_id);
		
		header("Location: ".base_url("shoe/view_all_data"));
	}

	

	function edit()

	{

		$part_id = $this->input->get("part_id");

		$this->load->model("part_model","",TRUE);
		$this->load->model("part_group_model","",TRUE);
				
		$part = $this->part_model->select_by_id($part_id);

		$element["part"] = $part->row(1);
		$element["part_group"] = $this->part_group_model->select_all();

		$this->load->view("backend/edit_part",$element);

	}

	function edit_process()

	{
		$part_id = $this->input->post("part_id");
		$part_name = $this->input->post("part_name");
		$part_group_id = $this->input->post("part_group_id");
		
		$this->load->model("part_model","",TRUE);
		$this->part_model->edit($part_id, $part_name, $part_group_id);
		
	}
	
	function view_filter(){
		$part_group_id = $this->input->post("part_group_id");
		$this->load->model("part_model","",TRUE);
		$part = $this->part_model->select_filter($part_group_id);
		$data["part"] = $part;
		$this->load->view("backend/filter_part",$data);
		
	}
	function view_limit(){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("part_model","",TRUE);
		$this->load->model("pattern_color_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->part_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
		$data["part"] = $this->part_model->select_limit($start_with,$limit);
		$data["pattern_color"] = $this->pattern_color_model->select_all();
		
		$this->load->view("backend/list_part", $data);
	}
	

}



/* End of file part.php */

/* Location: ./application/controllers/part.php */