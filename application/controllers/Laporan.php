<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	    public function __construct() {
		parent::__construct();
		if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
		}
		$this->load->model('laporan_model');
	}

	public function createLaporan(){
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
		}

		$id_pasien = $this->session->userdata('id');
		$suhu = $this->input->post('suhu');
		$demam = $this->input->post('demam');
		$batuk = $this->input->post('batuk');
		$sesak = $this->input->post('sesak');
		$tenggorokan = $this->input->post('tenggorokan');
		$keluhan = $this->input->post('keluhan');

		if (!$id_pasien || !$suhu || $demam == '' || $batuk == '' || $sesak == '' || $tenggorokan == '') {
			$this->session->set_flashdata('danger', 'Masukkan semua data');
			redirect('pasien/createLaporan');
			return;
		}

		$array = array(
			'id_pasien' => $id_pasien,
			'suhu_tubuh' => $suhu,
			'demam' => $demam,
			'batuk_pilek' => $batuk,
			'sesak_nafas' => $sesak,
			'sakit_tenggorokan' => $tenggorokan,
			'lainnya' => $keluhan
		);

		if (! $this->laporan_model->createLaporan($array)) {
			$this->session->set_flashdata('danger','Laporan gagal ditambahkan');
			redirect('pasien/createLaporan');
			return;
		}

		$this->session->set_flashdata('success','Laporan berhasil ditambahkan');
		redirect('pasien');
	}

}