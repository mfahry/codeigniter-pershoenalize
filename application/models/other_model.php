<?php

class Other_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	function list_province(){
		$sql = "SELECT * FROM province ORDER BY province_name";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add_deliver($deliver_name, $deliver_address, $province_id, $deliver_city, $deliver_zipcode, $deliver_telephone){
		$sql = "INSERT INTO deliver SET deliver_name = ?, deliver_address = ?, province_id = ?, deliver_city = ?, deliver_zipcode = ?, deliver_telephone = ?";
		$this->db->query($sql, array($deliver_name, $deliver_address, $province_id, $deliver_city, $deliver_zipcode, $deliver_telephone));
	}
	
	function max_deliver(){
		$sql = "SELECT MAX(deliver_id) as deliver_id FROM deliver";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$max_id = $row->deliver_id;
		}
		return $max_id;
	}
	
	function add_confirmation($order_number, $confirmation_path){
		$sql = "INSERT INTO confirmation SET order_number = ?,  confirmation_path = ?";
		$this->db->query($sql, array($order_number, $confirmation_path));
	}
}



/* End of file user_model.php */

/* Location: ./application/model/user_model.php */