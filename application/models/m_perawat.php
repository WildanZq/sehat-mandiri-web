<?php

class m_perawat extends CI_Model{

	function getPerawatByUsername($username){
		return $this->db->where('username', $username)->get('perawat')->row();
	}
	function createPerawat($data){
		$this->db->insert('perawat',$data);
	}

}