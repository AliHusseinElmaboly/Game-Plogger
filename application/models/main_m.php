<?php
class main_m extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function save($title, $url)
	{
		$this->db->set('title', $title);
		$this->db->set('image', $url);
		$this->db->insert('tbl');
	}
}
