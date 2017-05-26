<?php

class Color_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT * FROM color";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($color_name)
	{
		$sql = "INSERT INTO color SET color_name = ?";
		$result = $this->db->query($sql,array($color_name));
	}
	
	function delete($color_id)
	{
		$sql = "DELETE FROM color WHERE color_id = ?";
		$result = $this->db->query($sql,array($color_id));
	}
	
	function select_by_id($color_id)
	{
		$sql = "SELECT * FROM color WHERE color_id = ?";
		$result = $this->db->query($sql,array($color_id));
		return $result;
	}
	
	function edit($color_id, $color_name)
	{
		$sql = "UPDATE color SET color_name = ? WHERE color_id = ? ";
		$result = $this->db->query($sql,array($color_name, $color_id));
	}
	
	function select_limit($start_with, $limit){
		$sql = "SELECT * FROM color LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function count_all(){
		$sql = "SELECT count(*) as color_id FROM color";
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$color_id = $row->color_id;
		}
		return $color_id;
	}
}

/* End of file part_model.php */
/* Location: ./application/model/part_model.php */