<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
        }
	}

	public function index() {
        switch ($this->session->userdata('role')) {
            case 'perawat':
                $this->load->view('perawat/home_view');
                break;
            case 'pasien':
                $this->load->view('pasien/home_view');
                break;
            default:
                redirect('auth/logout');
                break;
        }
    }

    public function pasien() {
        if ($this->session->userdata('role') != 'perawat') {
            redirect('home');
            return;
        }
        $this->load->model('pasien_model');
        // getPasienByIdPerawat
        $data = [
            'pasien' => []
        ];
        $this->load->view('perawat/pasien_view.php', $data);
    }

    public function detail_pasien() {
        if ($this->session->userdata('role') != 'perawat') {
            redirect('home');
            return;
        }
        $this->load->model('pasien_model');
        // getPasienById (id dari GET)
        // load model laporan
        // getLaporanByIdPasien
        $data = [
            'pasien' => [],
            'laporan' => []
        ];
        $this->load->view('perawat/detail_pasien_view.php', $data);
    }
}