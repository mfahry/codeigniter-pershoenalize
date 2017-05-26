<?php

class Shoe_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT * FROM shoe";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($shoe_name, $shoe_path)
	{
		$sql = "INSERT INTO shoe SET shoe_name = ?, shoe_path = ?";
		$result = $this->db->query($sql,array($shoe_name, $shoe_path));
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
	
	function select_limit($start_with, $limit){
		$sql = "SELECT shoe_id, shoe_name, shoe_path FROM shoe LIMIT ".$start_with.",".$limit;	
		$result = $this->db->query($sql);
		return $result;
	}
	
	function count_all()
	{
		$sql = "SELECT count(shoe_id) as shoe_id FROM shoe";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$count = $row->shoe_id;
		}
		return $count;
	}
	
}

/* End of file shoe_model.php */
/* Location: ./application/model/shoe_model.php */