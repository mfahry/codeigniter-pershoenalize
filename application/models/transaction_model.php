<?php
class Transaction_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	function add($customer_id, $size, $quantity, $deliver_id, $order_number, $bank_account){
		$sql = "INSERT INTO transaction SET customer_id = ?,  transaction_date = now(), size= ? , quantity = ?, deliver_id = ?, order_number = ?, bank_account = ?";
		$result = $this->db->query($sql, array($customer_id, $size, $quantity, $deliver_id, $order_number, $bank_account));
	}

	function add_detail($transaction_id, $pattern_color_id){
		$sql = "INSERT INTO transaction_detail SET transaction_id = ? , pattern_color_id = ?";
		$result = $this->db->query($sql, array($transaction_id, $pattern_color_id));
	}
	
	function select_limit($start_with, $limit){
		$query = "SELECT transaction_id, payment_status, delivery_status, transaction_date, customer_first_name, customer_last_name, size, quantity, order_number, bank_account
				  FROM transaction a
				  JOIN customer b
				  ON(a.customer_id = b.customer_id)
				  ORDER BY transaction_date DESC LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($query);
		return $result;		
	}
	
	function select_by_order_number( $order_number){
		$query = "SELECT transaction_id, payment_status, delivery_status, transaction_date, customer_first_name, customer_last_name, size, quantity, order_number, bank_account
				  FROM transaction a
				  JOIN customer b
				  ON(a.customer_id = b.customer_id)
				  WHERE order_number = ?";
		$result = $this->db->query($query, array($order_number));
		return $result;		
	}
	
	function select_all_detail(){
		$query = "SELECT transaction_id, b.pattern_color_id, pattern_color_price, pattern_color_path, part_name, color_name, material_name 
				  FROM transaction_detail a
				  JOIN pattern_color b
				  ON(a.pattern_color_id = b.pattern_color_id)
				  JOIN part c
				  ON(b.part_id = c.part_id)
				  JOIN material_color d
				  ON(b.material_color_id = d.material_color_id)
				  JOIN material e
				  ON(d.material_id = e.material_id)
				  JOIN color f
				  ON(d.color_id = f.color_id)";
		$result = $this->db->query($query);
		return $result; 		
	}
	
	function count_all(){
		$sql = "SELECT COUNT(transaction_id) as transaction_id FROM transaction";
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$transaction_id = $row->transaction_id;
		}
		return $transaction_id;
	}
	
	function get_pattern_color($transaction_id){
		$sql = "SELECT * FROM (
					SELECT x.*, (
						SELECT MAX(part_type_group_id) 
						FROM part_type 
						WHERE part_type_id = x.part_type_id 
					) as part_type_group_id 
					FROM (
						SELECT 
						transaction_id, 
						b.pattern_color_id, 
						pattern_color_path,
						part_id,
						(SELECT MAX(part_type_id) FROM part_mapping WHERE part_id = b.part_id ) as part_type_id
						FROM transaction_detail a
						JOIN pattern_color b
						ON(a.pattern_color_id = b.pattern_color_id) 
						WHERE transaction_id = ?
					) x
				) y	ORDER BY part_type_group_id, part_id 
				";
		$result = $this->db->query($sql, array($transaction_id));
		return $result;	
	}
	
	function max(){
		$sql = "SELECT MAX(transaction_id) as transaction_id FROM transaction";
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$max_id = $row->transaction_id;
		}
		return $max_id;
	}
	
	function checkout($code){
	  $sql = "UPDATE token set status='USE' WHERE token=?";
	  $result = $this->db->query($sql,array($code));
	  $array_items = array('customer_id' => "", 'customer_email' => "", 'customer_kode' => "");
	  $this->session->unset_userdata($array_items);	  
	  return $result;
	}
	
	function select_by_id($transaction_id){
		$query = "SELECT transaction_id, payment_status, delivery_status, transaction_date, customer_first_name, customer_last_name, size, quantity, order_number, bank_account, customer_email
				  FROM transaction a
				  JOIN customer b
				  ON(a.customer_id = b.customer_id)
				  WHERE transaction_id = ?";
		$result = $this->db->query($query, array($transaction_id));
		return $result;	
	}
	
	function edit($order_number, $payment_status, $delivery_status){
		$sql = "UPDATE transaction SET payment_status = ? , delivery_status = ? WHERE order_number = ?";
		$result = $this->db->query($sql, array($payment_status, $delivery_status, $order_number));
	}
}



/* End of file user_model.php */

/* Location: ./application/model/user_model.php */