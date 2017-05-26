<?php
class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	function index(){	
		//$this->load->model("user_model","",TRUE);
		//$data["user"] = $this->user_model->select_all();
		//$this->load->view('user_registration',$data);
		$this->load->view('user_registration');
	}
	
	function admin(){
		$this->load->view('backend/index');
	}

	function add(){
		$data["page"] = $this->load->view("user_registration","",TRUE);
		$data["active"] = "add user";
		$this->load->view("user_registration",$data);
	}
	
	function add_process(){
		$email = $this->input->post("email");
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$age = $this->input->post("age");
		$address = $this->input->post("address");
		$phone = $this->input->post("phone");
	
		$this->load->model("user_model","",TRUE);
		$data["cek"]=$this->user_model->add($email, $first_name, $last_name, $age, $address, $phone);
		if($data["cek"] > 0){
		  header("Location: ".base_url("user/login_member"));
		}else{
		  header("Location: ".base_url("user/register_member"));
		}
		//header("Location: ".base_url("user/index"));	
		//$this->load->view("generator");
	}
	
	function login_process(){
	  $username= $this->input->post("username");
	  $password = $this->input->post("password");
	  $pass_enc = md5($this->input->post("password"));
	  
	  $this->load->model("user_model","",TRUE);
	  $data["cek"] = $this->user_model->check_login($username, $password);
	  
	  if($data["cek"] > 0){
	  	$this->session->set_userdata("admin", $username);
		$this->session->set_userdata("pass_admin", $pass_enc);
		
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
		
		$this->user_model->history_login($username,$ip);
		header("Location: ".base_url("shoe/add_all_data"));
		//header("Location :".base_url("shoe/view_all_primary_data"));
	  }else{
	    $this->load->view("backend/index");
	  }
	  
	}
	
	function login_process_member(){
	  $email= $this->input->post("email");
	  $password = $this->input->post("password");
	  
	  $this->load->model("user_model","",TRUE);
	  $user = $this->user_model->check_login_member($email, $password);
	  
	  if(count($user) > 0){
		foreach($user as $row){
			$this->session->set_userdata("customer_id",$row->customer_id);
			$this->session->set_userdata("customer_email",$row->customer_email);
		}		
		redirect("/custom/shopping_cart");
	  }
	}
	
	function login_member(){
	  	$this->load->model("user_model","",TRUE);		
		$data["user"] = $this->user_model->select_all();
		$this->load->view('backend/index_member',$data);
	}
	
	function register_member(){
		$this->load->view('backend/register_member');
	}
	
	function view_customer(){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("user_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		$element["customer"] = $this->user_model->select_all_customer();

		$count = $this->user_model->count_all_customer();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
	
		$data["customer"] = $this->user_model->select_limit_customer($start_with,$limit);
		$data["active"] = "customer";
		$data["page"] = $this->load->view("backend/list_customer",$element,TRUE);
		//$this->load->view("backend/list_customer",$data);
		$this->load->view("backend/dashboard",$data);
	}
	
	function view_payment_confirmation(){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("user_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		$element["payment_confirmation"] = $this->user_model->select_all_payment_confirmation();

		$count = $this->user_model->count_all_payment_confirmation();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
	
		$data["payment_confirmation"] = $this->user_model->select_limit_payment_confirmation($start_with,$limit);
		$data["active"] = "payment confirmation";
		$data["page"] = $this->load->view("backend/list_payment_confirmation",$element,TRUE);
		//$this->load->view("backend/list_customer",$data);
		$this->load->view("backend/dashboard",$data);
	}
}

/* End of file shoe.php */
/* Location: ./application/controllers/shoe.php */