<?php

class User_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->library("session");
	}

	

	function select_all()

	{

		$sql = "SELECT * FROM shoe";

		$result = $this->db->query($sql);

		return $result;

	}

	

	function add($email, $first_name, $last_name, $age, $address, $phone)
	{
		if($email != "" && $first_name != "" && $last_name != "" && $age != "" && $address != "" && $phone != ""){
			$sql = "INSERT INTO customer SET customer_email = ?, customer_password = ?, 
					customer_first_name = ?, customer_last_name = ?, customer_age = ?, customer_address = ?, customer_phone = ?";
			$result = $this->db->query($sql,array($email, md5('12345'), $first_name, $last_name, $age, $address, $phone));
			$id=mysql_insert_id();
			$this->session->set_userdata('customer_id',$id);
			$this->session->set_userdata('customer_email',$email);
		}else{
			$result=0;
		}
	  return $result;
	}
	
	function check_login($username, $password)
	{
	  $pass_enc=md5($password);
	  
	  $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

	  $result = $this->db->query($sql,array($username, $pass_enc));
	  
	  $num = $result->num_rows();
	
	  return $num;
	}
	
	function check_login_member($email,$password)
	{
	  $pass_enc=md5($password);
	  
	  $sql = "SELECT * FROM customer WHERE customer_email = ? AND customer_password = ?";

	  $result = $this->db->query($sql,array($email, $pass_enc));
	  
	  $num = $result->result();
	
	  return $num;
	}


	

	function delete($shoe_id)

	{

		$sql = "DELETE FROM shoe WHERE shoe_id = ?";

		$result = $this->db->query($sql,array($shoe_id));

	}

	

	function select_by_id($shoe_id)

	{

		$sql = "SELECT * FROM shoe WHERE shoe_id = ?";

		$result = $this->db->query($sql,array($shoe_id));

		return $result;

	}

	

	function edit($shoe_id, $shoe_name, $shoe_path)

	{

		$sql = "UPDATE shoe SET shoe_name = ?, shoe_path = ? WHERE shoe_id = ? ";

		$result = $this->db->query($sql,array($shoe_name, $shoe_path, $shoe_id));

	}

	

	function max()

	{

		$sql = "SELECT MAX(shoe_id) as shoe_id FROM shoe";

		$result = $this->db->query($sql);

		foreach($result->result() as $row)

		{

			$max_id = $row->shoe_id;

		}

		return $max_id;

	}
	
	function history_login($username, $ip){
	  $sql = "UPDATE admin SET last_login=now(), ip_address = ? WHERE username = ?";
	  $result = $this->db->query($sql,array($ip, $username));
	  return $result;
	}
	
	function cek_token($token){
	  $sql = "SELECT a.*,b.* FROM customer a JOIN token b ON a.token=b.token WHERE a.token = ? AND b.status='NO'";
	  $result = $this->db->query($sql,array($token));
	  return $result;
	}
	
	function select_all_customer(){
		$sql = "SELECT * FROM customer ORDER BY customer_id";

		$result = $this->db->query($sql);

		return $result;
	}
	
	function select_all_payment_confirmation(){
		$sql = "SELECT * FROM confirmation";

		$result = $this->db->query($sql);

		return $result;
	}
	
	function count_all_customer()
	{
		$sql = "SELECT count(customer_id) as customer_id FROM customer";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$count = $row->customer_id;
		}
		return $count;
	}
	
	function count_all_payment_confirmation()
	{
		$sql = "SELECT count(order_number) as order_number FROM confirmation";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$count = $row->order_number;
		}
		return $count;
	}
	
	function select_limit_customer($start_with, $limit){
		$sql = "SELECT * FROM customer LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function select_limit_payment_confirmation($start_with, $limit){
		$sql = "SELECT * FROM confirmation LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;
	}

}



/* End of file user_model.php */

/* Location: ./application/model/user_model.php */