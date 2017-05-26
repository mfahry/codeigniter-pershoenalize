<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->helper("url");
		$this->load->library('session');
	}	
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function generator(){
		if(isset($_SESSION["cart"])){
			$sum_cart = count($_SESSION["cart"]);
		}
		else{
			$sum_cart = 0;
		}
		
		$this->load->model("shoe_model","",TRUE);
		
		$data["shoe"] = $this->shoe_model->select_all();
		$data["sum_cart"] = $sum_cart;
		$this->load->view("generator",$data);
	}
	
	public function howitworks(){
		$this->load->view("howitwork");
	}
	
	public function session_destroy(){
		$this->session->sess_destroy();
		$this->load->view("session_destroy");
	}
	
	public function meetpeople(){
		$this->load->view("meetpeople");
	}
	
	public function whoweare(){
		$this->load->view("whoweare");
	}
	
	public function main_article(){
		$this->load->view("mainArticle");
	}
	
	public function inspireme(){
		if(isset($_SESSION["cart"])){
			$sum_cart = count($_SESSION["cart"]);
		}
		else{
			$sum_cart = 0;
		}
		
		$data["sum_cart"] = $sum_cart;
		$this->load->model("collection_model","",TRUE);
		$collection = $this->collection_model->select_random();
		$data["collection"] = $collection;
		$this->load->view("inspireme",$data);
	}
	
	public function product_detail($collection_id, $shoe_id){
		$this->load->model("collection_model","",TRUE);
		$collection = $this->collection_model->select_by_id($collection_id);
		$related_product = $this->collection_model->select_random_related_product($shoe_id, $collection_id);
		$data["related_product"] = $related_product;
		$data["collection"] = $collection->row(1);
		$this->load->view("product_detail",$data);
	}
	
	public function payment_v(){
		$this->load->view("payment_verivication");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */