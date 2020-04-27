<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if (! $this->session->userdata('logged_in')) {
            redirect('auth');
            return;
        }
        
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
}