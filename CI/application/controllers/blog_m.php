<?php

class blog_m extends CI_Model{

		public function insert_data($table,$data)
		{
			$this->db->insert($table,$data);
		}
	
}
?>