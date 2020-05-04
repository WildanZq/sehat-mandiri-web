<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
	}

	function mengirimPesan($data){
		$this->db->insert('pesan',$data);
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

	function tampilkanPesanPasient($id_pasien){
		return $this->db
		->where('id_pasien', $this->db->escape_str($id_pasien))
		->get('pesan')
		->row();
	}

	function tampilkanPesanPerawat($id_perawat, $id_pasien){//karena perawat bisa punya banyak pesien tapi pasien punya satu perawat
		return $this->db
		->get_where('pesan', array('id_perawat' => $id_perawat,'id_pasien' => $id_pasien) )
		->row();
	}
}
