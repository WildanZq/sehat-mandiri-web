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

	function getLaporanByIdPasien($id){
		return $this->db
		->where('id_pasien', $this->db->escape_str($id))
		->get('laporan')
		->row();
	}

	public function getPerawatById($id){
		return $this->db
		->where('id_perawat', $this->db->escape_str($id))
		->get('perawat')
		->row();	
	}
	public function gantiPassword($password, $where){
		return $this->db
		->update('perawat', $password, $where);
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	function tampilkanPesanPerawat($id_perawat, $id_pasien){//karena perawat bisa punya banyak pesien tapi pasien punya satu perawat
		return $this->db
		->get_where('pesan', array('id_perawat' => $id_perawat,'id_pasien' => $id_pasien) )
		->row();
	}

}