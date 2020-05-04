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

	function pesanDariPerawat(){
		$id_perawat = $this->input->post('id_perawat');
		$pesan = $this->input->post('pesan');
		$id_pasien = $this->input->post('id_pasien');
		$pengirim = array('id_pasien' => $id_pasien, 
						  'id_perawat' => $id_perawat,
						  'pesan' => $pesan,
						  'pengirim' => 'perawat'); 
		$this->pesan_model->mengirimPesan($pengirim);
	}

	function tampilkanPesanDisisiPerawat(){
		$id_perawat = $this->input->post('id_perawat');
		$this->pesan_model->tampilkanPesanPerawat($id_perawat);
	} 

	function pesanDariPasien(){
		$id_pasien = $this->input->post('id_pasien');
		$pesan = $this->input->post('pesan');
		$data = $this->pasien_model->getPasienById($id_pasien);
		$pengirim = array('id_pasien' => $id_pasien, 
						  'id_perawat' => $data->id_perawat,
						  'pesan' => $pesan,
						  'pengirim' => 'pasien'); 
		$this->pesan_model->mengirimPesan($pengirim);
	}

	function tampilkanPesanDisisiPasien(){
		$id_pasien = $this->input->post('id_pasien');
		$this->pesan_model->tampilkanPesanPasient($id_pasien);
	} 
}