<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('perawat_model');
		$this->load->model('pasien_model');
	}

	public function index() {
		if ($this->session->userdata('logged_in')) {
			switch ($this->session->userdata('role')) {
				case 'perawat':
					redirect('perawat');
					break;
				case 'pasien':
					redirect('pasien');
					break;
				default:
					redirect('auth/logout');
					break;
			}
		} else {
			$this->load->view('login_view');
		}
	}

	public function loginPerawat() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$perawat = $this->perawat_model->getPerawatByUsername($username);
		if (! $perawat){
			$this->session->set_flashdata('danger','Gagal login username tidak ditemukan');
			redirect('auth');
			return;
		}

		if (! password_verify($password, $perawat->password)) {
			$this->session->set_flashdata('danger','Gagal login password salah');
			redirect('auth');
			return;
		}

		$array = array(
			'role' => 'perawat',
			'id'  => $perawat->id_perawat,
			'username' => $perawat->username,
			'nama' => $perawat->nama_perawat,
			'logged_in' => true,
		);
		$this->session->set_userdata($array);
		redirect('auth');
	}
	
public function loginPasien() {
		$noHp = $this->input->post('no_hp');
		$password = $this->input->post('password');
		$pasien = $this->pasien_model->getPasienByNoHp($noHp);
		if (! $pasien){
			$this->session->set_flashdata('danger','Gagal login username tidak ditemukan');
			redirect('auth');
			return;
		}

		if (! password_verify($password, $pasien->password)) {
			$this->session->set_flashdata('danger','Gagal login password salah');
			redirect('auth');
			return;
		}

		$array = array(
			'role' => 'pasien',
			'id' => $pasien->id_pasien,
			'no_hp'  => $pasien->no_hp,
			'nama' => $pasien->nama_pasien,
			'jenis_kelamin' => $pasien->jk,
			'usia' => $pasien->usia,
			'id_perawat' => $pasien->id_perawat,
			'logged_in' => true,
		);
		$this->session->set_userdata($array);
		redirect('auth');
	}

	public function logout() {
		session_destroy();
		redirect('auth');		
	}

}
