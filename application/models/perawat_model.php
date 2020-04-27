<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perawat_model extends CI_Model{

	function getPerawatByUsername($username){
		return $this->db->where('username', $username)->get('perawat')->row();
	}

	function createPerawat($data){
		$this->db->insert('perawat',$data);
	}

}