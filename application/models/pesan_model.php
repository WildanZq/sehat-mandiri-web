<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
	}

	function createPesan($data) {
		$this->db->insert('pesan', $this->service_model->escape_array($data));
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	function getPesanByIdPasien($id) {
		return $this->db
		->where('id_pasien', $this->db->escape_str($id))
		->get('pesan')
		->result();
	}

	function getPesanByIdPerawatAndIdPasien($id_perawat, $id_pasien) {
		return $this->db
		->where('id_pasien', $this->db->escape_str($id_pasien))
		->where('id_perawat', $this->db->escape_str($id_perawat))
		->get('pesan')
		->result();
	}
}
