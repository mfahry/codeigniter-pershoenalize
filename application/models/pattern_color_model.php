<?php

class Pattern_color_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT a.pattern_color_id, a.pattern_color_price, a.pattern_color_path, b.part_id, b.part_name, d.color_id, d.color_name, e.material_id, e.material_name
				FROM pattern_color a
				JOIN part b
				ON(a.part_id = b.part_id)
				JOIN material_color c
				ON(a.material_color_id = c.material_color_id)
				JOIN color d
				ON(c.color_id = d.color_id)
				JOIN material e
				ON(c.material_id = e.material_id)";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($part_id, $material_color_id, $pattern_color_price, $pattern_color_path)
	{
		$sql = "INSERT INTO pattern_color SET part_id = ?, material_color_id = ?, pattern_color_price = ?, pattern_color_path = ?";
		$result = $this->db->query($sql,array($part_id, $material_color_id, $pattern_color_price, $pattern_color_path));
	}
	
	function delete($pattern_color_id)
	{
		$sql = "DELETE FROM pattern_color WHERE pattern_color_id = ?";
		$result = $this->db->query($sql,array($pattern_color_id));
	}
	
	function select_by_id($pattern_color_id)
	{
		$sql = "SELECT a.pattern_color_id, a.pattern_color_price, a.material_color_id, a.pattern_color_path, b.part_id, b.part_name, d.color_id, d.color_name, e.material_id, e.material_name
				FROM pattern_color a
				JOIN part b
				ON(a.part_id = b.part_id)
				JOIN material_color c
				ON(a.material_color_id = c.material_color_id)
				JOIN color d
				ON(c.color_id = d.color_id)
				JOIN material e
				ON(c.material_id = e.material_id)
				WHERE a.pattern_color_id = ?";
		$result = $this->db->query($sql,array($pattern_color_id));
		return $result;
	}
	
	function edit($pattern_color_id, $part_id, $material_color_id, $pattern_color_price, $pattern_color_path)
	{
		$sql = "UPDATE pattern_color SET part_id = ?, material_color_id = ?, pattern_color_price = ?, pattern_color_path = ? WHERE pattern_color_id = ? ";
		$result = $this->db->query($sql,array($part_id, $material_color_id, $pattern_color_price, $pattern_color_path, $pattern_color_id));
	}
	
	function max(){
		$sql = "SELECT MAX(pattern_color_id) as pattern_color_id 
				FROM pattern_color";
		$result = $this->db->query($sql);
		
		foreach($result->result() as $row){
			$max = $row->pattern_color_id;
		}
		return $max;
	}
}

/* End of file shoe_model.php */
/* Location: ./application/model/shoe_model.php */