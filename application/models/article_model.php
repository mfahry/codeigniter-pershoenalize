<?php

class Article_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	
	function select_all()
	{
		$sql = "SELECT * FROM article";
		$result = $this->db->query($sql);
		return $result;
	}
	
	function add($article_title, $for_page, $for_related, $pendahuluan, $content, $thumbnail_path)
	{
		$sql = "INSERT INTO article SET article_title = ?, for_page = ?, overview = ?, content = ?, thumbnail_path = ?";
		$result = $this->db->query($sql,array($article_title, $for_page, $pendahuluan, $content, $thumbnail_path));
		
		$sql1 = "INSERT INTO article_related SET article_id_related = ?";
		$result1 = $this->db->query($sql1,array($for_related));
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
		$sql = "SELECT * FROM article LIMIT ".$start_with.",".$limit;	
		$result = $this->db->query($sql);
		return $result;
	}
	
	function count_all()
	{
		$sql = "SELECT count(article_id) as article_id FROM article";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$count = $row->article_id;
		}
		return $count;
	}
	
}

/* End of file shoe_model.php */
/* Location: ./application/model/shoe_model.php */