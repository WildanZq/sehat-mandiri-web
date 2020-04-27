<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perawat extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('perawat_model');
    }
    
    public function registrasi(){
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
		$this->perawat_model->createPerawat($array);
		$this->session->set_flashdata('success','Anda berhasil daftar');
		redirect('Auth');
	}
}