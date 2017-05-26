<?php

class Material_color extends CI_Controller {

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
		$this->load->model("material_color_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->material_color_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
	
		$data["material_color"] = $this->material_color_model->select_limit($start_with,$limit);
		$this->load->view("backend/list_material_color",$data);

	}

	function add()
	{
		$this->load->model("material_model","",TRUE);
		$this->load->model("color_model","",TRUE);
		
		$element["material"] = $this->material_model->select_all();
		$element["color"] = $this->color_model->select_all();

		$this->load->view("backend/add_material_color",$element);
	}

	function add_process()

	{
		$material_id = $this->input->post("material_id");
		$color_id = $this->input->post("color_id");
		$material_color_name = $material_id.$color_id.rand(rand(),rand().rand());
		
		$this->load->model("material_color_model","",TRUE);
		
		$config["upload_path"] = "./uploads/material_color/";
		$config["allowed_types"] = "gif|jpg|png";
		$config["file_name"] = $material_color_file_name;
		
		$this->load->library("upload",$config);
		
		if(! $this->upload->do_upload("material_color_path"))
		{
			$this->upload->display_errors();
		}
		else
		{
			$upload_data = $this->upload->data();
			$material_color_path = $upload_data["file_name"];
			$this->material_color_model->add($material_id, $color_id, $material_color_path);
		}
	}
	function delete()

	{
		$material_color_id = $this->input->get("material_color_id");
		$this->load->model("material_color_model","",TRUE);

		$this->material_color_model->delete($material_color_id);
		
		header("Location: ".base_url("shoe/view_primary_all_data"));
	}

	

	function edit()

	{
		$material_color_id = $this->input->get("material_color_id");

		$this->load->model("material_color_model","",TRUE);
		$this->load->model("material_model","",TRUE);
		$this->load->model("color_model","",TRUE);
				
		$material_color = $this->material_color_model->select_by_id($material_color_id);

		$element["material_color"] = $material_color->row(1);
		$element["material"] = $this->material_model->select_all();
		$element["color"] = $this->color_model->select_all();

		$this->load->view("backend/edit_material_color",$element);
	}

	function edit_process()

	{
		$material_color_id = $this->input->post("material_color_id");
		$material_id = $this->input->post("material_id");
		$color_id = $this->input->post("color_id");
		$material_color_path_old = $this->input->post("material_color_path_old");
		$status_update_image = $this->input->post("status_update_image");
		
		$this->load->model("material_color_model","",TRUE);
		
		if($status_update_image == "1")
		{	
			$material_color_name = $material_id.$color_id.rand(rand(),rand().rand());
			unlink("./uploads/material_color/".$material_color_path_old);
			
			$config["upload_path"] = "./uploads/material_color/";
			$config["allowed_types"] = "gif|jpg|png";
			$config["file_name"] = $material_color_name;
			
			$this->load->library("upload",$config);
			
			if(! $this->upload->do_upload("material_color_path"))
			{
				$this->upload->display_errors();
			}
			else
			{
				$upload_data = $this->upload->data();
				$material_color_path = $upload_data["file_name"];
				$this->material_color_model->edit($material_color_id, $material_id, $color_id, $material_color_path);
			}
		}
		else
		{
			$this->material_color_model->edit($material_color_id, $material_id, $color_id, $material_color_path_old);
		}
	}
	
	function view_grid(){
		$this->load->model("material_color_model","",TRUE);

		$element["material_color"] = $this->material_color_model->select_all();

		$this->load->view("backend/grid_material_color",$element);
	}

}



/* End of file material_color.php */

/* Location: ./application/controllers/material_color.php */