<?php

class Collection_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	function add($shoe_id, $collection_path, $collection_name, $collection_description, $username, $collection_price ){
		$sql = "INSERT INTO collection SET shoe_id = ? , collection_path = ?, collection_name = ?, collection_description = ?,  username = ?, collection_price = ?";
		$this->db->query($sql, array($shoe_id, $collection_path, $collection_name, $collection_description, $username, $collection_price));
	}
	
	function max(){
		$sql = "SELECT MAX(collection_id) as collection_id FROM collection";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$max_id = $row->collection_id;
		}
		return $max_id;
	}
	
	function add_detail($collection_id, $part_type_group_id, $part_type_id, $part_id, $pattern_color_id){
		$sql = "INSERT INTO collection_detail SET collection_id = ? , part_type_group_id = ?, part_type_id = ?, part_id = ?, pattern_color_id = ?";
		$this->db->query($sql, array($collection_id, $part_type_group_id, $part_type_id, $part_id, $pattern_color_id));
	}
	
	function select_random(){
		$sql = "SELECT * FROM collection order by rand() limit 0, 10";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function select_random_related_product($shoe_id, $collection_id){
		$sql = "SELECT * FROM collection WHERE shoe_id = ? AND collection_id != ? order by rand() limit 0, 5";
		$result = $this->db->query($sql, array($shoe_id, $collection_id));
		return $result;
	}
	
	function select_detail($collection_id){
		$sql = "SELECT * FROM collection_detail WHERE collection_id = ?";
		$result = $this->db->query($sql, array($collection_id));
		return $result;
	}
	
	function select_by_id($collection_id){
		$sql = "SELECT * FROM collection WHERE collection_id = ?";
		$result = $this->db->query($sql, array($collection_id));
		return $result;
	}
}



/* End of file user_model.php */

/* Location: ./application/model/user_model.php */