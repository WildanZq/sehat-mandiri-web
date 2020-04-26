<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_perawat');
	}

	public function index() {
		if($this->session->userdata('nama')){
			$this->load->view('v_test');
		} else {
			$this->load->view('v_login');
			// redirect('Auth');
		}
		
	}

	public function registrasi(){
		$this->load->view('v_registrasiPerawat');
	}


	public function registrasi_perawat(){
		$username = $this->input->post('username');
		$password = $this->enkripsi($this->input->post('password'));
		$nama_perawat = $this->input->post('nama_perawat');

		$array = array(
			'username' => $username,
			'password' => $password,
			'nama_perawat' => $nama_perawat,
		);
		$this->m_perawat->createPerawat($array);
		redirect('Auth');
	}


	public function login_perawat(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$get = $this->m_perawat->getPerawatByUsername($username);
		if($get){
			if (password_verify($password, $get->password)) {
				$array = array(
					'Role' => 'perawat',
					'id'  => $get->id_perawat,
					'username' =>$get->username,
					'nama' =>$get->nama_perawat,
					'logged_in' => true,

				);
		    	$this->session->set_userdata($array);
		    	redirect('Auth');
			} else {
		      $this->session->flashdata('pesan','Gagal login password salah');
			    redirect('Auth');
			}
		} else {
			$this->session->flashdata('pesan','Gagal login data tidak ditemukan');
			redirect('Auth');
		}
	}
	
	public function logout(){
		session_destroy();
		redirect('Auth');		
	} 


	public function enkripsi($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}

	

}
