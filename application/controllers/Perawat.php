<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawat extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('perawat_model');
	}
	
	public function index() {
		if ($this->session->userdata('role') != 'perawat') {
			redirect('auth');
			return;
		}
		$this->load->model('pasien_model');
        $idPerawat = $this->session->userdata('id');
        $pasien = $this->pasien_model->getPasienByIdPerawat($idPerawat);
        $data = [
        	'pasien' => $pasien
        ];
		$this->load->view('perawat/home_view', $data);
	}

	public function registrasiPasien() {
    	if ($this->session->userdata('role') != 'perawat') {
			redirect('auth');
			return;
    	}
		$this->load->view('pasien/registrasi_view');
	}

	public function detailPasien($id) {
        if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
        }
        $this->load->model('pasien_model');
        // getPasienById (id dari parameter $id)
        // load model laporan
        // getLaporanByIdPasien
        $laporan= $this->perawat_model->getLaporanByIdPasien($id);
        $pasien = $this->pasien_model->getPasienById($id);
        $data = [
            'pasien' => $pasien,
            'laporan' => $laporan
        ];
        $this->load->view('perawat/detail_pasien_view.php', $data);
    }

    public function registrasi() {
		if ($this->session->userdata('logged_in')) {
            redirect('auth');
            return;
        }
		$this->load->view('perawat/registrasi_view');
	}

	public function createPerawat() {
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$nama_perawat = $this->input->post('nama_perawat');

		$array = array(
			'username' => $username,
			'password' => $password,
			'nama_perawat' => $nama_perawat,
		);
		if (! $this->perawat_model->createPerawat($array)) {
			$this->session->set_flashdata('danger','Anda gagal daftar');
			redirect('Auth/registrasi');
			return;
		}

		$this->session->set_flashdata('success','Anda berhasil daftar');
		redirect('Auth');
	}
}