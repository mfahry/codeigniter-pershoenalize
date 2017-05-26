<?php

class Material extends CI_Controller {

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
		$this->load->model("material_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->material_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
	
		$data["material"] = $this->material_model->select_limit($start_with,$limit);
		$this->load->view("backend/list_material",$data);
	}

	function add()
	{
		$this->load->view("backend/add_material");
	}
	
	function add_process()
	{
		$material_name = $this->input->post("material_name");
		$this->load->model("material_model","",TRUE);
		
		for($i=0; $i<count($material_name); $i++)
		{
			$this->material_model->add($material_name[$i]);
		}
	}
	
	function delete()
	{
		$material_id = $this->input->get("material_id");
		
		$this->load->model("material_model","",TRUE);
		$this->material_model->delete($material_id);
		
		header("Location: ".base_url("shoe/view_primary_all_data"));
	}
	
	function edit()
	{
		$material_id = $this->input->get("material_id");
		$this->load->model("material_model","",TRUE);
		$material = $this->material_model->select_by_id($material_id);
		$element["material"] = $material->row(1);
		
		$this->load->view("backend/edit_material",$element);	
	}
	
	function edit_process()
	{
		$material_id = $this->input->post("material_id");
		$material_name = $this->input->post("material_name");
		
		$this->load->model("material_model","",TRUE);
		$this->material_model->edit($material_id, $material_name);
	}
}

/* End of file part.php */
/* Location: ./application/controllers/part.php */