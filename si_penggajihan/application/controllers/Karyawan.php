<?php

class Karyawan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('welcome/login');
		} else {
			$lvlId = $this->session->userdata('lvl_user');
			$Urimenu = $this->uri->segment(1);

			$menu = $this->db->get_where('user_menu', ['menu' => $Urimenu])->row_array();
			$menuId = $menu['id'];

			$menuAkses = $this->db->get_where('user_akses', [
				'lvl_id' => $lvlId,
				'menu_id' => $menuId
			]);

			if ($menuAkses->num_rows() < 1) {
				redirect('welcome/blok');
			}
		}
		$this->load->model('Karyawan_model', 'karyawan');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Karyawan';
		$this->load->view('templates/kryheader', $data);
		$this->load->view('karyawan/index');
		$this->load->view('templates/footer');
	}

	public function profil()
	{
		$data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Halaman Profil';

		$this->load->view('templates/kryheader', $data);
		$this->load->view('karyawan/profil', $data);
		$this->load->view('templates/footer');
	}

	public function edit_profil()
	{
		$data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
		$data['judul'] = 'Halaman Edit Profil';

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/kryheader', $data);
			$this->load->view('karyawan/editprofil', $data);
			$this->load->view('templates/footer');
		} else {
			$this->karyawan->editProfil();
			$this->session->set_flashdata('msg', 'Diedit');
			redirect('karyawan/profil');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('lvl_user');

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"<strong>Anda</strong> telah logout!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('welcome/login');
	}
}
