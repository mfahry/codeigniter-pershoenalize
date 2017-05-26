<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library("session");
	}

	function view_random(){
		if($this->session->userdata("cart")){
			$sum_cart = count($this->session->userdata("cart"));
		}
		else{
			$sum_cart = 0;
		}
		
		$this->load->model("shoe_model","",TRUE);
		$this->load->model("collection_model");
		$data["sum_cart"] = $sum_cart;
		$collection = $this->collection_model->select_random();
		$data["collection"] = $collection;
		$this->load->view("collection",$data);
	}

}

/* End of file collection.php */
/* Location: ./application/controllers/collection.php */