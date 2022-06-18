<?php

class Owner extends CI_Controller
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
    $this->load->model('Owner_model', 'owner');
  }

  public function index()
  {
    $data['judul'] = 'Halaman Pemilik';
    $this->load->view('templates/ownheader', $data);
    $this->load->view('owner/index');
    $this->load->view('templates/footer');
  }

  public function data_karyawan()
  {
    $data['judul'] = 'Halaman Data Karyawan';

    // pagination
    $this->load->library('pagination');

    $config['base_url'] = 'http://localhost/si_penggajihan/owner/data_karyawan';

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
    $data['karyawan'] = $this->owner->getGroupKaryawan($config['per_page'], $data['start'], $data['keyword']);

    $data['bagian'] = $this->owner->getBagian($config['per_page'], $data['start'], $data['keyword']);

    $this->load->view('templates/ownheader', $data);
    $this->load->view('owner/karyawan', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Halaman Tambah Karyawan';
    $data['jenis_kelamin'] = ['Laki - laki', 'Perempuan'];
    $data['level'] = $this->db->get('lvl_user')->result_array();

    $this->form_validation->set_rules('username', 'Kode Karyawan', 'trim|required|is_unique[users.username]');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/ownheader', $data);
      $this->load->view('owner/tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->owner->tambahDataKaryawan();
      $this->session->set_flashdata('msg', 'Ditambahkan');
      redirect('owner/data_karyawan');
    }
  }

  public function detail($id)
  {
    $data['judul'] = 'Halaman Detail Karyawan';
    $data['karyawan'] = $this->owner->getDatabyId($id);
    $data['tgl_masuk'] = date('d M Y', $data['karyawan']['tgl_masuk']);

    $this->load->view('templates/ownheader', $data);
    $this->load->view('owner/detail', $data);
    $this->load->view('templates/footer');
  }

  public function hapus($id)
  {
    $this->owner->hapusDataKaryawan($id);
    $this->session->set_flashdata('msg', 'Dihapus');
    redirect('owner/data_karyawan');
  }

  public function ubah($id)
  {
    $data['judul'] = 'Halaman Ubah Karyawan';
    $data['karyawan'] = $this->owner->getDatabyId($id);
    $data['jenis_kelamin'] = ['Laki - laki', 'Perempuan'];
    $data['lvl'] = ['Owner', 'Admin', 'Akuntan', 'Karyawan'];

    $this->form_validation->set_rules('username', 'Kode Karyawan', 'trim|required|is_unique[users.username]');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nohp', 'No. HP', 'trim|required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/ownheader', $data);
      $this->load->view('owner/ubah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->owner->ubahDataKaryawan();
      $this->session->set_flashdata('msg', 'Diubah');
      redirect('owner/data_karyawan');
    }
  }

  public function myprofil()
  {
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    $data['judul'] = 'Halaman Profil';

    $this->load->view('templates/ownheader', $data);
    $this->load->view('owner/myprofil', $data);
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
      $this->load->view('templates/ownheader', $data);
      $this->load->view('owner/editprofil', $data);
      $this->load->view('templates/footer');
    } else {
      $this->owner->editProfil();
      $this->session->set_flashdata('msg', 'Diedit');
      redirect('owner/profil');
    }
  }

  public function profil_perusahaan()
  {
    // $perusahaan = $this->owner->dataPerusahaan();
    // if ($perusahaan != null) {
    //   $data['perusahaan'] = $perusahaan;
    // } else {
    $data['perusahaan'] = [
      'nama' => 'Perusahaan X',
      'email' => 'perusahaanx@gmail.co.id',
      'fax' => 'xxxxxx',
      'no_tlp' => 'xxxxxxxxx',
      'alamat' => 'Jl. bla-bla-bla no.x rt.x rw.x kodepos:xxxxx kec.x kota.x',
      'logo' => 'perusahaan.png'
    ];
    // }
    $data['judul'] = 'Halaman Profil Perusahaan';

    $this->load->view('templates/ownheader', $data);
    $this->load->view('owner/our_company', $data);
    $this->load->view('templates/footer');
  }

  public function edit_profil_perusahaan()
  {
    $data['judul'] = 'Halaman Edit Profil Perusahaan';

    $this->load->view('templates/ownheader', $data);
    $this->load->view('owner/editprofcomp', $data);
    $this->load->view('templates/footer');
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('lvl_user');

    $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"<strong>Anda</strong> telah logout!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    redirect('welcome/login');
  }
}
