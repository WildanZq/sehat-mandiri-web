<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	    public function __construct() {
		parent::__construct();
		if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
        }
	}

	function createPesanPerawat() {
		if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
		}

		$id_perawat = $this->session->userdata('id');
		$pesan = $this->input->post('pesan');
		$id_pasien = $this->input->post('id_pasien');
		$data = array(
			'id_pasien' => $id_pasien, 
			'id_perawat' => $id_perawat,
			'pesan' => $pesan,
			'pengirim' => $this->session->userdata('role')
		);
		if (! $this->pesan_model->createPesan($data)) {
			$this->session->set_flashdata('danger', 'Pesan gagal dikirim');
			redirect('perawat/pesan/'.$this->input->post('id_pasien'));
			return;
		}

		$this->session->set_flashdata('success', 'Pesan berhasil dikirim');
		redirect('perawat/pesan/'.$this->input->post('id_pasien'));
	}

	function createPesanPasien() {
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
		}

		$id_pasien = $this->session->userdata('id');
		$pesan = $this->input->post('pesan');
		$this->load->model('pasien_model');
		$pasien = $this->pasien_model->getPasienById($id_pasien);
		$data = array(
			'id_pasien' => $id_pasien, 
			'id_perawat' => $pasien->id_perawat,
			'pesan' => $pesan,
			'pengirim' => $this->session->userdata('role')
		);
		if (! $this->pesan_model->createPesan($data)) {
			$this->session->set_flashdata('danger', 'Pesan gagal dikirim');
			redirect('pasien/pesan');
			return;
		}

		$this->session->set_flashdata('success', 'Pesan berhasil dikirim');
		redirect('pasien/pesan');
	} 
}