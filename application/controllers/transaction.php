<?php

class Transaction extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
		if($this->session->userdata("admin") != "" && $this->session->userdata("pass_admin") != ""){
			return true;
		}else{
			redirect('user/admin', 'refresh');
		}
	}
	
	public function view_limit(){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("transaction_model","",TRUE);
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		
		$count = $this->transaction_model->count_all();
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
		$data["transaction"] = $this->transaction_model->select_limit($start_with,$limit);
		$data["transaction_detail"] = $this->transaction_model->select_all_detail();
		
		$this->load->view("backend/list_transaction",$data);
		
	}
	
	public function search_by_order_number($order_number){
		$limit = 10;
		$start_with = $this->input->get("start_with");
		$num_page = $this->input->get("num_page");
		$this->load->model("transaction_model","",TRUE);
		$order_number = "#".$order_number;
		
		if($start_with == ""){
			$start_with = 0;
			$num_page=1;
		}
		$transaction = $this->transaction_model->select_by_order_number($order_number);
		$temp = $transaction->result();
		$count = count($temp);
		
		$data["num_page"] = $num_page;
		$data["sum_page"] = ceil($count/$limit);
		$data["count"] = $count;
		$data["start_with"] = $start_with;
		$data["transaction"] = $transaction;
		$data["transaction_detail"] = $this->transaction_model->select_all_detail();
		
		$this->load->view("backend/list_transaction",$data);		
	}
	
	public function generate_shoe(){
		$transaction_id = $this->input->get("transaction_id");
		$this->load->model("transaction_model","",TRUE);
		$data["pattern_color"] = $this->transaction_model->get_pattern_color($transaction_id);
		$this->load->view("backend/generate_shoe",$data);
	}
	
	public function edit($transaction_id){
		$this->load->model("transaction_model","",TRUE);
		$temp = $this->transaction_model->select_by_id($transaction_id);	
		$transaction = $temp->row(1);
		$data["transaction"] = $transaction;
		$this->load->view("backend/edit_transaction",$data);
	}
	
	public function edit_process(){
		$transaction_id = $this->input->post("transaction_id");
		$customer_email = $this->input->post("customer_email");
		$order_number = $this->input->post("order_number");
		$payment_status = $this->input->post("payment_status");
		$delivery_status = $this->input->post("delivery_status");
		$payment_status_old = $this->input->post("payment_status_old");
		$delivery_status_old = $this->input->post("delivery_status_old");
		$this->load->model("transaction_model","",TRUE);
		
		$this->transaction_model->edit($order_number, $payment_status, $delivery_status);	
		
		
		if($payment_status != $payment_status_old){
			$to  = $customer_email;
			$subject = 'Pershoenalize Order Confirmation';
			$message = "Your payment with order number ".$order_number." have been verified by administrator. Thank you. Pershoenalize";
			$headers = 'From: Customer Service Pershoenalize muhammadfahry18@gmail.com' . "\r\n" .'Reply-To: '.$customer_email.'' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
		}
		
		if($delivery_status != $delivery_status_old){
			$to  = $customer_email;
			$subject = 'Pershoenalize Order Confirmation';
			$message = "Your Order with order number ".$order_number." have been sent by Pershoenalize. Thank you. Pershoenalize";
			$headers = 'From: Customer Service Pershoenalize muhammadfahry18@gmail.com' . "\r\n" .'Reply-To: '.$customer_email.'' . "\r\n" .'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);
		}
	}
}
