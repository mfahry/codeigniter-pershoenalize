<?php
class Part_mapping_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function add($part_type_id, $part_id)
	{
		$sql = "INSERT INTO part_mapping SET part_type_id = ?, part_id = ?";
		$result = $this->db->query($sql, array($part_type_id, $part_id));
	}
	
	function select_all(){
		$sql = "SELECT b.part_type_id, b.part_type_name, c.part_id, c.part_name
				FROM part_mapping a
				JOIN part_type b
				ON(a.part_type_id = b.part_type_id)
				JOIN part c
				ON(a.part_id = c.part_id)";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function delete($part_type_id, $part_id){
		$sql = "DELETE FROM part_mapping WHERE part_type_id = ? AND part_id = ?";
		$result = $this->db->query($sql, array($part_type_id, $part_id));
	}
}