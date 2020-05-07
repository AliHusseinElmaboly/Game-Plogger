<?php
	class Blog_Model extends CI_Model {

		function __construct() {
			//cakk the model constructor
			parent::__construct();
		}

		public function getGames(){
			$query = $this->db->query('SELECT * FROM games');
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}

		public function getGame($id){
			$query = $this->db->query('SELECT * FROM games WHERE id = '.$id);
			$objects = $query->result();
			return $objects[0];
		}

		public function getGamesOfCategory($category){
			$query = $this->db->query('SELECT * FROM games WHERE category = '.$category);
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}

		public function getCategories(){
			$query = $this->db->query('SELECT * FROM categories');
			if($query->num_rows() > 0)
				return $query->result();
			else
				return NULL;
		}

		public function getCategory($id){
			$query = $this->db->query('SELECT * FROM categories WHERE id = '.$id);
			$objects = $query->result();
			return $objects[0];
		}

		public function getAdminGames(){
			$query = $this->db->query('SELECT games.*, categories.type FROM games INNER JOIN categories ON games.category = categories.id');
			if ($query->num_rows() > 0)
				return $query->result();//return an array of objects
			else
				return NULL;
		}

		public function insert($table, $data){
			if($this->db->insert($table, $data)){
				return true;
			}
		}

		public function update($table, $data, $id){
			if($this->db->update($table, $data, "id = ".$id)){
				return true;
			}
		}

		public function delete($table,$id){
			if($this->db->delete($table,"id = ".$id)){
				return true;
			}
		}

	}
?>