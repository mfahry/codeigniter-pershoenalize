<?php
class Part_type_group_model extends CI_Model{	
	function __construct(){		
		parent::__construct();	
	}		
	function select_all(){
		$sql = "SELECT * FROM part_type_group";
		$result = $this->db->query($sql);		
		return $result;	
	}
}