<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perawat_model extends CI_Model{
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
    }

	function getPerawatByUsername($username) {
		return $this->db
		->where('username', $this->db->escape_str($username))
		->get('perawat')
		->row();
	}

	function createPerawat($data) {
		$this->db->insert('perawat', $this->service_model->escape_array($data));
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	public function getPerawatById($id) {
		return $this->db
		->where('id_perawat', $this->db->escape_str($id))
		->get('perawat')
		->row();	
	}

	public function changePassword($id, $password) {
		return $this->db
		->set('password', $this->db->escape_str($password))
		->where('id_perawat', $this->db->escape_str($id))
		->update('perawat');
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

}