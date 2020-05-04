<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	    public function __construct() {
		parent::__construct();
		if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
        }
	}

	public function addLaporan(){
		$id_pasien = $this->session->userdata('id');
		$suhu = $this->input->post('suhu');
		$demam = $this->input->post('demam');
		$batuk = $this->input->post('batuk');
		$sesak = $this->input->post('sesak');
		$tenggorokan = $this->input->post('tenggorokan');
		$keluhan = $this->input->post('keluhan');

		$array = array(
			'id_pasien' => $id_pasien,
			'suhu_tubuh' => $suhu,
			'demam' => $demam,
			'batuk_pilek' => $batuk,
			'sesak_nafas' => $sesak,
			'sakit_tenggorokan' => $tenggorokan,
			'lainnya' => $keluhan
		);

		if (! $this->laporan_model->addLaporan($array)) {
			$this->session->set_flashdata('danger','laporan tidak ada');
			redirect('pasien/terserah namae');
			return;
		}

		$this->session->set_flashdata('success','laporan berhasil diproses');
		redirect('pasien/terserah namae');
	}

}