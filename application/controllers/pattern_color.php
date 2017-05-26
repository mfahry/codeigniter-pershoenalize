<?php

class Pattern_color extends CI_Controller {

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
		$this->load->model("pattern_color_model","",TRUE);
		$element["pattern_color"] = $this->pattern_color_model->select_all();
		
		$data["page"] = $this->load->view("backend/list_pattern_color",$element,TRUE);
		$data["active"] = "product";
		$this->load->view("backend/dashboard",$data);
	}

	function add()
	{
		$this->load->model("part_group_model","",TRUE);
		$this->load->model("material_color_model","",TRUE);
		$this->load->model("material_model","",TRUE);
		$element["part_group"] = $this->part_group_model->select_all();
		$element["material_color"] = $this->material_color_model->select_all();
		$element["material"] = $this->material_model->select_all();
		
		$this->load->view("backend/add_pattern_color",$element);
	}
	
	function add_process()
	{
		$part_id = $this->input->post("part_id");
		$material_color_id = $this->input->post("material_color_id");
		$pattern_color_price = $this->input->post("pattern_color_price");
		
		$pattern_color_file_name = str_shuffle($part_id.$material_color_id."ABCDE").rand(rand(),rand().rand());
		
		$this->load->library("upload");
		$config["upload_path"] = "./uploads/pattern_color/";
		$config["allowed_types"] = "gif|jpg|png";
		$config["file_name"] = $pattern_color_file_name;
		$this->upload->initialize($config);
			
		if(! $this->upload->do_upload("pattern_color_path"))
		{
			$this->upload->display_errors();
		}
		else
		{
			$upload_data = $this->upload->data();
			$pattern_color_path = $upload_data["file_name"];
			
			$this->load->model("pattern_color_model","",TRUE);
			$this->pattern_color_model->add($part_id, $material_color_id, $pattern_color_price, $pattern_color_path);	
			$pattern_color_id_new = $this->pattern_color_model->max();
			
			$data["pattern_color"] = $this->pattern_color_model->select_by_id($pattern_color_id_new);
			
			$this->load->view("backend/show_image",$data);
			
		}
	}
	
	function delete()
	{
		$pattern_color_id = $this->input->get("pattern_color_id");
		
		$this->load->model("pattern_color_model","",TRUE);
		$this->pattern_color_model->delete($pattern_color_id);
		
		header("Location: ".base_url("shoe/view_all_data"));
	}
	
	function edit()
	{
		$pattern_color_id = $this->input->get("pattern_color_id");
		
		$this->load->model("pattern_color_model","",TRUE);
		$this->load->model("part_model","",TRUE);
		$this->load->model("material_model","",TRUE);
		$this->load->model("material_color_model","",TRUE);
		
		$pattern_color = $this->pattern_color_model->select_by_id($pattern_color_id);
		$part = $this->part_model->select_all();
		$material_color = $this->material_color_model->select_all();
		
		$element["pattern_color"] = $pattern_color->row(1);
		$element["part"] = $part;
		$element["material_color"] = $material_color;
		$element["material"] = $this->material_model->select_all();
		
		$this->load->view("backend/edit_pattern_color",$element);
	}
	
	function edit_process()
	{
		$pattern_color_id = $this->input->post("pattern_color_id");
		$part_id = $this->input->post("part_id");
		$material_color_id = $this->input->post("material_color_id");
		$pattern_color_price = $this->input->post("pattern_color_price");
		$pattern_color_path_old = $this->input->post("pattern_color_path_old");
		$status_update_image = $this->input->post("status_update_image");
		
		$pattern_color_file_name = str_shuffle($pattern_color_name).rand(rand(),rand().rand());
		
		$this->load->model("pattern_color_model","",TRUE);
		
		if($status_update_image == "1")
		{
			unlink("./uploads/pattern_color/".$pattern_color_path_old);
			
			$this->load->library("upload");
			$config["upload_path"] = "./uploads/pattern_color/";
			$config["allowed_types"] = "gif|jpg|png";
			$config["file_name"] = $pattern_color_file_name;
			$this->upload->initialize($config);
			
			if(! $this->upload->do_upload("pattern_color_path"))
			{
				$this->upload->display_errors();
			}
			else
			{
				$upload_data = $this->upload->data();
				$pattern_color_path = $upload_data["file_name"];
				$this->pattern_color_model->edit($pattern_color_id, $part_id, $material_color_id, $pattern_color_price, $pattern_color_path);	
			}
			
		}
		else
		{
			$this->pattern_color_model->edit($pattern_color_id, $part_id, $material_color_id, $pattern_color_price, $pattern_color_path_old);	
		}
		
	}
}

/* End of file shoe.php */
/* Location: ./application/controllers/shoe.php */