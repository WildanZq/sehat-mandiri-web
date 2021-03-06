<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
	}

	function getPasienByNoHp($noHp) {
		return $this->db
		->where('no_hp', $this->db->escape_str($noHp))
		->get('pasien')
		->row();
	}

	function createPasien($data) {
		$this->db->insert('pasien', $this->service_model->escape_array($data));
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	function getPasienByIdPerawat($idPerawat){
		return $this->db
		->where('id_perawat', $this->db->escape_str($idPerawat))
		->get('pasien')
		->result();
	}

	function getPasienById($id){
		return $this->db
		->where('id_pasien', $this->db->escape_str($id))
		->get('pasien')
		->row();	
	}

	function deletePasien($id){
		$this->db
		->where('id_pasien', $this->db->escape_str($id))
		->delete('pasien');
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	public function changePassword($id, $password) {
		return $this->db
		->set('password', $this->db->escape_str($password))
		->where('id_pasien', $this->db->escape_str($id))
		->update('pasien');
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	public function getPasienByIdPerawatAndLikeName($idPerawat, $name) {
		return $this->db
		->where('id_perawat', $this->db->escape_str($idPerawat))
		->like('nama_pasien', $this->db->escape_str($name))
		->get('pasien')
		->result();
	}

}
