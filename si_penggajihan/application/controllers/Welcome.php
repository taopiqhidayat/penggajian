<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')) {
			$lvl = $this->session->userdata('lvl_user');

			if ($lvl == 1) {
				redirect('owner');
			} elseif ($lvl == 2) {
				redirect('admin');
			} elseif ($lvl == 3) {
				redirect('akuntan');
			} elseif ($lvl == 4) {
				redirect('karyawan');
			}
		}
	}

	public function index()
	{
		$data['judul'] = 'Welcome Page';
		$this->load->view('templates/wlcheader', $data);
		$this->load->view('welcome/index');
		$this->load->view('templates/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('welcome/login', $data);
		} else {
			//validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$this->load->model('Login_model', 'login');
		$this->login->getLogin();
	}

	public function blok()
	{
		$data['judul'] = 'Akses Diblokir';
		$this->load->view('welcome/blok', $data);
	}
}
