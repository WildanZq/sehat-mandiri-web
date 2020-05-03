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

	public function addLaporan(){
		$id_pasien = $this->input->post('id_pasien');
		$suhu = $this->input->post('suhu');
		$demam = $this->input->post('demam');
		$batuk = $this->input->post('batuk');
		$sesak = $this->input->post('sesak');
		$tenggorokan = $this->input->post('tenggorokan');
		$keluhan = $this->input->post('keluhan');

		$array = array(
			'id_pasien' => $id_pasien,
			'suhu_tubuh' => $suhu,
			'demam' => $demam,
			'batuk_pilek' => $batuk,
			'sesak_nafas' => $sesak,
			'sakit_tenggorokan' => $tenggorokan,
			'lainnya' => $keluhan
		);

		if (! $this->pasien_model->addLaporan($array)) {
			$this->session->set_flashdata('danger','laporan tidak ada');
			redirect('pasien/terserah namae');
			return;
		}

		$this->session->set_flashdata('success','laporan berhasil diproses');
		redirect('pasien/terserah namae');
	}

	function deletePasien(){
		$id = $this->uri->segment(3);
		$where = array('id_pasien' => $id);
		$this->pasien_model->deletePasien($where);
		redirect('perawat','refresh');
	}

	function pesan(){
		$id_pasien = $this->input->post('id_pasien');
		$pesan = $this->input->post('pesan');
		$data = $this->pasien_model->getPasienById($id_pasien);
		$pengirim = array('id_pasien' => $id_pasien, 
						  'id_perawat' => $data->id_perawat,
						  'pesan' => $pesan,
						  'pengirim' => 'pasien'); 
		$this->pasien_model->mengirimPesan($pengirim);
	}

	function tampilkanPesanDisisiPasien(){
		$id_pasien = $this->input->post('id_pasien');
		$this->model_pasien->tampilkanPesanPasient($id_pasien);
	} 
}