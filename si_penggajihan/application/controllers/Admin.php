<?php

class Admin extends CI_Controller
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
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Admin';
        $this->load->view('templates/admheader', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function data_karyawan()
    {
        $data['judul'] = 'Halaman Data Karyawan';

        // pagination
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/si_penggajihan/admin/data_karyawan';

        // ambil data keyword
        if ($this->input->post('cari')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // configurasi pagination
        $this->db->like('nama', $data['keyword']);
        $this->db->or_like('email', $data['keyword']);
        $this->db->from('users');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 10;

        // inisialisasi  pagination
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['karyawan'] = $this->admin->getGroupKaryawan($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/admheader', $data);
        $this->load->view('admin/karyawan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Karyawan';
        $data['jenis_kelamin'] = ['Laki - laki', 'Perempuan'];

        $this->form_validation->set_rules('username', 'Kode Karyawan', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admheader', $data);
            $this->load->view('admin/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->tambahDataKaryawan();
            $this->session->set_flashdata('msg', 'Ditambahkan');
            redirect('admin/data_karyawan');
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Halaman Detail Karyawan';
        $data['karyawan'] = $this->admin->getDatabyId($id);
        $data['tgl_masuk'] = date('d M Y', $data['karyawan']['tgl_masuk']);

        $this->load->view('templates/admheader', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->admin->hapusDataKaryawan($id);
        $this->session->set_flashdata('msg', 'Dihapus');
        redirect('admin/data_karyawan');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Halaman Ubah Karyawan';
        $data['karyawan'] = $this->admin->getDatabyId($id);
        $data['jenis_kelamin'] = ['Laki - laki', 'Perempuan'];

        $this->form_validation->set_rules('username', 'Kode Karyawan', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admheader', $data);
            $this->load->view('admin/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->ubahDataKaryawan();
            $this->session->set_flashdata('msg', 'Diubah');
            redirect('admin/data_karyawan');
        }
    }

    public function profil()
    {
        $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['judul'] = 'Halaman Profil';

        $this->load->view('templates/admheader', $data);
        $this->load->view('admin/profil', $data);
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
            $this->load->view('templates/admheader', $data);
            $this->load->view('admin/editprofil', $data);
            $this->load->view('templates/footer');
        } else {
            $this->admin->editProfil();
            $this->session->set_flashdata('msg', 'Diedit');
            redirect('admin/profil');
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
