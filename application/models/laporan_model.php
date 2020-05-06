<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
	}

	function createLaporan($array){
		$this->db->insert('laporan', $this->service_model->escape_array($array));
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	function getLaporanByIdPasien($id){
		return $this->db
		->where('id_pasien', $this->db->escape_str($id))
		->get('laporan')
		->result();
	}

	function getLaporanById($id){
		return $this->db
		->where('id_laporan', $this->db->escape_str($id))
		->get('laporan')
		->row();
	}

	function deleteLaporan($id){
		$this->db
		->where('id_laporan', $this->db->escape_str($id))
		->delete('laporan');
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

}
