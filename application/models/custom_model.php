<?php
class Custom_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	function get_part_type_group($shoe_id){
		$sql = "SELECT distinct c.part_type_group_id, c.part_type_group_name
				FROM part_type a
				JOIN shoe b
				ON(a.shoe_id = b.shoe_id)
				JOIN part_type_group c
				ON(a.part_type_group_id = c.part_type_group_id)
				WHERE a.shoe_id = ? ORDER BY c.part_type_group_id ASC";
		$result = $this->db->query($sql,array($shoe_id));		
		return $result;		
	}
	
	function get_part_type($shoe_id, $part_type_group_id){
		$sql = "SELECT part_type_id, part_type_name, part_type_path
				FROM part_type 
				WHERE shoe_id = ? and part_type_group_id = ? ORDER  BY part_type_id ASC LIMIT 1 ";
		$result = $this->db->query($sql, array($shoe_id, $part_type_group_id));
		return $result;	
	}
	
	function get_part_type_all($shoe_id, $part_type_group_id){
		$sql = "SELECT part_type_id, part_type_name, part_type_path, part_type_group_id
				FROM part_type 
				WHERE shoe_id = ? and part_type_group_id = ? ORDER BY part_type_id ASC";
		$result = $this->db->query($sql, array($shoe_id, $part_type_group_id));
		return $result;	
	}
	
	function get_part($part_type_id){
		$sql = "SELECT part.part_id, part_name 
				FROM part_mapping 
				JOIN part
				USING (part_id)
				WHERE part_type_id = ? and (part.part_group_id = '1' or part.part_group_id = '2') ";
		$result = $this->db->query($sql, array($part_type_id));
		return $result;
	}
	
	function get_pattern_color($part_id){
		$sql = "SELECT * FROM pattern_color WHERE part_id = ? LIMIT 1";
		$result = $this->db->query($sql, array($part_id));
		return $result;
	}
	
	function get_pattern_color_all($part_id){
		//$sql = "SELECT  * FROM pattern_color JOIN material_color USING(material_color_id) WHERE part_id = ?";
		$sql = "SELECT  *,material_name,color_name FROM pattern_color JOIN material_color USING(material_color_id) JOIN material USING(material_id) JOIN color USING(color_id) WHERE part_id = ?";
		$result = $this->db->query($sql, array($part_id));
		return $result;
	}
	
	function get_part_name($part_id){
		$sql = "SELECT * FROM part WHERE part_id = ?";
		$result = $this->db->query($sql, array($part_id));
		$part = $result->row(1);
		return $part->part_name;	
	}
	
	function get_material_pattern_color_all($part_id){
		//$sql = "SELECT  * FROM pattern_color JOIN material_color USING(material_color_id) WHERE part_id = ?";
		$sql = "SELECT distinct material_id, material_name FROM pattern_color JOIN material_color USING(material_color_id) JOIN material USING(material_id) JOIN color USING(color_id) WHERE part_id = ?";
		$result = $this->db->query($sql, array($part_id));
		return $result;
	}
}



/* End of file custom_model.php */

/* Location: ./application/model/custom_model.php */