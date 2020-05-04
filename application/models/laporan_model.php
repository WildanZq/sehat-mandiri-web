<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('service_model');
	}

	function addLaporan($array){
		$this->db->insert('laporan', $this->service_model->escape_array($array));
		if ($this->db->affected_rows() == 0) return false;
        return true;
	}

}
