<?php



class Material_color_model extends CI_Model{



	function __construct()

	{

		parent::__construct();

	}

	

	function select_all()

	{

		$sql = "SELECT a.material_color_id, a.material_color_path, b.material_id, b.material_name, c.color_id, c.color_name 

				FROM material_color a 

				JOIN material b

				ON(a.material_id = b.material_id)
				
				JOIN color c
				
				ON(a.color_id = c.color_id)";

		$result = $this->db->query($sql);

		return $result;

	}

	

	function add($material_id, $color_id, $material_color_path)

	{

		$sql = "INSERT INTO material_color SET material_id = ?, color_id = ?, material_color_path = ?";

		$result = $this->db->query($sql,array($material_id, $color_id, $material_color_path));

	}

	

	function delete($material_color_id)

	{

		$sql = "DELETE FROM material_color WHERE material_color_id = ?";

		$result = $this->db->query($sql,array($material_color_id));

	}

	

	function select_by_id($material_color_id)

	{

		$sql = "SELECT a.*, b.material_name, c.color_name 

				FROM material_color a 

				JOIN material b

				ON(a.material_id = b.material_id)
				
				JOIN color c
				
				ON(a.color_id = c.color_id)
				
				WHERE material_color_id = ?";

		$result = $this->db->query($sql,array($material_color_id));

		return $result;

	}

	

	function edit($material_color_id, $material_id, $color_id, $material_color_path)

	{

		$sql = "UPDATE material_color SET material_id = ?, color_id = ?, material_color_path = ? where material_color_id = ?";

		$result = $this->db->query($sql,array( $material_id, $color_id, $material_color_path, $material_color_id));

	}
	
	function select_limit($start_with, $limit){
		$sql = "SELECT a.material_color_id, a.material_color_path, b.material_id, b.material_name, c.color_id, c.color_name 

				FROM material_color a 

				JOIN material b

				ON(a.material_id = b.material_id)
				
				JOIN color c
				
				ON(a.color_id = c.color_id) LIMIT ".$start_with.",".$limit;
		$result = $this->db->query($sql);
		return $result;
	}
	
	function count_all(){
		$sql = "SELECT count(*) as material_color_id FROM material_color";
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$material_color_id = $row->material_color_id;
		}
		return $material_color_id;
	}

}



/* End of file part_model.php */

/* Location: ./application/model/part_model.php */