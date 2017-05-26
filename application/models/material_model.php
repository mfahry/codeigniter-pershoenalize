<?php

class Material_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT * FROM material";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($material_name)
	{
		$sql = "INSERT INTO material SET material_name = ?";
		$result = $this->db->query($sql,array($material_name));
	}
	
	function delete($material_id)
	{
		$sql = "DELETE FROM material WHERE material_id = ?";
		$result = $this->db->query($sql,array($material_id));
	}
	
	function select_by_id($material_id)
	{
		$sql = "SELECT * FROM material WHERE material_id = ?";
		$result = $this->db->query($sql,array($material_id));
		return $result;
	}
	
	function edit($material_id, $material_name)
	{
		$sql = "UPDATE material SET material_name = ? WHERE material_id = ? ";
		$result = $this->db->query($sql,array($material_name, $material_id));
	}
	
	function select_limit($start_with, $limit){
		$sql = "SELECT * FROM material LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function count_all(){
		$sql = "SELECT count(*) as material_id FROM material";
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$material_id = $row->material_id;
		}
		return $material_id;
	}
}

/* End of file part_model.php */
/* Location: ./application/model/part_model.php */