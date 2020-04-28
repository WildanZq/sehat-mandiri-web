<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
    public function __construct() {
		parent::__construct();
		if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
        }
		$this->load->model('pasien_model');
	}
	
	public function index() {
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
        }
		$this->load->view('pasien/home_view');
	}

	public function createPasien() {
		$noHp = $this->input->post('no_hp');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$nama_pasien = $this->input->post('nama_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$usia = $this->input->post('usia');

		$array = array(
			'nama_pasien' => $nama_pasien,
			'jk' => $jenis_kelamin,
			'usia' => $usia,
			'no_hp' => $noHp,
			'password' => $password,
			'id_perawat' => $this->session->userdata('id') 
		);
		if (! $this->pasien_model->createPasien($array)) {
			$this->session->set_flashdata('danger','Pasien gagal didaftarkan');
			redirect('pasien/registrasi');
			return;
		}

		$this->session->set_flashdata('success','Pasien berhasil didaftarkan');
		redirect('perawat');
	}
}