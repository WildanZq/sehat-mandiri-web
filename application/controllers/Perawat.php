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
		$pasien = [];

		if ($this->input->get('query')) {
			$pasien = $this->pasien_model->getPasienByIdPerawatAndLikeName($idPerawat, $this->input->get('query'));
		} else {
			$pasien = $this->pasien_model->getPasienByIdPerawat($idPerawat);
		}
        $data = [
        	'pasien' => $pasien
        ];
       
		$this->load->view('perawat/home_view', $data);
	}

	public function account() {
		if ($this->session->userdata('role') != 'perawat') {
			redirect('auth');
			return;
		}
		$this->load->view('perawat/account_view');
	}

	public function registrasiPasien() {
    	if ($this->session->userdata('role') != 'perawat') {
			redirect('auth');
			return;
    	}
		$this->load->view('pasien/registrasi_view');
	}

	public function detailPasien() {
        if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
		}
		$id = $this->uri->segment(3);
		$idPerawat = $this->session->userdata('id');
        $this->load->model('pasien_model');
		$this->load->model('laporan_model');
		$this->load->model('pesan_model');
		$pasien = $this->pasien_model->getPasienById($id);
		if ($pasien->id_perawat != $idPerawat) {
			redirect('perawat');
		}

        $laporan = $this->laporan_model->getLaporanByIdPasien($id);
        $pesan = $this->pesan_model->getPesanByIdPerawatAndIdPasien($idPerawat, $id);
        $data = [
            'pasien' => $pasien,
			'laporan' => $laporan,
			'pesan' => $pesan
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
		$this->load->model('perawat_model');
		$data = $this->perawat_model->getPerawatByUsername($username);
		if($data){
			$this->session->set_flashdata('danger', 'Username telah terdaftar sebelumnya');
			redirect('perawat/registrasi');
		}

		$array = array(
			'username' => $username,
			'password' => $password,
			'nama_perawat' => $nama_perawat,
		);

		if (!$username || !$password || !$nama_perawat) {
			$this->session->set_flashdata('danger','Masukkan semua data');
			redirect('Auth');
			return;
		}

		if (!$this->perawat_model->createPerawat($array)) {
			$this->session->set_flashdata('danger', 'Anda gagal daftar');
			redirect('perawat/registrasi');
			return;
		}

		$this->session->set_flashdata('success', 'Anda berhasil daftar');
		redirect('Auth');
	}


	public function changePassword() {
		if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
		}

		$id = $this->session->userdata('id');
		$passwordBaru = $this->input->post('pass_baru');
		$passwordLama = $this->input->post('pass_lama');
		$perawat = $this->perawat_model->getPerawatById($id);

		if (!$passwordBaru) {
			$this->session->set_flashdata('danger', 'Masukkan semua data');
			redirect('perawat/account');
			return;
		}

	   	if (! password_verify($passwordLama, $perawat->password)) {
			$this->session->set_flashdata('danger', 'Password salah');
			redirect('perawat/account');
			return;
		}

		$password = password_hash($passwordBaru, PASSWORD_DEFAULT);
		if (! $this->perawat_model->changePassword($id, $password)) {
			$this->session->set_flashdata('danger', 'Password gagal diganti');
			redirect('perawat/account');
			return;
		}

		$this->session->set_flashdata('success', 'Password berhasil diganti');
		redirect('perawat/account');
	}

}