<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_model extends CI_Model {
	function getPasienByNoHp($noHp){
		return $this->db->where('no_hp', $noHp)->get('pasien')->row();
	}

	function createPasien($data){
		$this->db->insert('pasien',$data);
	}
}
