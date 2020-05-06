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
		$this->load->model('pesan_model');
		$this->load->model('laporan_model');
		$this->load->model('perawat_model');
		$idPasien = $this->session->userdata('id');
		$pesan = $this->pesan_model->getPesanByIdPasien($idPasien);
		$laporan = $this->laporan_model->getLaporanByIdPasien($idPasien);
		$perawat = $this->perawat_model->getPerawatById($this->session->userdata('id_perawat'));
		$data = [
			'pesan' => $pesan,
			'laporan' => $laporan,
			'perawat' => $perawat,
		];
		$this->load->view('pasien/home_view', $data);
	}

	public function account() {
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
		}
		$this->load->view('pasien/account_view');
	}

	public function createPasien() {
		if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
		}

		$noHp = $this->input->post('no_hp');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$nama_pasien = $this->input->post('nama_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$usia = $this->input->post('usia');

		if (!$noHp || !$password || !$nama_pasien || !$jenis_kelamin || !$usia) {
			$this->session->set_flashdata('danger','Masukkan semua data');
			redirect('perawat/registrasiPasien');
			return;
		}

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
			redirect('perawat/registrasiPasien');
			return;
		}

		$this->session->set_flashdata('success','Pasien berhasil didaftarkan');
		redirect('perawat');
	}

	function deletePasien() {
		if ($this->session->userdata('role') != 'perawat') {
            redirect('auth');
            return;
		}

		$id = $this->uri->segment(3);
		if (! $this->pasien_model->deletePasien($id)) {
			$this->session->set_flashdata('danger','Pasien gagal dihapus');
			redirect('perawat');
			return;
		}

		$this->session->set_flashdata('success','Pasien berhasil dihapus');
		redirect('perawat');
	}

	public function createLaporan() {
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
		}
		$this->load->view('pasien/create_laporan_view');
	}

	public function changePassword() {
		if ($this->session->userdata('role') != 'pasien') {
            redirect('auth');
            return;
		}

		$id = $this->session->userdata('id');
		$passwordBaru = $this->input->post('pass_baru');
		$passwordLama = $this->input->post('pass_lama');
		$pasien = $this->pasien_model->getPasienById($id);

		if (! password_verify($passwordLama, $pasien->password)) {
			$this->session->set_flashdata('danger', 'Password salah');
			redirect('pasien/account');
			return;
		}

		$password = password_hash($passwordBaru, PASSWORD_DEFAULT);
		if (! $this->pasien_model->changePassword($id, $password)) {
			$this->session->set_flashdata('danger', 'Password gagal diganti');
			redirect('pasien/account');
			return;
		}

		$this->session->set_flashdata('success', 'Password berhasil diganti');
		redirect('pasien/account');
	}

}