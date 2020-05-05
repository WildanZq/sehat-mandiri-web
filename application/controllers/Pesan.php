<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
		}
		$this->load->model('pesan_model');
	}

	function createPesanPerawat() {
		if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
		}

		$id_perawat = $this->session->userdata('id');
		$pesan = $this->input->post('pesan');
		$id_pasien = $this->input->post('id_pasien');
		if (! $id_pasien) {
			$this->session->set_flashdata('danger', 'Pesan gagal dikirim');
			redirect('perawat');
			return;
		}
		if (! $pesan) {
			redirect('perawat/detailPasien/'.$this->input->post('id_pasien'));
			return;
		}

		$data = array(
			'id_pasien' => $id_pasien, 
			'id_perawat' => $id_perawat,
			'pesan' => $pesan,
			'pengirim' => $this->session->userdata('role')
		);
		if (! $this->pesan_model->createPesan($data)) {
			$this->session->set_flashdata('danger', 'Pesan gagal dikirim');
			redirect('perawat/detailPasien/'.$this->input->post('id_pasien'));
			return;
		}

		redirect('perawat/detailPasien/'.$this->input->post('id_pasien'));
	}

	function createPesanPasien() {
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
		}

		$id_pasien = $this->session->userdata('id');
		$id_perawat = $this->session->userdata('id_perawat');
		$pesan = $this->input->post('pesan');
		if (! $pesan) {
			redirect('perawat/detailPasien/'.$this->input->post('id_pasien'));
			return;
		}

		$data = array(
			'id_pasien' => $id_pasien, 
			'id_perawat' => $id_perawat,
			'pesan' => $pesan,
			'pengirim' => $this->session->userdata('role')
		);
		if (! $this->pesan_model->createPesan($data)) {
			$this->session->set_flashdata('danger', 'Pesan gagal dikirim');
			redirect('pasien');
			return;
		}

		redirect('pasien');
	} 
}