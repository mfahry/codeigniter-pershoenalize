<?php

class Part_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT a.part_id, a.part_name, b.part_group_id, b.part_group_name
				FROM part a
				JOIN part_group b
				ON(a.part_group_id = b.part_group_id)";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($part_name, $part_group_id)
	{
		$sql = "INSERT INTO part SET part_name = ?, part_group_id  = ?";
		$result = $this->db->query($sql,array($part_name, $part_group_id));
	}
	
	function delete($part_id)
	{
		$sql = "DELETE FROM part WHERE part_id = ?";
		$result = $this->db->query($sql,array($part_id));
	}
	
	function select_by_id($part_id)
	{
		$sql = "SELECT a.part_id, a.part_name, b.part_group_id, b.part_group_name
				FROM part a
				JOIN part_group b
				ON(a.part_group_id = b.part_group_id)
				WHERE a.part_id = ?";
		$result = $this->db->query($sql,array($part_id));
		return $result;
	}
	
	function edit($part_id, $part_name, $part_group_id)
	{
		$sql = "UPDATE part SET part_name = ?, part_group_id = ?  WHERE part_id = ? ";
		$result = $this->db->query($sql,array($part_name, $part_group_id, $part_id));
	}
	
	function count_all()
	{
		$sql = "SELECT count(part_id) as part_id FROM part";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$count = $row->part_id;
		}
		return $count;
	}
	
	function select_limit($start_with, $limit){
		$sql = "SELECT a.part_id, a.part_name, b.part_group_id, b.part_group_name
				FROM part a
				JOIN part_group b
				ON(a.part_group_id = b.part_group_id) LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;	
	
	}
	
	function select_filter($part_group_id){
		$sql = "SELECT a.part_id, a.part_name, b.part_group_id, b.part_group_name
				FROM part a
				JOIN part_group b
				ON(a.part_group_id = b.part_group_id)
				WHERE a.part_group_id = ?";
		$result = $this->db->query($sql, array($part_group_id));
		return $result;	
				
	}
}

/* End of file part_model.php */
/* Location: ./application/model/part_model.php */