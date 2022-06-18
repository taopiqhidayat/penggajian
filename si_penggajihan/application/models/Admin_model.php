<?php

class Admin_model extends CI_Model
{
  public function getGroupKaryawan($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('nama', $keyword);
      $this->db->or_like('email', $keyword);
    }
    $karyawan = 4;
    $this->db->where('lvl_user', $karyawan);
    $this->db->order_by('nama', 'ASC');
    return $this->db->get('users', $limit, $start)->result_array();
  }

  public function tambahDataKaryawan()
  {
    $data = [
      'username' => htmlspecialchars($this->input->post('username', true)),
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'jk' => $this->input->post('jk', true),
      'alamat' => htmlspecialchars($this->input->post('alamat', true)),
      'no_hp' => htmlspecialchars($this->input->post('nohp', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'nik' => htmlspecialchars($this->input->post('nik', true)),
      'foto' => 'default.png',
      'lvl_user' => 4,
      'password' => password_hash($this->input->post('username', true), PASSWORD_DEFAULT),
      'aktif' => 1,
      'tgl_masuk' => time()
    ];

    $this->db->insert('users', $data);
  }

  public function getDatabyId($id)
  {
    return $this->db->get_where('users', ['id' => $id])->row_array();
  }

  public function hapusDataKaryawan($id)
  {
    $this->db->delete('users', ['id' => $id]);
  }

  public function ubahDataKaryawan()
  {
    $data = [
      'username' => $this->input->post('username', true),
      'nama' => $this->input->post('nama', true),
      'jk' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat', true),
      'no_hp' => $this->input->post('nohp', true),
      'email' => $this->input->post('email', true),
      'nik' => $this->input->post('nik', true),
      'foto' => 'default.png',
      'lvl_user' => 4,
      'password' => password_hash('12345', PASSWORD_DEFAULT),
      'aktif' => 1,
      'tgl_masuk' => time()
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('users', $data);
  }

  public function editProfil()
  {
    $data['user'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

    $data = [
      'username' => $this->input->post('username', true),
      'nama' => $this->input->post('nama', true),
      'jk' => $this->input->post('jk'),
      'alamat' => $this->input->post('alamat', true),
      'no_hp' => $this->input->post('nohp', true),
      'email' => $this->input->post('email', true),
      'nik' => $this->input->post('nik', true)
    ];

    // cek upload file
    $uploadimg = $_FILES['img']['name'];

    if ($uploadimg) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2560';
      $config['upload_path'] = './assets/img/';

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('img')) {
        $fotolama = $data['user']['foto'];
        if ($fotolama != 'default.png') {
          unlink(FCPATH . 'assets/img/' . $fotolama);
        }

        $fotobaru = $this->upload->data('file_name');
        $this->db->set('foto', $fotobaru);
      } else {
        echo  $this->upload->display_errors();
      }
    }

    $this->db->set($data);
    $this->db->update('users');
  }
}
