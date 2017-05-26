<?php 
class Part_type_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT a.part_type_id, a.part_type_name, b.part_type_group_id, b.part_type_group_name, c.shoe_id, c.shoe_name 
				FROM part_type a 
				JOIN part_type_group b 
				ON(a.part_type_group_id = b.part_type_group_id)
				JOIN shoe c
				ON(a.shoe_id = c.shoe_id)";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($part_type_name, $part_type_group_id, $part_type_path, $shoe_id)
	{
		$sql = "INSERT INTO part_type SET part_type_name = ?, part_type_group_id = ?, part_type_path = ?, shoe_id = ?";
		$result = $this->db->query($sql,array($part_type_name, $part_type_group_id, $part_type_path, $shoe_id));
	}
	
	function delete($part_type_id)
	{
		$sql = "DELETE FROM part_type WHERE part_type_id = ?";
		$result = $this->db->query($sql,array($part_type_id));
	}
	
	function select_by_id($part_type_id)
	{
		$sql = "SELECT a.*, b.part_type_group_name FROM part_type a JOIN part_type_group b ON(a.part_type_group_id = b.part_type_group_id) WHERE a.part_type_id = ?";
		$result = $this->db->query($sql,array($part_type_id));
		return $result;
	}
	
	function edit($part_type_id, $part_type_name, $part_type_group_id, $part_type_path, $shoe_id)
	{
		$sql = "UPDATE part_type SET part_type_name = ?, part_type_group_id = ?, part_type_path = ?, shoe_id = ? WHERE part_type_id = ? ";
		$result = $this->db->query($sql,array($part_type_name, $part_type_group_id, $part_type_path, $shoe_id, $part_type_id));
	}
	
	function max()
	{
		$sql = "SELECT MAX(part_type_id) as part_type_id FROM part_type";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$max_id = $row->part_type_id;
		}
		return $max_id;
	}
	
	function select_filter($shoe_id, $part_type_group_id)
	{
		$sql = "SELECT a.part_type_id, a.part_type_name, b.part_type_group_id, b.part_type_group_name, c.shoe_id, c.shoe_name 
				FROM part_type a 
				JOIN part_type_group b 
				ON(a.part_type_group_id = b.part_type_group_id)
				JOIN shoe c
				ON(a.shoe_id = c.shoe_id)
				WHERE a.shoe_id = ? and a.part_type_group_id = ?"; 
		$result = $this->db->query($sql, array($shoe_id, $part_type_group_id));
		return $result;
	}
	
	function count_all()
	{
		$sql = "SELECT count(part_type_id) as part_type_id FROM part_type";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$count = $row->part_type_id;
		}
		return $count;
	}
	
	function select_limit($start_with, $limit){
		$sql = "SELECT a.part_type_id, a.part_type_name, a.part_type_path, b.part_type_group_id, b.part_type_group_name, c.shoe_id, c.shoe_name 
				FROM part_type a 
				JOIN part_type_group b 
				ON(a.part_type_group_id = b.part_type_group_id)
				JOIN shoe c
				ON(a.shoe_id = c.shoe_id) LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;
	}
}